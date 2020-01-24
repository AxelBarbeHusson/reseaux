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
    $message = clean($_POST['message']);
    $errors = textWalid($errors, $subject, 'subject', 5, 30);
    $message = clean($_POST['message']);
    $errors = textWalid($errors, $message, 'message', 5, 2000);
    if (count($errors) == 0) {
        // insert avec protection des injections SQL
        // requète sql pour le formulaire de contact
        $sql = "INSERT INTO contact VALUES (null,:nom,:prenom,:email,:subject,:message)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':subject', $subject, PDO::PARAM_STR);
        $query->bindValue(':message', $message, PDO::PARAM_STR);
        $query->execute();
        $success = true;
    }
    if (!empty($_POST['message'])) {
        $usermsg = $_POST['message'];
        $sql = "SELECT message FROM contact WHERE message = :message";
        $query = $pdo->prepare($sql);
        $query->bindValue(':message', $usermsg, PDO::PARAM_INT);
        $query->execute();
        $userinfos = $query->fetch();
        if (!empty($_SESSION['login']['id'])) {
            $userid = $_SESSION['login']['id'];
            $sql = "SELECT id FROM users WHERE id = :id";
            $query = $pdo->prepare($sql);
            $query->bindValue(':id', $userid, PDO::PARAM_INT);
            $query->execute();
            $userinfos = $query->fetch();
            if (count($errors) == 0) {
                $sql = "INSERT INTO questions VALUES (null,:id_user,:question,'')";
                $query = $pdo->prepare($sql);
                $query->bindValue(':id_user', $_SESSION['login']['id'], PDO::PARAM_STR);
                $query->bindValue(':question', $message, PDO::PARAM_STR);
                $query->execute();
                $success = true;
            }
        }
    }

}
include('inc/header.php'); ?>
    <div id="balise"></div>

    <div class="wrap">
        <div class="contenu">
            <div class="formulaire2">
                <?php if ($success) { ?>
                    <p class="success">Merci de nous avoir contacté, nous vous renverrons un mail dans les plus
                        brefs délais</p>
                <?php } else  { ?>
                <p class="howto">Contactez nous !</p>
                <div class="backform">
                    <form action="contact.php" method="post" novalidate>
                        <label for="nom">Nom *</label>
                        <input type="text" id="nom" name="nom" value="<?php if (!empty($_POST)) {
                            echo $_POST['nom'];
                        } ?>">
                        <p class="error"><?php if (!empty($errors['nom'])) {
                                echo $errors['nom'];
                            } ?></p>
                        <label for="prenom">Prénom *</label>
                        <input type="text" id="prenom" name="prenom" value="<?php if (!empty($_POST)) {
                            echo $_POST['prenom'];
                        } ?>">
                        <p class="error"><?php if (!empty($errors['prenom'])) {
                                echo $errors['prenom'];
                            } ?></p>
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" value="<?php if (!empty($_POST)) {
                            echo $_POST['email'];
                        } ?>">
                        <p class="error"><?php if (!empty($errors['email'])) {
                                echo $errors['email'];
                            } ?></p>
                        <label for="subject">Sujet *</label>
                        <input class="subject" type="text" id="subject" name="subject"
                               value="<?php if (!empty($_POST)) {
                                   echo $_POST['subject'];
                               } ?>">
                        <p class="error"><?php if (!empty($errors['subject'])) {
                                echo $errors['subject'];
                            } ?></p>
                        <label for="message">Question *</label>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                        <p class="error"><?php if (!empty($errors['message'])) {
                                echo $errors['message'];
                            } ?></p>
                        <input id="submit" type="submit" name="submitted" value="Envoyer" class="submite">
                    </form>
                </div>
            </div>
            <?php } ?>
            <div id="accordion">
                <p class="faq">Foire aux questions</p>
                <button class="accordion"><span class="num">1 - </span>Puis-je envoyer mon analyse réseau si je ne suis
                    pas abonné?
                </button>
                <div class="panel">
                    <p>Oui vous pouvez nous envoyer votre analyse réseau gratuitement et vous assurer une réponse dans
                        les meilleurs délais. Cependant votre réponse sera sous forme de tableau simple sans plus de
                        détails, au contraire de notre rôle abonné qui lui aura une vue plus détaillées avec notamment
                        une analyse directe sur notre site ne nécessitant aucun logiciel</p>
                </div>

                <button class="accordion"><span class="num">2 - </span>Mon analyse réseau n'a pas le bon format que
                    dois-je faire?
                </button>
                <div class="panel">
                    <p>Afin d'analyser au mieux votre analyse réseau notre équipe a besoin d'un fichier comprenant
                        l'extension JSON générée par le logiciel WireShark ou encore TShark. Si vous êtes abonné vous
                        pouvez directement analyser votre réseau via notre site et cela en direct.</p>
                </div>
                <button class="accordion"><span class="num">3 - </span>Que m'apporte réellement le rôle abonné?</button>
                <div class="panel">
                    <p>En plus d'une utilisation de notre propre analyseur de réseau, le rôle abonné vous permet
                        d'accéder à un formulaire de contact plus personnalisé. Notre équipe prendra le soin de répondre
                        au mieux à vos questions et cela instantanément, de plus votre analyse réseau contiendra
                        notamment des graphiques expliquant en détails l'analyse.
                    </p>
                </div>
                <button class="accordion"><span class="num">4 - </span>Est-ce réellement sécurisé ?
                </button>
                <div class="panel">
                    <p>Oui notre système est 100% sécurisé avec une protection 24/24h de vos données personnelles sur
                        nos sites. Les informations de paiements ne sont pas stockées dans notre base de données afin de
                        vous permettre une sécurité en plus.</p>
                </div>
                <button class="accordion"><span class="num">5 - </span>Comment procéder a l'annulation de mon rôle?
                </button>
                <div class="panel">
                    <p>Une fois que vous avez souscris à notre rôle dit "abonné" vous receverez un email confirmant
                        votre souscription. Sur ce mail vous aurez la possiblité d'accéder à votre compte. Vous pourrez
                        vous désinscrire une fois le mois passé et seulement après. La souscription vous engage sur un
                        mois, vous n'aurez donc pas la possibilté de vous désinscrire pendant ce mois.</p>
                </div>
                <?php
                $number = 5;
                $sql = "SELECT * FROM questions";
                $resultat = $pdo->query($sql);
                $ligne = $resultat->fetch();
                if (!empty($_SESSION['login']['id'])) {
                    if (!empty($ligne['question'])) {
                        if (!empty($ligne['reponse'])) {
                            foreach ($ligne as $ligne['id_user']) {
                                $number++;
                                echo '
                <button class="accordion"><span class="num">' . $number . ' - </span>' . $ligne['question'] . '</button>
                <div class="panel">
                    <p>' . $ligne['reponse'] . '</p>
                </div>';
                            }
                        }
                    }
                }; ?>


            </div>
        </div>
    </div>

<?php include_once('inc/footer.php');