<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
include('inc/header.php');
?>

<div id="contact">
    <h1>
        Vous avez une question , une suggestions?
        <br>
        <span class="contact_us">Contactez-nous!</span>
    </h1>
</div>
<div id="formulaire"></div>
<div id="questions"></div>








<?php
include_once('inc/footer.php');