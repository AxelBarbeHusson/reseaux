<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
$title = 'Page de contact';
$errors = array();
$success = false;
if (!empty($_POST['submitted'])) {
    $nom = clean($_POST['nom']);
    $errors = textWalid($errors, $nom, 'nom', 3, 20);
    $prenom = clean($_POST['prenom']);
    $errors = textWalid($errors, $prenom, 'prenom', 3, 20);
    $email = clean($_POST['email']);
    $errors = emailValidation($errors, $email, 'email');
    $subject = clean($_POST['subject']);
    $errors = textWalid($errors, $subject, 'subject', 5, 30);
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
include('inc/header.php');?>
    <div class="contenu">
        <div id="contact">
            <h1>
                Vous avez une question , <br> <span class="contact_us"> une suggestion?</span>
            </h1>
            <img id="banniere" src="assets/img/Bannieretest.PNG" alt="">
        </div>
        <div class="clear"></div>
        <div class="wrap2">
            <div class="formulaire2">
                <?php if ($success) { ?>
                    <p class="success">Merci de nous avoir contacté, nous vous renverrons un mail dans les plus
                        brefs délais</p>
                <?php } else  { ?>
                <p class="howto">Contactez nous !</p>
                <div class="backform2">
                    <form action="contact.php" method="post" novalidate>
                        <label for="nom"></label>
                        <input type="text" id="nom" name="nom" value="<?php if (!empty($_POST)) {
                            echo $_POST['nom'];
                        } ?>" placeholder="Votre Nom">
                        <p class="error"><?php if (!empty($errors['nom'])) {
                                echo $errors['nom'];
                            } ?></p>
                        <label for="prenom"></label>
                        <input type="text" id="prenom" name="prenom" value="<?php if (!empty($_POST)) {
                            echo $_POST['prenom'];
                        } ?>" placeholder="Votre Prénom">
                        <p class="error"><?php if (!empty($errors['prenom'])) {
                                echo $errors['prenom'];
                            } ?></p>
                        <label for="email"></label>
                        <input type="email" id="email" name="email" value="<?php if (!empty($_POST)) {
                            echo $_POST['email'];
                        } ?>" placeholder="Votre Mail">
                        <p class="error"><?php if (!empty($errors['email'])) {
                                echo $errors['email'];
                            } ?></p>
                        <label for="subject"></label>
                        <input type="text" id="subject" name="subject" value="<?php if (!empty($_POST)) {
                            echo $_POST['subject'];
                        } ?>" placeholder="Objet de votre message">
                        <p class="error"><?php if (!empty($errors['subject'])) {
                                echo $errors['subject'];
                            } ?></p>
                        <label for="message"></label>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                        <p class="error"><?php if (!empty($errors['message'])) {
                                echo $errors['message'];
                            } ?></p>
                        <input id="submit" type="submit" name="submitted" value="Envoyer">
                    </form>
                </div>
            </div>
            <?php } ?>
            <div id="accordion">
                <p class="faq">Foire aux questions</p>
                <button class="accordion" checked><span class="num">1 - </span>Lorem ipsum dolor sit amet?</button>
                <div class="panel">
                    <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                        ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                        amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                        odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
                </div>

                <button class="accordion"><span class="num">2 - </span>Donec vestibulum justo a diam?</button>
                <div class="panel">
                    <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec
                        malesuada
                        fames ac
                        turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                </div>
                <button class="accordion"><span class="num">3 - </span>Quisque lorem tortor fringilla sed?</button>
                <div class="panel">
                    <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec
                        malesuada
                        fames ac
                        turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                </div>
                <button class="accordion"><span class="num">4 - </span>Vestibulum dapibus, mauris nec malesuada?
                </button>
                <div class="panel">
                    <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec
                        malesuada
                        fames ac
                        turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                </div>
                <button class="accordion"><span class="num">5 - </span>Nulla ipsum dolor lacus, suscipit adipiscing?
                </button>
                <div class="panel">
                    <p>Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec
                        malesuada
                        fames ac
                        turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Etiam ullamcorper.</p>
                </div>
            </div>
        </div>
    </div>
<?php
include_once('inc/footer.php');