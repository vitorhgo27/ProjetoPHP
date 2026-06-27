<?php

function criarAgenda($conexao) {
	$sql = "CREATE TABLE IF NOT EXISTS Agenda (
		Cod_Agenda BIGINT PRIMARY KEY AUTO_INCREMENT,
		Cliente_Agenda BIGINT NOT NULL,
		Profissional_Agenda BIGINT NOT NULL,
		Auxiliar_Agenda BIGINT NULL,
		Servico_Agenda BIGINT NOT NULL,
		Data_Agenda DATE NOT NULL,
		Hora_Agenda TIME NOT NULL,
        Hora_Fim TIME NOT NULL,
		Status_Agenda VARCHAR(20) NOT NULL,
		Data_Criacao DATETIME NOT NULL,
		User_Criacao INT NOT NULL,
		FOREIGN KEY (Cliente_Agenda) REFERENCES Clientes(Cod_Cliente),
		FOREIGN KEY (Profissional_Agenda) REFERENCES Profissional(Cod_Profissional),
		FOREIGN KEY (Auxiliar_Agenda) REFERENCES Profissional(Cod_Profissional),
		FOREIGN KEY (User_Criacao) REFERENCES Users(Id_User),
		FOREIGN KEY (Servico_Agenda) REFERENCES Servicos(Cod_Servico))";

	mysqli_query($conexao, $sql);
}

?>
