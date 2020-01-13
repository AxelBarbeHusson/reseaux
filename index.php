<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
require ('inc/header.php')

?>


<body>
<div class="wrap">
<section id="presentation_home">
    <div class="home1">
        <h2>Lorem ipsum dolor sit.</h2>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, similique?</p>
        <br>
        <button class="services" href="services.php">Nos services</button>
        <button class="contact" href="contact.php">Nous contacter</button>
    </div>
    <div class="home2">

        <img src="http://be.beantownthemes.com/html/content/hosting3/images/hosting3-slider-cloud.png" alt="illustration processeur">
    </div>


</section>


<section id="choose_home">
    <h2>Pourquoi nous ?</h2>
    <div class="bar"></div>
    <div class="element_1">
        <img src="assets/img/guarantee.svg">
        <h3>Garanti</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim modi odit officia repudiandae tempora voluptatum?</p>
    </div>

    <div class="element_2">
        <img src="assets/img/password.svg">
        <h3>Sécurisé</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim modi odit officia repudiandae tempora voluptatum?</p>
    </div>

</section>

<div class="clear"></div>

<section id="service_home">
    <div class="free">
        <h3>Service gratuit</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dolorem exercitationem iure laboriosam minima, neque reiciendis vitae. Eligendi, esse, maxime.</p>
        <ul>
            <li>Lorem ipsum dolor.</li>
            <li>Lorem ipsum dolor.</li>
            <li>Lorem ipsum dolor.</li>
        </ul>
    </div>

    <div class="subscribe">
        <h3>Service gratuit</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dolorem exercitationem iure laboriosam minima, neque reiciendis vitae. Eligendi, esse, maxime.</p>
        <ul>
            <li>Lorem ipsum dolor.</li>
            <li>Lorem ipsum dolor.</li>
            <li>Lorem ipsum dolor.</li>
        </ul>
    </div>
</section>
</div>
</body>


<?php
require ('inc/footer.php');