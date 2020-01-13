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
    $repertoireDestination = dirname(__FILE__)."/";
    $nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;

    if (move_uploaded_file($_FILES["monfichier"]["tmp_name"],
        $repertoireDestination.$nomDestination)) {
        /*echo "Le fichier temporaire ".$_FILES["monfichier"]["tmp_name"].
            " a été déplacé vers ".$repertoireDestination.$nomDestination;*/
        $fichier = file_get_contents($nomDestination);
        $json = json_decode($fichier, true);
        debug($json);

?>
        <canvas id="myChart" width="400" height="400"></canvas>

        <?php


    } else {
        echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
            "Le déplacement du fichier temporaire a échoué".
            " vérifiez l'existence du répertoire ".$repertoireDestination;
    }
}

include('inc/footer.php');