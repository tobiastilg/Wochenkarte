<?php
session_start();

//erstellt das Cookie nach dem Akzeptieren und schickt uns wieder zurück auf unsere index.php
if (isset($_POST['cookie'])) {
    setcookie('active', 1, time() + 10);
    header("Location: index.php");
}