<?php
session_start();
require 'conexao.php';
require 'database.php';
inicializarBanco($conexao);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto PHP - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php include('navbar.php'); ?>
        <div class="container mt-4">
        <?php include('mensagem.php'); ?>
            <form action="autenticacao.php" method="POST">
                <input type="username" name="username" required>
                <input type="password" name="senha" required>
                <button type="submit">Entrar</button>
            </form>
            <a href="senha.php" class="btn btn-secondary btn-sm">Alterar Senha</a>
        </div>
  </body>
</html>