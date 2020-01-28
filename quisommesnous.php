<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
require('inc/header.php')

?>

    <body>
    <div id="balise"></div>
    <div class="wrap">
    <section id="groupe1">
        <h2 class="qui">Qui sommes nous ?</h2>
        <div class="bar"></div>
        <div class="gauche">
            <h3 id="titreblabla">Des jeunes développeurs</h3>
            <p id="blabla1">Etudiants à la Nfactory school, nous avons eu pour projet d'analyser un fichier json contenant les informations du réseau wifi de notre campus. Nous possedons tous un rôle au sein de ce groupe. Certains plutôt back, certains plutôt front. En collaboration avec la NFactory corp. , nous avons pu mener à bien ce projet en ayant un upload de fichier et une analyse fonctionnelle</p>

        </div>
        <img id="rj45" src="assets/img/RJ45.png" alt="image cable">
    </section>
    <section id="equipe">

        <h2 class="team">Notre équipe </h2>

        <img id="etienne" src="assets/img/Etienne.jfif" alt="">

        <img id="thibault" src="assets/img/Thibault.jfif" alt="">

        <img id="victor" src="assets/img/Victor.jfif" alt="">

    </section>

    <section id="groupe2">
        <img id="serv" src="assets/img/Serveur.jpeg" alt="">
        <div id="float">
            <img id="axel" src="assets/img/axel.jfif" alt="" />
            <p id="blabla3">Axel chef de projet</p>
        </div>

        <div class="clear"></div>
    </section>
    <section id="soutien">
        <div class="nfacto">
            <h4 id="support">En partenariat avec :</h4>
            <img id="logon" src="assets/img/Nfactory.png" alt="">
        </div>

    </section>
    </div>
    </body>

<?php
require('inc/footer.php'); ?>