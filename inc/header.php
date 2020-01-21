<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php if (!empty($title)) {
            echo $title;
        } else {
            echo '';
        } ?></title>
    <!--<link rel="stylesheet" href="assets/css/style.css">-->
<link rel="stylesheet" href="assets/css/boubou.css">
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
    <nav class="navbar navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand" ><img src="assets/img/image2vector.svg" class="logo"></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            <?php if (!isLogged()) { ?>

                <li class="nav-item"><a href="register.php" class="nav-link">Inscription</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link">Connexion</a></li>
                <li class="nav-item"><a href="quisommesnous.php" class="nav-link">Qui sommes nous ?</a></li>
                <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>


            <?php } elseif (idAdmin()) { ?>
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Deconnexion</a></li>
                <li class="nav-item"><a href="admin.php" class="nav-link">Pannel admin</a></li>
                <li class="bienvenue">Bonjour <?php echo $_SESSION['login']['pseudo'] ?> !</li>

            <?php } else { ?>
                <li class="nav-item"><a href="logout.php" class="nav-link">Deconnexion</a></li>
                <li class="nav-item"><a href="quisommesnous.php" class="nav-link">Qui sommes nous ?</a></li>
                <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>
