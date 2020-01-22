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
            <h3 id="titreblabla">Des jeunes développeurs expérimentés</h3>
            <p id="blabla1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci alias, aspernatur
                atque culpa
                deserunt distinctio dolor eligendi, ipsam itaque libero omnis pariatur perferendis porro sapiente sit
                voluptas?
                Ipsum, minus.lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur dolore ea et ex
                illo ipsam laudantium, maxime quasi quo quod suscipit tempora temporibus. Aut error esse, illo placeat
                quo voluptate. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A amet assumenda beatae commodi
                dignissimos eum eveniet, exercitationem inventore ipsum laboriosam maxime pariatur possimus quae quod
                reprehenderit similique, tempore unde voluptate! Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Amet assumenda id ipsam, maxime nemo recusandae sequi. Asperiores, cupiditate debitis deleniti
                doloribus enim, hic laboriosam nostrum rem, sunt ullam velit vero!</p>

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
            <img id="axel" src="assets/img/axel.jfif" alt="">
            <p id="blabla3">Axel chef de projet et plus beau de tout les rebeux</p>
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