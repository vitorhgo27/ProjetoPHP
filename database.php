<?php
require_once 'Modules/User/UserTable.php';
require_once 'Modules/Cliente/clienteTable.php';

function criarBanco($conexao) {
	$sql = "CREATE TABLE IF NOT EXISTS schema_version (
		version INT AUTO_INCREMENT NOT NULL)";

	mysqli_query($conexao, $sql);

	criarUsers($conexao);
	criarClientes($conexao);
}


function inicializarBanco($conexao) {
	$result = mysqli_query($conexao,
	"SHOW TABLES LIKE 'schema_version'");

	if (mysqli_num_rows($result) > 0) 
	{
		criarBanco($conexao);
	}
}

?>