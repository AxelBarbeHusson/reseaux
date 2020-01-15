<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
include('inc/header.php');
?>
    <div class="wrap2">
        <div id="accordéon">
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
                <button class="accordion">Lorem ipsum dolor sit amet?</button>
                <div class="panel">
                    <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                        ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                        amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                        odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
                </div>

                <button class="accordion">Donec vestibulum justo a diam?</button>
                <div class="panel">
                    <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada
                        fames ac
                        turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                </div>
                <button class="accordion">Quisque lorem tortor fringilla sed?</button>
                <div class="panel">
                    <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada
                        fames ac
                        turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                </div>
                <button class="accordion">Vestibulum dapibus, mauris nec malesuada?</button>
                <div class="panel">
                    <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada
                        fames ac
                        turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                </div>
                <button class="accordion">Nulla ipsum dolor lacus, suscipit adipiscing?</button>
                <div class="panel">
                    <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada
                        fames ac
                        turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                </div>
            </div>
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<?php
include_once('inc/footer.php');