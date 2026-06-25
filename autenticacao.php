<?php

session_start();
require 'conexao.php';

$username = mysqli_real_escape_string($conexao, $_POST['username']);
$senha = $_POST['senha'];


$sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
$query = mysqli_query($conexao, $sql);

if (mysqli_num_rows($query) == 1) {
    $usuario = mysqli_fetch_assoc($query);
    if (password_verify($senha, $usuario['Senha'])) {
        session_regenerate_id(true);

        $_SESSION['usuario_id'] = $usuario['Id_User'];
        $_SESSION['usuario_nome'] = $usuario['Username'];
        $_SESSION['login_time'] = time();

        header('Location: home.php');
        exit;
    }
}

$_SESSION['mensagem'] = 'Username ou senha inválidos';
header('Location: home.php');
exit;

?>