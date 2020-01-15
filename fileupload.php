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
                    //var_dump($test);
                    //var_dump($test->ip);
                    //echo $response
debug($test);
?>
                    <canvas id="myChart"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var chart = new Chart(ctx, {
                            // The type of chart we want to create
                            type: 'line',

                            // The data for our dataset
                            data: {
                                labels: ['Country', 'February', 'March', 'April', 'May', 'June', 'July'],
                                datasets: [{
                                    label: 'My First dataset',
                                    backgroundColor: 'rgb(255, 99, 132)',
                                    borderColor: 'rgb(255, 99, 132)',
                                    data: [0, 10, 5, 2, 20, 30, 45]
                                }]
                            },
                    </script>
                    <?php
                }
            }
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