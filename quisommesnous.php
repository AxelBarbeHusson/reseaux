<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
require('inc/header.php')

?>

    <body>
    <section id="Groupe1">
    <h1 id="qui">Qui sommes nous ?</h1>
    <img id="Bannieres" src="assets/img/Bannieretest.PNG" alt="">
    <h2 id="titreblabla">Nous avons 60 ans d'experiences dans le dev et oui jamy</h2>
    <div class="gauche">
    <p id="blabla1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci alias, aspernatur atque culpa
        deserunt distinctio dolor eligendi, ipsam itaque libero omnis pariatur perferendis porro sapiente sit voluptas?
        Ipsum, minus.</p>

    <p id="blabla2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid asperiores autem cumque
        cupiditate delectus, deleniti deserunt dolor ea expedita explicabo inventore laboriosam nemo placeat quos sint
        totam ut, vitae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam animi culpa
        cupiditate, dignissimos doloribus dolorum eum fuga fugiat iure laborum, natus nulla quae repellat repudiandae
        sapiente suscipit tempore veniam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, architecto,
        deleniti, doloribus excepturi harum iste laudantium maiores maxime minima nihil numquam obcaecati possimus sunt
        suscipit tempore ut vel. Consequatur, ipsum?</p>
    </div>
        <img id="RJ45" src="assets/img/RJ45.png" alt="">
    </section>
    <div class="clear"></div>
    <div class="wrap"></div>

    <section id="equipe">

        <h3 id="equipetitre">Notre équipe .</h3>

        <img id="etienne" src="assets/img/Etienne.jfif" alt="">

        <img id="thibault" src="assets/img/Thibault.jfif" alt="">

        <img id="victor" src="assets/img/Victor.jfif" alt="">

    </section>
    
    <section id="groupe2">
    <img id="serv" src="assets/img/Serveur.jpeg" alt="">
    <img id="axel" src="assets/img/axel.jfif" alt="">
    <p id="blabla3">Axel chef de projet et plus beau de tout les rebeux</p>
    <div id="Serveur"</div>
    <div class="wrap"></div>
    <div class="clear"></div>
    </section>
    <section id="Soutien">
        <div class="Nfacto">
            <h4 id="Support">En partenariat avec :</h4>
            <img id="LogoN" src="assets/img/Nfactory.png" alt="">
        </div>
        
    </section>
    </body>

<?php
require('inc/footer.php'); ?>