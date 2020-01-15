<?php
session_start();
require('inc/pdo.php');
require('function/function.php');
$title = 'Connexion';
$errors = array();
$success = false;
if (!empty($_POST['submitted'])) {
    $login = clean($_POST['login']);
    $password = clean($_POST['password']);

    if (empty($login) || empty($password)) {
        $errors['login'] = 'Veuillez renseigner ce champ';
    } else {
        $sql = "SELECT * FROM users WHERE pseudo = :login OR email = :login";
        $query = $pdo->prepare($sql);
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        if (!empty($user)) {
            //debug($user);

            if (password_verify($password, $user['password'])) {
                //die('ok');
                $_SESSION['login'] = array(
                    'id' => $user['id'],
                    'pseudo' => $user['pseudo'],
                    'role' => $user['role'],
                    'ip' => $_SERVER['REMOTE_ADDR']
                );
                //debug($_SESSION);
            } else {
                $errors['login'] = 'Pseudo or Email inconnu / Mot de passe oublié';
            }

        } else {
            $errors['login'] = 'Pseudo or Email inconnu';
        }
    }

}
include('inc/header.php');
?>
<div class="wrap2">
    <h1 class="formulaire">Connexion</h1>
    <div class="backform">
    <form class="inscri" action="login.php" method="post">
        <label from="login">Pseudo ou email *</label>
        <input type="text" name="login" id="login" value="<?php if (!empty($_POST['login'])) {
            echo $_POST['login'];
        } ?>">
        <p class="error"><?php if (!empty($errors['login'])) {
                echo $errors['login'];
            } ?></p>

        <label from="password">Mot de passe *</label>
        <input type="password" name="password" id="password" value="">
        <p class="error"><?php if (!empty($errors['password'])) {
                echo $errors['password'];
            } ?></p>

        <input type="submit" name="submitted" value="Connectez-vous" class="submit">
        <a href="forgetpsw.php" class="forgot">Mot de passe oublié ?</a>
    </form>
    </div>
</div>
<?php
include('inc/footer.php');