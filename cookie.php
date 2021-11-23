<?php
/*kein session_start(); notwendig, da in index.php (header Weiterleitung) die Session gestartet wird
  → auf diese Seite greife ich als User nie zu*/
//erstellt das Cookie nach dem Akzeptieren und schickt uns wieder zurück auf unsere index.php
if (isset($_POST['cookie'])) {
    setcookie('active', 1, time() + 3600);
    header("Location: index.php");
    exit();
}