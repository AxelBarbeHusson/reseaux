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

    </div>
    <div id="accordion">
        <h3><span>Q1- </span>Lorem ipsum dolor sit amet?</h3>
        <div id="questions">
            <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
        </div>
        <h3><span>Q2- </span>Donec vestibulum justo a diam?</h3>
        <div id="questions">
            <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac
                turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
        </div>
        <h3><span>Q3- </span>Quisque lorem tortor fringilla sed, vestibulum?</h3>
        <div id="questions">
            <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac
                turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
        </div>
        <h3><span>Q4- </span>Vestibulum dapibus, mauris nec malesuada?</h3>
        <div id="questions">
            <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac
                turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
        </div>
        <h3><span>Q5- </span>Nulla ipsum dolor lacus, suscipit adipiscing?</h3>
        <div id="questions">
            <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac
                turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
        </div>

    </div>
<?php
include_once('inc/footer.php');