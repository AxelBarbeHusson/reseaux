<?php

session_start();
require('inc/pdo.php');
require('function/function.php');
include('inc/header.php');
if (isLogged()) {
    ?>
    <div id="balise"></div>
<div class="wrap">
    <h1 class="service">Nos services</h1>
    <form enctype="multipart/form-data" action="fileupload.php" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000000000000000"/>
        Transfère le fichier <input type="file" name="monfichier"/>
        <input type="submit"/>
    </form>
</div>
    <?php
}echo '<p class="err">403</p>';
require ('inc/footer.php');