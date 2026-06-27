<?php
require_once 'Modules/User/UserTable.php';
require_once 'Modules/Cliente/clienteTable.php';
require_once 'Modules/Profissional/profissionalTable.php';
require_once 'Modules/Servico/servicoTable.php';
require_once 'Modules/Agenda/agendaTable.php';


function criarBanco($conexao) {
	$sql = "CREATE TABLE IF NOT EXISTS schema_version (
		version INT AUTO_INCREMENT NOT NULL)";

	mysqli_query($conexao, $sql);

	criarUsers($conexao);
	criarClientes($conexao);
	criarProfissional($conexao);
	criarServicos($conexao);
	criarAgenda($conexao);

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