<?php
define('HOST', '127.0.0.1');
define('PORT', 3307);
define('USUARIO', 'root');
define('SENHA', 'root');
define('DB', 'projetophp');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB, PORT) or die('Não foi possível conectar');
?>