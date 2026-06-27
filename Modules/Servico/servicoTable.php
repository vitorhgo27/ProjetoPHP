<?php

function criarServicos($conexao) {
	$sql = "CREATE TABLE IF NOT EXISTS Servicos (
		Cod_Servico BIGINT PRIMARY KEY AUTO_INCREMENT,
		Descricao_Servico VARCHAR(50) NOT NULL,
		Duracao_Servico TIME NULL)";

	mysqli_query($conexao, $sql);
}

?>
