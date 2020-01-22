<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
include('inc/header.php');
if (isLogged()) {


    $nomOrigine = $_FILES['monfichier']['name'];
    $elementsChemin = pathinfo($nomOrigine);
    $extensionFichier = $elementsChemin['extension'];
    $extensionsAutorisees = array("json");
    if (!(in_array($extensionFichier, $extensionsAutorisees))) {
        echo "Le fichier n'a pas l'extension attendue";
    } else {
        // Copie dans le repertoire du script avec un nom
        // incluant l'heure a la seconde pres
        $repertoireDestination = dirname(__FILE__) . "/";
        $nomDestination = "fichier_du_" . date("YmdHis") . "." . $extensionFichier;

        if (move_uploaded_file($_FILES["monfichier"]["tmp_name"],
            $repertoireDestination . $nomDestination)) {
            /*echo "Le fichier temporaire ".$_FILES["monfichier"]["tmp_name"].
                " a été déplacé vers ".$repertoireDestination.$nomDestination;*/
            $fichier = file_get_contents($nomDestination);
            $json = json_decode($fichier, true);
            //debug($json);

            ?>


            <table>
                <thead>
                <tr>
                    <th>frame.time</th>
                    <th>ip.src</th>
                    <th>ip.dst</th>
                    <th>eth.src</th>
                    <th>eth.dst</th>
                    <th>http.host</th>
                    <th>UDP.src</th>
                    <th>UDP.dst</th>
                    <th>TCP.src</th>
                    <th>TCP.dst</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $nb = count($json);
                $tapindesbois = array();
                for ($i = 0; $i < $nb; $i++) {
                    echo '<tr>';
                    $row = $json[$i]['_source']['layers'];
                    if (isset($row['frame'])) {
                        echo '<td>' . $json[$i]['_source']['layers']['frame']['frame.time'] . '</td>';
                    }
                    if (isset($row['ip'])) {
                        echo '<td>' . $json[$i]['_source']['layers']['ip']['ip.src'] . '</td>';
                        echo '<td>' . $json[$i]['_source']['layers']['ip']['ip.dst'] . '</td>';
                        $michel = array();
                        array_push($michel, $json[$i]['_source']['layers']['ip']['ip.dst']);

                        $dede = array();
                        foreach ($michel as $value) {
                            $ip = $value;
                            $curl = curl_init();

                            curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://freegeoip.app/json/' . $ip,
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "GET",
                                CURLOPT_HTTPHEADER => array(
                                    "accept: application/json",
                                    "content-type: application/json"
                                ),
                            ));

                            $response = curl_exec($curl);
                            $err = curl_error($curl);

                            curl_close($curl);

                            if ($err) {
                                echo "cURL Error #:" . $err;
                            } else {
                                //var_dump($response);
                                $test = json_decode($response);;
                                $longitude = $test->longitude;
                                $latitude = $test->latitude;
                                $countryName = $test->country_name;
                                //debug($longitude);
                                //debug($latitude);
                                //var_dump($test);
                                //var_dump($test->ip);
                                //echo $response
                                $z = [
                                    'latitude' => $latitude,
                                    'longitude' => $longitude,
                                    'country_name' => $countryName
                                ];
                                if ($z['latitude'] === 0 && $z['longitude'] === 0 && $z['country_name'] === "") {
                                    unset($z['latitude']);
                                    unset($z['longitude']);
                                    unset($z['country_name']);
                                } else {
                                    $longitude = $z['longitude'];
                                    $latitude = $z['latitude'];
                                    $countryName = $z['country_name'];
                                    //debug($z);

                                }

                                //$iptranlate .= array_push($z);
                            }
                            $dede[] = $z;


                        }

                    } else {
                        echo '<td>-</td>';
                        echo '<td>-</td>';
                    }
                    if (isset($row['eth'])) {
                        echo '<td>' . $json[$i]['_source']['layers']['eth']['eth.src'] . '</td>';
                        echo '<td>' . $json[$i]['_source']['layers']['eth']['eth.dst'] . '</td>';
                    }

                    if (isset($row['ssdp'])) {
                        //echo '<td>SSDP</td>';
                        echo '<td>' . $json[$i]['_source']['layers']['ssdp']['http.host'] . '</td>';

                    } else {
                        echo '<td>-</td>';
                    }

                    if (isset($row['udp'])) {
                        //echo '<td>UDP</td>';
                        echo '<td>' . $json[$i]['_source']['layers']['udp']['udp.srcport'] . '</td>';
                        echo '<td>' . $json[$i]['_source']['layers']['udp']['udp.dstport'] . '</td>';
                    } else {
                        echo '<td>-</td>';
                    }
                    if (isset($row['tcp'])) {
                        //echo '<td>TCP</td>';
                        echo '<td>' . $json[$i]['_source']['layers']['tcp']['tcp.srcport'] . '</td>';
                        echo '<td>' . $json[$i]['_source']['layers']['tcp']['tcp.dstport'] . '</td>';
                    } else {
                        echo '<td>-</td>';
                    }

                    echo '</tr>';
                    if (empty($dede[0])) {
                        unset($dede[0]);
                    } else {
                        //debug($dede[0]);
                        array_push($tapindesbois, $dede[0]);
                    }

                }
                $putasdesforets = count($tapindesbois);
                $how = array();
                //debug($tapindesbois);

                $atltitude = array();
                for ($i = 0; $i < $putasdesforets; $i++) {
                    $locat = $tapindesbois[$i]['latitude'] . ',' . $tapindesbois[$i]['longitude'];
                    array_push($how, $tapindesbois[$i]['country_name']);
                    if ($i == 0) {
                        $atltitude[] = $locat;
                    } else {
                        if (in_array($locat, $atltitude)) {
                            unset($tapindesbois[$i]);
                        } else {
                            $atltitude[] = $locat;
                        }
                    }
                }
                //debug($tapindesbois);
                //array_count_values($how);

                //debug($how);
                $charts = array();


                $vi = array_count_values($how);
                array_push($charts, $vi);

                 debug($charts);
                $name = array_keys($charts[0]);
debug($name);

                ?>
                </tbody>
            </table>


            <div id='map' style='width: 400px; height: 300px;'></div>
            <script>
                mapboxgl.accessToken = 'pk.eyJ1IjoiYXhlbGJhcmJlaHVzc29uIiwiYSI6ImNrNWZlNWE5cTJrMDczbXBnOGI4NTk2MTMifQ.5l3FgdaFC4KAGnfabyT6Kw';
                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    center: [0, 0],
                    zoom: 0.5
                });
                var size = 200;

                // implementation of CustomLayerInterface to draw a pulsing dot icon on the map
                // see https://docs.mapbox.com/mapbox-gl-js/api/#customlayerinterface for more info
                var pulsingDot = {
                    width: size,
                    height: size,
                    data: new Uint8Array(size * size * 4),

// get rendering context for the map canvas when layer is added to the map
                    onAdd: function () {
                        var canvas = document.createElement('canvas');
                        canvas.width = this.width;
                        canvas.height = this.height;
                        this.context = canvas.getContext('2d');
                    },

// called once before every frame where the icon will be used
                    render: function () {
                        var duration = 1000;
                        var t = (performance.now() % duration) / duration;

                        var radius = (size / 2) * 0.3;
                        var outerRadius = (size / 2) * 0.7 * t + radius;
                        var context = this.context;

// draw outer circle
                        context.clearRect(0, 0, this.width, this.height);
                        context.beginPath();
                        context.arc(
                            this.width / 2,
                            this.height / 2,
                            outerRadius,
                            0,
                            Math.PI * 2
                        );
                        context.fillStyle = 'rgba(255, 200, 200,' + (1 - t) + ')';
                        context.fill();

// draw inner circle
                        context.beginPath();
                        context.arc(
                            this.width / 2,
                            this.height / 2,
                            radius,
                            0,
                            Math.PI * 2
                        );
                        context.fillStyle = 'rgba(255, 100, 100, 1)';
                        context.strokeStyle = 'white';
                        context.lineWidth = 2 + 4 * (1 - t);
                        context.fill();
                        context.stroke();

// update this image's data with data from the canvas
                        this.data = context.getImageData(
                            0,
                            0,
                            this.width,
                            this.height
                        ).data;

// continuously repaint the map, resulting in the smooth animation of the dot
                        map.triggerRepaint();

// return `true` to let the map know that the image was updated
                        return true;
                    }
                };

                map.on('load', function () {
                    map.addImage('pulsing-dot', pulsingDot, {pixelRatio: 2});

                    map.addLayer({
                        'id': 'points',
                        'type': 'symbol',
                        'source': {
                            'type': 'geojson',
                            'data': {
                                'type': 'FeatureCollection',
                                'features': [
                                    <?php

                                    foreach ($tapindesbois as $adresse){

                                    //debug();

                                    ?>
                                    {

                                        'type': 'Feature',
                                        'geometry': {
                                            'type': 'Point',
                                            'coordinates': [<?=$adresse['longitude']?>, <?=$adresse['latitude']?>]
                                        }
                                    },
                                    <?php } ?>
                                ]
                            }
                        },
                        'layout': {
                            'icon-image': 'pulsing-dot'
                        }
                    });

                });
            </script>
            <canvas id="myChart" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById('myChart');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'bar',

                    // The data for our dataset
                    data: {
                        <?php
                        $geralt = '';
                        foreach ($name as $value) {
                        $geralt .= '' . $value . ',';

                        ?>
                        labels: ["<?=$geralt?>"],
                        <?php }?>
                        datasets: [{
                            label: 'My First dataset',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            <?php
                            $lambert = '';
                            foreach ($charts[0] as $nbOfCountry){
                            $lambert .= $nbOfCountry . ',';

                            ?>
                            data: [<?=$lambert?>]
                            <?php }?>
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });

            </script>

            <?php


        } else {
            echo "Le fichier n'a pas été uploadé (trop gros ?) ou " .
                "Le déplacement du fichier temporaire a échoué" .
                " vérifiez l'existence du répertoire " . $repertoireDestination;
        }

        //var_dump($test);
    }

    ?>


    <?php
//debug($michel);
//die('ok');

} else {
    echo '<p>403</p>';
}
include('inc/footer.php');