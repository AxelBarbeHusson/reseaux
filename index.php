<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
require ('inc/header.php')

?>


<body>
<div class="wrap">
<section id="presentation_home">
    <div class="text_home_1">
        <h2>Lorem ipsum dolor sit amet.</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, similique?</p>
        <button class="services">Nos services</button>
        <button class="Contact">Nous contacter</button>
    </div>
    <img src="https://picsum.photos/id/1/200/300">

</section>

<div class="clear"></div>

<section id="choose_home">
    <div class="element_1">
        <img src="https://picsum.photos/id/1/50/50">
        <h3>Lorem ipsum dolor sit amet.</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim modi odit officia repudiandae tempora voluptatum?</p>
    </div>

    <div class="element_2">
        <img src="https://picsum.photos/id/1/50/50">
        <h3>Lorem ipsum dolor sit amet.</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim modi odit officia repudiandae tempora voluptatum?</p>
    </div>

    <div class="element_3">
        <img src="https://picsum.photos/id/1/50/50">
        <h3>Lorem ipsum dolor sit amet.</h3>
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