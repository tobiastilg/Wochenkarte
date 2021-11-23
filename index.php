<?php
session_start(); //darf es weiter unten stehen (DSGVO)?
require_once "models/Benutzer.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Wochenkarte</title>
    <script type="application/javascript" src="js/index.js"></script>
</head>
<body>
<div class="mt-5 container border border-secondary rounded" style="max-width: 500px">

    <?php
    if (!isset($_COOKIE['active'])) {
    ?>

        <h1 class="m-2 text-center">Wochenkarte</h1>
        <p class="m-3 text-center">Bitte Cookies akzeptieren.</p>
        <form id="form_cookie" action="cookie.php" method="post">
            <div class="m-2 row">
                <div class="col-sm-12 form-group" align="center">
                    <input type="submit" name="cookie" class="btn btn-success" value="Cookies akzeptieren"/>
                </div>
            </div>
        </form>

        <?php
        } else {

        if (Benutzer::isLoggedIn()) {
            header("Location: wochenkarte.php");
            exit();
        }
            $message = '';
            $email = '';
            $password = '';

            if (isset($_POST['submit'])) { //Formularverarbeitung
                $email = ($_POST['login'] ?? '');
                $password = ($_POST['password'] ?? '');
                $user = Benutzer::get($email, $password);
                if ($user == null) { //überprüfen ob die Login Daten stimmen
                    $message .= "<div class='alert-danger form-control'><p>Die eingegebenen Daten sind fehlerhaft!</p></div>";
                } else {
                   $user->login();
                }
            }
        ?>

        <h1 class="m-2 text-center">Wochenkarten-Login</h1>
        <p class="m-3 text-center">Melden sie sich mit Ihren Daten an.</p>

        <div class="m-4">
            <?= $message ?>
        </div>


        <form action="index.php" method="post" id="userLogin">
            <div class="m-2 row">
                <div class="col-sm-12 form-group">
                    <input type="text"
                           name="login"
                           id="login"
                           placeholder="Benutzername"
                           class="form-control"
                           value="<?php htmlspecialchars($email) ?>"
                           required
                    />
                </div>
            </div>
            <div class="m-2 mt-3 row">
                <div class="col-sm-12 form-group">
                    <input type="password"
                           name="password"
                           id="password"
                           placeholder="Passwort"
                           class="form-control"
                           value="<?php htmlspecialchars($password) ?>"
                           required
                    />
                </div>
            </div>
            <div class="m-2 mt-3 row">
                <div class="col-sm-12 form-group" align="center">
                    <input type="submit" name="submit" class="btn btn-success" value="Login"/>
                </div>
            </div>
        </form>
    <?php } ?>
</div>
</body>
</html>