<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
include('inc/header.php');
$title = 'Page de contact';
$errors = array();
$success = false;
if (!empty($_POST['submitted'])) {
    $nom = clean($_POST['nom']);
    $prenom = clean($_POST['prenom']);
    $email = clean($_POST['email']);
    $errors = emailValidation($errors, $email, 'email');
    $subject = clean($_POST['subject']);
    $message = clean($_POST['message']);
    $errors = textWalid($errors, $message, 'message', 5, 2000);
    if (count($errors) == 0) {
        // insert avec protection des injections SQL
        $sql = "INSERT INTO contact VALUES (null,:nom,:prenom,:email,:subject,:message)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':prenom', $nom, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':subject', $subject, PDO::PARAM_STR);
        $query->bindValue(':message', $message, PDO::PARAM_STR);
        $query->execute();
        $success = true;
    }
}
?>
    <div class="contenu">
        <div id="accordéon">
            <div id="contact">
                <h1>
                    Vous avez une question , une suggestion?
                    <br>
                    <span class="contact_us">Contactez-nous</span>
                </h1>
                <img id="banniere" src="assets/img/Bannieretest.PNG" alt="">
            </div>
            <div class="clear"></div>
            <div class="wrap2">
                <div id="formulaire">
                    <p class="howto">Comment procéder?</p>
                    <?php if ($success) { ?>
                        <p class="success">Merci de nous avoir contacté, nous vous renverrons un mail dans les plus
                            brefs délais</p>
                    <?php } else  { ?>
                    <form class="contact" action="contact.php" method="post" novalidate>
                        <fieldset>
                            <label for="nom"></label>
                            <input type="text" id="nom" name="nom" value="<?php if (!empty($_POST)) {
                                echo $_POST['nom'];
                            } ?>" placeholder="Votre Nom">
                            <label for="prenom"></label>
                            <input type="text" id="prenom" name="prenom" value="<?php if (!empty($_POST)) {
                                echo $_POST['prenom'];
                            } ?>" placeholder="Votre Prénom">
                            <label for="email"></label>
                            <input type="email" id="email" name="email" value="<?php if (!empty($_POST)) {
                                echo $_POST['email'];
                            } ?>" placeholder="Votre Mail">
                            <label for="subject"></label>
                            <input type="text" id="subject" name="subject" value="<?php if (!empty($_POST)) {
                                echo $_POST['subject'];
                            } ?>" placeholder="Objet de votre message">
                            <label for="message"></label>
                            <textarea name="message" id="message" cols="30" rows="10"></textarea>
                            <input type="submit" name="submitted" value="Envoyer">
                        </fieldset>
                    </form>
                </div>
                <?php } ?>
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
                        <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec
                            malesuada
                            fames ac
                            turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                    </div>
                    <button class="accordion">Quisque lorem tortor fringilla sed?</button>
                    <div class="panel">
                        <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec
                            malesuada
                            fames ac
                            turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                    </div>
                    <button class="accordion">Vestibulum dapibus, mauris nec malesuada?</button>
                    <div class="panel">
                        <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec
                            malesuada
                            fames ac
                            turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                    </div>
                    <button class="accordion">Nulla ipsum dolor lacus, suscipit adipiscing?</button>
                    <div class="panel">
                        <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec
                            malesuada
                            fames ac
                            turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
include_once('inc/footer.php');