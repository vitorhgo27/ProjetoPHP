<?php
// Copie para conexao.php. Defina as variaveis no ambiente do processo PHP.
// Este arquivo nao carrega .env automaticamente.
$host = getenv('DB_HOST') ?: '127.0.0.1';
$database = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$port = (int) (getenv('DB_PORT') ?: 3306);
if ($database === false || $username === false || $password === false) {
    throw new RuntimeException('Configure DB_NAME, DB_USER e DB_PASSWORD.');
}
$conexao = mysqli_connect($host, $username, $password, $database, $port);
if (!$conexao) {
    throw new RuntimeException('Falha ao conectar ao banco.');
}
mysqli_set_charset($conexao, 'utf8mb4');