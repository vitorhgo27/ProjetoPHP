<?php

function criarUsers($conexao) {
	$sql = "CREATE TABLE IF NOT EXISTS Users (
		Id_User BIGINT PRIMARY KEY AUTO_INCREMENT,
		username VARCHAR(50) NOT NULL,
		email VARCHAR(100) NOT NULL,
		data_nascimento DATE NOT NULL,
		senha VARCHAR(255) NOT NULL)";

	mysqli_query($conexao, $sql);
}

?>
