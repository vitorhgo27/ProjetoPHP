<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header ('Location: Login/login.php');
    exit;
}
$tempo_maximo = 8*60*60;

if (isset($_SESSION['login_time']) &&
    (time() - $_SESSION['login_time']) > $tempo_maximo) {
        session_unset();
        session_destroy();

        header('location: Login/login.php');
        exit;
    }

?>