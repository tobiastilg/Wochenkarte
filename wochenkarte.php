<?php
session_start();
require_once 'models/Benutzer.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Required meta tags -->
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- einbinden der Bootstrap CSS Datei-->
    <title>Wochenkarte</title>
    <script type="application/javascript" src="js/index.js"></script>
    <!-- Einbinden der JavaScript-Datei -->
</head>

<body>
<div class="container">

    <?php
    if (!isset($_COOKIE['active'])){
        header("Location: index.php");
    }
    if (Benutzer::isLoggedIn()) { //wenn eingeloggt
        if (isset($_POST['logout'])) { //Formularverarbeitung, wenn man sich ausloggt
            Benutzer::logout();
        }
        ?>

        <h1 class="mt-5 mb-5 text-center" >Wochenkarte</h1>
        <div class="row">
            <div class="col-sm-4">
                <h3 class="mt-2 mb-2 text-center">Montag</h3>
                <img src="img/img_01.jpg" class="img-fluid rounded">
            </div>
            <div class="col-sm-4">
                <h3 class="mt-2 mb-2 text-center">Dienstag</h3>
                <img src="img/img_02.jpg" alt="img_02.jpg" class="img-fluid rounded">
            </div>
            <div class="col-sm-4">
                <h3 class="mt-2 mb-2 text-center">Mittwoch</h3>
                <img src="img/img_03.jpg" class="img-fluid rounded">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-4">
                <h3 class="mt-2 mb-2 text-center">Donnerstag</h3>
                <img src="img/img_04.jpg" class="img-fluid rounded">
            </div>
            <div class="col-sm-4">
                <h3 class="mt-2 mb-2 text-center">Freitag</h3>
                <img src="img/img_05.jpg" class="img-fluid rounded">
            </div>
            <div class="col-sm-4">
                <h3 class="mt-2 mb-2 text-center">Samstag</h3>
                <img src="img/img_07.jpg" class="img-fluid rounded">
            </div>
        </div>

        <form id="form_logout" action="wochenkarte.php" method="post">
            <div class="mt-3 row">
                <div class="col-sm-12 form-group" align="center">
                    <p>© Copyright Unsplash</p> <br>
                    <input type="submit" name="logout" class="btn btn-secondary" value="Logout"/>
                </div>
            </div>
        </form>

        <?php
    } else { //falls der Benutzer sich nicht eingeloggt hat
        ?>
            
        <div class="m-2 row">
            <div class="col-sm-12 form-group" align="center">
                <h2 class="mt-5 mb-5">401: Unauthorized</h2>
            </div>
        </div>
        
    <?php } ?>

</div>
</body>
</html>