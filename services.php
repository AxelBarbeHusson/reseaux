<?php

session_start();
require('inc/pdo.php');
require('function/function.php');
include('inc/header.php');
?>
<h1>Nos services</h1>
    <form enctype="multipart/form-data" action="fileupload.php" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000000000000000" />
        Transfère le fichier <input type="file" name="monfichier" />
        <input type="submit" />
    </form>

<?php
require ('inc/footer.php');