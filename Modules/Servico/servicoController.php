<?php
session_start();
require '../../conexao.php';

if (isset($_POST['create_servico'])) {
    $descricao = mysqli_real_escape_string($conexao, trim($_POST['Descricao_Servico']));
    $duracao = mysqli_real_escape_string($conexao, trim($_POST['Duracao_Servico']));

    if (
    empty($_POST['Descricao_Servico']) ||
    empty($_POST['Duracao_Servico'])) {
    $_SESSION['mensagem'] = 'Preencha todos os campos.';
    header('Location: ../../Pages/servicoPages/servico-home.php');
    exit;
    }

    $sql = "INSERT INTO servicos (Descricao_Servico, Duracao_Servico) VALUES ('$descricao', '$duracao')";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Procedimento criado com sucesso';
        header('Location: ../../Pages/servicoPages/servico-home.php');
        exit;
    }else {
        $_SESSION['mensagem'] = 'Procedimento não foi criado';
        header('Location: ../../Pages/servicoPages/servico-home.php');
        exit;
    }
}

?>