<?php

function criarProfissional($conexao) {
	$sql = "CREATE TABLE IF NOT EXISTS Profissional (
		Cod_Profissional BIGINT PRIMARY KEY AUTO_INCREMENT,
		Nome_Profissional VARCHAR(50) NOT NULL,
		Email_Profissional VARCHAR(100) NOT NULL,
		Tel_Profissional BIGINT NOT NULL,
		Doc_Profissional BIGINT NOT NULL,
		Esp_Profissional VARCHAR(255) NULL)";

	mysqli_query($conexao, $sql);
}

?>
