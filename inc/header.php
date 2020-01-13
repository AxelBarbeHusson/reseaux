<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php if (!empty($title)) {
            echo $title;
        } else {
            echo '';
        } ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

</head>
<body>
<header>
<img src="assets/img/image2vector.svg" class="logo">
    <nav>
        <ul>
            <?php if (!isLogged()) { ?>
                <li><a href="register.php">Inscriptions</a></li>
                <li><a href="login.php">Connexion</a></li>



            <?php }elseif(idAdmin()){?>
                <li><a href="logout.php">Deconnexion</a></li>
                <li><a href="admin.php">Pannel admin</a></li>
                <li class="bienvenue">Bonjour <?php echo $_SESSION['login']['pseudo'] ?> !</li>

           <?php }  else { ?>
                <div class="head2">
            <li><a href="logout.php">Deconnexion</a></li>

                </div>

            <li class="bienvenue">Bonjour <?php echo $_SESSION['login']['pseudo'] ?> !</li>
            <?php }?>
        </ul>
    </nav>
    <div class="clear"></div>
</header>
