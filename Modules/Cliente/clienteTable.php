<?php

function criarClientes($conexao){
	$sql = "CREATE TABLE IF NOT EXISTS Clientes(
		Cod_Cliente BIGINT PRIMARY KEY AUTO_INCREMENT,
		Nome_Cliente VARCHAR(100) NOT NULL,
		Nasc_Cliente DATE,
		Tel_Cliente BIGINT,
		Email_Cliente VARCHAR(100),
		Doc_Cliente BIGINT,
		CEP_Cliente INT,
		End_Cliente VARCHAR(100), 
		Comp_Cliente VARCHAR(50),
		Obs_Cliente TEXT)";

	mysqli_query($conexao, $sql);
}

?>
