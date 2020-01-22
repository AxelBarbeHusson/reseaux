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

    <script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet'/>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" media="screen and (max-width: 700px)" href="style.css" type="text/css" /> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<header>
    <nav>
        <a href="index.php"><img src="assets/img/image2vector.svg" class="logo"></a>
        <ul >

            <?php if (!isLogged()) { ?>

                <li><a href="register.php" >Inscription</a></li>
                <li><a href="login.php" >Connexion</a></li>
                <li><a href="quisommesnous.php" >Qui sommes nous ?</a></li>
                <li><a href="services.php" >Services</a></li>
                <li><a href="contact.php" >Contact</a></li>


            <?php } elseif (idAdmin()) { ?>
                <li><a href="index.php" >Home</a></li>
                <li><a href="logout.php" >Deconnexion</a></li>
                <li><a href="admin.php" >Pannel admin</a></li>
                <li>Bonjour <?php echo $_SESSION['login']['pseudo'] ?> !</li>

            <?php } else { ?>
                <li><a href="logout.php" >Deconnexion</a></li>
                <li><a href="quisommesnous.php" >Qui sommes nous ?</a></li>
                <li><a href="services.php" >Services</a></li>
                <li ><a href="contact.php" >Contact</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>
