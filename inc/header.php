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
    <link rel="stylesheet" media="screen and (max-width: 700px)" href="style.css" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<header>
    <nav>

        <ul>

            <?php if (!isLogged()) { ?>
                <a href="index.php"><img src="assets/img/image2vector.svg" class="logo"></a>
                <li><a href="register.php">Inscription</a></li>
                <li><a href="login.php">Connexion</a></li>
                <li><a href="quisommesnous.php">Qui sommes nous ?</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>


            <?php }elseif(idAdmin()){?>
                <li><a href="logout.php">Deconnexion</a></li>
                <li><a href="admin.php">Pannel admin</a></li>
                <li class="bienvenue">Bonjour <?php echo $_SESSION['login']['pseudo'] ?> !</li>

           <?php }  else { ?>
                    <a href="index.php"><img src="assets/img/image2vector.svg" class="logo"></a>
            <li><a href="logout.php">Deconnexion</a></li>
                    <li><a href="quisommesnous.php">Qui sommes nous ?</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
            <?php }?>
        </ul>
    </nav>
</header>
