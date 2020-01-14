<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
include('inc/header.php');
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
        }else{
            echo '<td></td>';
            echo '<td></td>';
        }
        if (isset($row['eth'])) {
            echo '<td>' . $json[$i]['_source']['layers']['eth']['eth.src'] . '</td>';
            echo '<td>' . $json[$i]['_source']['layers']['eth']['eth.dst'] . '</td>';
        }
        if (isset($row['ssdp'])) {
            echo '<td>SSDP</td>';
            echo '<td>' . $json[$i]['_source']['layers']['ssdp']['http.host'] . '</td>';

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
}

include('inc/footer.php');