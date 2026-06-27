<?php
session_start();
require '../../conexao.php';

if (isset($_POST['create_profissional'])) {
    $nome = mysqli_real_escape_string($conexao, trim($_POST['Nome_Profissional']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['Email_Profissional']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['Tel_Profissional']));
    $documento = mysqli_real_escape_string($conexao, trim($_POST['Doc_Profissional']));
    $especialidade = mysqli_real_escape_string($conexao, trim($_POST['Esp_Profissional']));

    if (
    empty($_POST['Nome_Profissional']) ||
    empty($_POST['Email_Profissional']) ||
    empty($_POST['Tel_Profissional']) ||
    empty($_POST['Doc_Profissional'])) {
    $_SESSION['mensagem'] = 'Preencha todos os campos.';
    header('Location: ../../Pages/profissionalPages/profissional-home.php');
    exit;
    }

    $sql = "INSERT INTO Profissional (Nome_Profissional, Email_Profissional, Tel_Profissional, Doc_Profissional, Esp_Profissional) VALUES ('$nome', '$email', '$telefone', '$documento', '$especialidade')";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Profissional criado com sucesso';
        header('Location: ../../Pages/profissionalPages/profissional-home.php');
        exit;
    }else {
        $_SESSION['mensagem'] = 'Usuário não foi criado';
        header('Location: ../../Pages/profissionalPages/profissional-home.php');
        exit;
    }
}

?>