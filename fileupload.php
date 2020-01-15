<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
include('inc/header.php');
if (isLogged()){


$nomOrigine = $_FILES['monfichier']['name'];
$elementsChemin = pathinfo($nomOrigine);
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array("pdf", "json", "sql");
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
        <style>
            .mapboxgl-popup {
                max-width: 400px;
                font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
            }
        </style>
        <div id="map"></div>
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiYXhlbGJhcmJlaHVzc29uIiwiYSI6ImNrNWZlNWE5cTJrMDczbXBnOGI4NTk2MTMifQ.5l3FgdaFC4KAGnfabyT6Kw';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [-77.04, 38.907],
                zoom: 11.15
            });
            map.on('load', function() {
// Add a layer showing the places.
                map.addLayer({
                    'id': 'places',
                    'type': 'symbol',
                    'source': {
                        'type': 'geojson',
                        'data': {
                            'type': 'FeatureCollection',
                            'features': [
                                {
                                    'type': 'Feature',
                                    'properties': {
                                        'description':
                                            '<strong>Make it Mount Pleasant</strong><p><a href="http://www.mtpleasantdc.com/makeitmtpleasant" target="_blank" title="Opens in a new window">Make it Mount Pleasant</a> is a handmade and vintage market and afternoon of live entertainment and kids activities. 12:00-6:00 p.m.</p>',
                                        'icon': 'theatre'
                                    },
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': [-77.038659, 38.931567]
                                    }
                                },
                                {
                                    'type': 'Feature',
                                    'properties': {
                                        'description':
                                            '<strong>Mad Men Season Five Finale Watch Party</strong><p>Head to Lounge 201 (201 Massachusetts Avenue NE) Sunday for a <a href="http://madmens5finale.eventbrite.com/" target="_blank" title="Opens in a new window">Mad Men Season Five Finale Watch Party</a>, complete with 60s costume contest, Mad Men trivia, and retro food and drink. 8:00-11:00 p.m. $10 general admission, $20 admission and two hour open bar.</p>',
                                        'icon': 'theatre'
                                    },
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': [-77.003168, 38.894651]
                                    }
                                },
                                {
                                    'type': 'Feature',
                                    'properties': {
                                        'description':
                                            '<strong>Big Backyard Beach Bash and Wine Fest</strong><p>EatBar (2761 Washington Boulevard Arlington VA) is throwing a <a href="http://tallulaeatbar.ticketleap.com/2012beachblanket/" target="_blank" title="Opens in a new window">Big Backyard Beach Bash and Wine Fest</a> on Saturday, serving up conch fritters, fish tacos and crab sliders, and Red Apron hot dogs. 12:00-3:00 p.m. $25.grill hot dogs.</p>',
                                        'icon': 'bar'
                                    },
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': [-77.090372, 38.881189]
                                    }
                                },
                                {
                                    'type': 'Feature',
                                    'properties': {
                                        'description':
                                            '<strong>Ballston Arts & Crafts Market</strong><p>The <a href="http://ballstonarts-craftsmarket.blogspot.com/" target="_blank" title="Opens in a new window">Ballston Arts & Crafts Market</a> sets up shop next to the Ballston metro this Saturday for the first of five dates this summer. Nearly 35 artists and crafters will be on hand selling their wares. 10:00-4:00 p.m.</p>',
                                        'icon': 'art-gallery'
                                    },
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': [-77.111561, 38.882342]
                                    }
                                },
                                {
                                    'type': 'Feature',
                                    'properties': {
                                        'description':
                                            '<strong>Seersucker Bike Ride and Social</strong><p>Feeling dandy? Get fancy, grab your bike, and take part in this year\'s <a href="http://dandiesandquaintrelles.com/2012/04/the-seersucker-social-is-set-for-june-9th-save-the-date-and-start-planning-your-look/" target="_blank" title="Opens in a new window">Seersucker Social</a> bike ride from Dandies and Quaintrelles. After the ride enjoy a lawn party at Hillwood with jazz, cocktails, paper hat-making, and more. 11:00-7:00 p.m.</p>',
                                        'icon': 'bicycle'
                                    },
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': [-77.052477, 38.943951]
                                    }
                                },
                                {
                                    'type': 'Feature',
                                    'properties': {
                                        'description':
                                            '<strong>Capital Pride Parade</strong><p>The annual <a href="http://www.capitalpride.org/parade" target="_blank" title="Opens in a new window">Capital Pride Parade</a> makes its way through Dupont this Saturday. 4:30 p.m. Free.</p>',
                                        'icon': 'rocket'
                                    },
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': [-77.043444, 38.909664]
                                    }
                                },
                                {
                                    'type': 'Feature',
                                    'properties': {
                                        'description':
                                            '<strong>Muhsinah</strong><p>Jazz-influenced hip hop artist <a href="http://www.muhsinah.com" target="_blank" title="Opens in a new window">Muhsinah</a> plays the <a href="http://www.blackcatdc.com">Black Cat</a> (1811 14th Street NW) tonight with <a href="http://www.exitclov.com" target="_blank" title="Opens in a new window">Exit Clov</a> and <a href="http://godsilla.bandcamp.com" target="_blank" title="Opens in a new window">Gods’illa</a>. 9:00 p.m. $12.</p>',
                                        'icon': 'music'
                                    },
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': [-77.031706, 38.914581]
                                    }
                                },
                                {
                                    'type': 'Feature',
                                    'properties': {
                                        'description':
                                            '<strong>A Little Night Music</strong><p>The Arlington Players\' production of Stephen Sondheim\'s  <a href="http://www.thearlingtonplayers.org/drupal-6.20/node/4661/show" target="_blank" title="Opens in a new window"><em>A Little Night Music</em></a> comes to the Kogod Cradle at The Mead Center for American Theater (1101 6th Street SW) this weekend and next. 8:00 p.m.</p>',
                                        'icon': 'music'
                                    },
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': [-77.020945, 38.878241]
                                    }
                                },
                                {
                                    'type': 'Feature',
                                    'properties': {
                                        'description':
                                            '<strong>Truckeroo</strong><p><a href="http://www.truckeroodc.com/www/" target="_blank">Truckeroo</a> brings dozens of food trucks, live music, and games to half and M Street SE (across from Navy Yard Metro Station) today from 11:00 a.m. to 11:00 p.m.</p>',
                                        'icon': 'music'
                                    },
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': [-77.007481, 38.876516]
                                    }
                                }
                            ]
                        }
                    },
                    'layout': {
                        'icon-image': '{icon}-15',
                        'icon-allow-overlap': true
                    }
                });

// When a click event occurs on a feature in the places layer, open a popup at the
// location of the feature, with description HTML from its properties.
                map.on('click', 'places', function(e) {
                    var coordinates = e.features[0].geometry.coordinates.slice();
                    var description = e.features[0].properties.description;

// Ensure that if the map is zoomed out such that multiple
// copies of the feature are visible, the popup appears
// over the copy being pointed to.
                    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                    }

                    new mapboxgl.Popup()
                        .setLngLat(coordinates)
                        .setHTML(description)
                        .addTo(map);
                });

// Change the cursor to a pointer when the mouse is over the places layer.
                map.on('mouseenter', 'places', function() {
                    map.getCanvas().style.cursor = 'pointer';
                });

// Change it back to a pointer when it leaves.
                map.on('mouseleave', 'places', function() {
                    map.getCanvas().style.cursor = '';
                });
            });
        </script>

        </body>
        </html>
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
   for ($i = 0; $i < $nb; $i++) {
        echo '<tr>';
        $row = $json[$i]['_source']['layers'];
        if (isset($row['frame'])){
            echo '<td>' .$json[$i]['_source']['layers']['frame']['frame.time'] . '</td>';
        }
        if (isset($row['ip'])) {
            echo '<td>' . $json[$i]['_source']['layers']['ip']['ip.src'] . '</td>';
            echo '<td>' . $json[$i]['_source']['layers']['ip']['ip.dst'] . '</td>';
            $michel = array();
            array_push($michel,$json[$i]['_source']['layers']['ip']['ip.dst']);

            foreach ($michel as $value){
                $ip = $value;
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://freegeoip.app/json/'. $ip,
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
                    $test = json_decode($response);
;
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
                    if ($z['latitude']===0 && $z['longitude']===0 && $z['country_name']===""){
                        unset($z['latitude']);
                        unset($z['longitude']);
                        unset($z['country_name']);
                    }else{
                        $longitude= $z['longitude'];
                        $latitude= $z['latitude'];
                        $countryName = $z['country_name'];
                        //debug($z);
                        ?>

                        <script>
                            mapboxgl.accessToken = 'pk.eyJ1IjoiYXhlbGJhcmJlaHVzc29uIiwiYSI6ImNrNWZlNWE5cTJrMDczbXBnOGI4NTk2MTMifQ.5l3FgdaFC4KAGnfabyT6Kw';
                            var map = new mapboxgl.Map({
                                container: 'mapid',
                                style: 'mapbox://styles/mapbox/streets-v11',
                                center: [-77.04, 38.907],
                                zoom: 11.15
                            });

                            map.on('load', function() {
// Add a layer showing the places.
                                map.addLayer({
                                    'id': 'places',
                                    'type': 'symbol',
                                    'source': {
                                        'type': 'geojson',
                                        'data': {
                                            'type': 'FeatureCollection',
                                            'features': [
                                                {
                                                    'type': 'Feature',
                                                    'properties': {
                                                        'description':
                                                            '<strong>Make it Mount Pleasant</strong><p><a href="http://www.mtpleasantdc.com/makeitmtpleasant" target="_blank" title="Opens in a new window">Make it Mount Pleasant</a> is a handmade and vintage market and afternoon of live entertainment and kids activities. 12:00-6:00 p.m.</p>',
                                                        'icon': 'theatre'
                                                    },
                                                    'geometry': {
                                                        'type': 'Point',
                                                        'coordinates': [<?=$longitude?>, <?=$latitude?>]
                                                    }
                                                }

                                            ]
                                        }
                                    },
                                    'layout': {
                                        'icon-image': '{icon}-15',
                                        'icon-allow-overlap': true
                                    }
                                });

// When a click event occurs on a feature in the places layer, open a popup at the
// location of the feature, with description HTML from its properties.
                                map.on('click', 'places', function(e) {
                                    var coordinates = e.features[0].geometry.coordinates.slice();
                                    var description = e.features[0].properties.description;

// Ensure that if the map is zoomed out such that multiple
// copies of the feature are visible, the popup appears
// over the copy being pointed to.
                                    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                                        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                                    }

                                    new mapboxgl.Popup()
                                        .setLngLat(coordinates)
                                        .setHTML(description)
                                        .addTo(map);
                                });

// Change the cursor to a pointer when the mouse is over the places layer.
                                map.on('mouseenter', 'places', function() {
                                    map.getCanvas().style.cursor = 'pointer';
                                });

// Change it back to a pointer when it leaves.
                                map.on('mouseleave', 'places', function() {
                                    map.getCanvas().style.cursor = '';
                                });
                            });
                        </script>
                        <?php
                    }

                    //$iptranlate .= array_push($z);
                }
            }
            ?>

            <?php
            //var_dump($michel);
        }else{
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

        }else{
            echo '<td>-</td>';
        }

        if (isset($row['udp'])) {
            //echo '<td>UDP</td>';
            echo '<td>' . $json[$i]['_source']['layers']['udp']['udp.srcport'] . '</td>';
            echo '<td>' . $json[$i]['_source']['layers']['udp']['udp.dstport'] . '</td>';
        }else{
            echo '<td>-</td>';
        }
        if (isset($row['tcp'])) {
            //echo '<td>TCP</td>';
            echo '<td>' . $json[$i]['_source']['layers']['tcp']['tcp.srcport'] . '</td>';
            echo '<td>' . $json[$i]['_source']['layers']['tcp']['tcp.dstport'] . '</td>';
        }else{
            echo '<td>-</td>';
        }

        echo '</tr>';
    }
    ?>
    </tbody>
</table>


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

}else{
    echo '<p>403</p>';
}
include('inc/footer.php');