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
    <div id="formulaire">
        <div id="Q1">
            <button class="dropbtn">Lorem ipsum dolor sit?
                <i class="plus"></i>
            </button>
            <div id="q2_ans">
                <a id="answer">Lorem Lorem Lorem Lorem !</a>
            </div>
        </div>
        <div id="Q2">
            <button class="dropbtn">Lazare et dolor aetum quad?
                <i class="plus"></i>
            </button>
            <div id="q2_ans">
                <a id="answer">Consectetur adipiscing elit. Sed augue !</a>
            </div>
        </div>
        <div id="Q3">
            <button class="dropbtn">Fusce cursus placerat mauris?
                <i class="plus"></i>
            </button>
            <div id="q3_ans">
                <a id="answer">Cras at velit posuere, fringilla orci vel!</a>
            </div>
        </div>
        <div id="Q4">
            <button class="dropbtn">In varius rutrum metus dictumst?
                <i class="plus"></i>
            </button>
            <div id="q4_ans">
                <a id="answer">Vestibulum accumsan, nulla in iaculis ullamcorper.</a>
            </div>
        </div>
    </div>
    <div id="questions"></div>


<?php
include_once('inc/footer.php');