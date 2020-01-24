<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
require ('inc/header.php')

?>


<body>

<div class="wrap">
    <div id="balise"></div>
<section id="presentation_home">
    <div class="home1">
        <h2>Analysé vos trames réseaux.</h2>
        <br>
        <p>Découvrez nos différentes offres.</p>
        <br>
    </div>
    <div class="home2">

        <img src="http://be.beantownthemes.com/html/content/hosting3/images/hosting3-slider-cloud.png" alt="illustration processeur">
    </div>
    <a href="services.php"><button class="services">Services</button></a>
    <a href="contact.php"><button  class="contact">Contact</button></a>

</section>


<section id="choose_home">
    <h2>Pourquoi nous ?</h2>
    <div class="bar"></div>
    <div class="element_1">
        <img src="assets/img/guarantee.svg" >

        <h3>Garanti</h3>
        <p>Une véracité des résultats garantis.</p>
    </div>

    <div class="element_2">
        <img src="assets/img/password.svg">
        <h3>Sécurisé</h3>
        <p>Une analyse 100% sécurisée.</p>
    </div>

</section>

<div class="clear"></div>

<section id="service_home">
    <h2>Nos services</h2>
    <?php if (isLogged()) {?>
    <a href="services.php">
        <div class="text2">
        <h3>Service gratuit</h3>
        <p>Avec notre offre gratuite vous pouvez :</p>
        <ul>
            <li><i class='fas fa-caret-right'></i>voir les questions / réponses les plus posées.</li>
            <li><i class='fas fa-caret-right'></i>Analyser des trames sous format .json</li>
            <li><i class='fas fa-caret-right'></i>Pouvoir nous posé une question avec le formulaire de contact . </li>
        </ul>
        </div>
        <img class="imgfree" src="http://be.beantownthemes.com/html/content/hosting3/images/hosting3-home-image-11.png">
    </a> <?php } else  { ?>
        <a href="login.php">
            <div class="text2">
                <h3>Service gratuit</h3>
                <p>Avec notre offre gratuite vous pouvez :</p>
                <ul>
                    <li><i class='fas fa-caret-right'></i>voir les questions / réponses les plus posées.</li>
                    <li><i class='fas fa-caret-right'></i>Analyser des trames sous format .json</li>
                    <li><i class='fas fa-caret-right'></i>Pouvoir nous posé une question avec le formulaire de contact . </li>
                </ul>
            </div>
            <img class="imgfree" src="http://be.beantownthemes.com/html/content/hosting3/images/hosting3-home-image-11.png">
        </a>
    <?php } ?>
<div class="clear"></div>
    <div class="subscribe">
<?php if (idAdmin()) {?>
        <a href="services.php">
        <div class="text3">
        <h3>Service payant</h3>
        <p>Avec notre offre payante vous pouvez :</p>
        <ul>
            <li><i class='fas fa-caret-right'></i>Vous avez toutes les options du compte gratuit</li>
            <li><i class='fas fa-caret-right'></i>Chart.js</li>
            <li><i class='fas fa-caret-right'></i>Option Maps permet de voir ou son envoyé les données.</li>
        </ul>
        </div>
        <img class="imgsub" src="http://be.beantownthemes.com/html/content/hosting3/images/hosting3-home-image-22.png">
        </a>
<?php } else { ?>
    <a href="login.php">
        <div class="text3">
            <h3>Service payant</h3>
            <pAvec notre offre payante vous pouvez :</p>
            <ul>
                <li><i class='fas fa-caret-right'></i>Vous avez toutes les options du compte gratuit</li>
                <li><i class='fas fa-caret-right'></i>Chart.js</li>
                <li><i class='fas fa-caret-right'></i>Option Maps permet de voir ou son envoyé les données.</li>
            </ul>
        </div>
        <img class="imgsub" src="http://be.beantownthemes.com/html/content/hosting3/images/hosting3-home-image-22.png">
    </a>
<?php }?>
    </div>
</section>
    <div class="clear"></div>
</div>

</body>


<?php
require ('inc/footer.php');