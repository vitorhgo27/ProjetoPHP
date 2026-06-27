<?php
session_start();
require '../../conexao.php';

if (isset($_POST['create_cliente'])) {
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome-cliente']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email-cliente']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento-cliente']));

    if (
    empty($_POST['nome-cliente']) ||
    empty($_POST['email-cliente']) ||
    empty($_POST['data_nascimento-cliente'])) {
    $_SESSION['mensagem'] = 'Preencha todos os campos.';
    header('Location: ../../home.php');
    exit;
    }

    $sql = "INSERT INTO Clientes (Nome_Cliente, Email_Cliente, Nasc_Cliente) VALUES ('$nome', '$email', '$data_nascimento')";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Cliente criado com sucesso';
        header('Location: ../../Pages/clientePages/cliente-edit.php');
        exit;
    }else {
        $_SESSION['mensagem'] = 'Cliente não foi criado';
        header('Location: ../../home.php');
        exit;
    }
}

if (isset($_POST['update_cliente'])) {
    $cliente_id = mysqli_real_escape_string($conexao, $_POST['cliente-id']);

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome-cliente']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email-cliente']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento-cliente']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone-cliente']));
    $documento = mysqli_real_escape_string($conexao, trim($_POST['documento-cliente']));
    $cep = mysqli_real_escape_string($conexao, trim($_POST['cep-cliente']));
    $endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco-cliente']));
    $comp = mysqli_real_escape_string($conexao, trim($_POST['comp-cliente']));
    $obs = mysqli_real_escape_string($conexao, trim($_POST['obs-cliente']));

    $sql = "UPDATE Clientes SET Nome_Cliente = '$nome', Email_Cliente = '$email', 
            Nasc_Cliente = '$data_nascimento', Tel_Cliente = '$telefone', Doc_Cliente = '$documento',
            CEP_Cliente = '$cep', End_Cliente = '$endereco', Comp_Cliente = '$comp', Obs_Cliente = '$obs'
            WHERE Cod_Cliente = '$cliente_id'";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Cliente atualizado com sucesso';
        header('Location: ../../Pages/clientePages/cliente-perfil.php');
        exit;
    }else {
        $_SESSION['mensagem'] = 'Cliente não foi atualizado';
        header('Location: ../../Pages/clientePages/cliente-perfil.php');
        exit;
    }
}

if (isset($_POST['delete_cliente'])) {
    $cliente_id = mysqli_real_escape_string($conexao, $_POST['delete_cliente']);
    
    $sql = "DELETE FROM Clientes WHERE Cod_Cliente = $cliente_id";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Cliente Deletado com Sucesso';
        header('Location: ../../home.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Cliente Não Deletado';
        header('Location: ../../home.php');
        exit;
    }
}


?>