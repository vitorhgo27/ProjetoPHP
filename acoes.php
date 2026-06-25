<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_usuario'])) {
    $nome = mysqli_real_escape_string($conexao, trim($_POST['username']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) : '';

    if (
    empty($_POST['username']) ||
    empty($_POST['email']) ||
    empty($_POST['data_nascimento']) ||
    empty($_POST['senha'])) {
    $_SESSION['mensagem'] = 'Preencha todos os campos.';
    header('Location: home.php');
    exit;
    }

    $sql = "INSERT INTO users (username, email, data_nascimento, senha) VALUES ('$nome', '$email', '$data_nascimento', '$senha')";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Usuário criado com sucesso';
        header('Location: home.php');
        exit;
    }else {
        $_SESSION['mensagem'] = 'Usuário não foi criado';
        header('Location: home.php');
        exit;
    }
}

if (isset($_POST['update_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);

    $nome = mysqli_real_escape_string($conexao, trim($_POST['username']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['usuario_id']));

    $sql = "UPDATE users SET username = '$nome', email = '$email', data_nascimento = '$data_nascimento'";

    if (!empty($senha)) {
        $sql .= ", senha='" . password_hash($senha, PASSWORD_DEFAULT) . "'";
    }

    $sql .= " WHERE Id_User = '$usuario_id'";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso';
        header('Location: home.php');
        exit;
    }else {
        $_SESSION['mensagem'] = 'Usuário não foi atualizado';
        header('Location: home.php');
        exit;
    }
}

if (isset($_POST['delete_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);
    
    $sql = "DELETE FROM users WHERE Id_user = $usuario_id";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Usuário Deletado com Sucesso';
        header('Location: home.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário Não Deletado';
        header('Location: home.php');
        exit;
    }
}

if (isset($_POST['update_senha'])) {
    $username = mysqli_real_escape_string($conexao, $_POST['username']);
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = trim($_POST['senha']);

    $sql = "SELECT Id_User FROM users
	    WHERE username = '$username'
	    AND email = '$email'";

    $query = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($query) == 0) {
        $_SESSION['mensagem'] = 'Usuário ou e-mail incorreto';
        header('Location: senha.php');
        exit;
    }
    $usuario = mysqli_fetch_assoc($query);
    $usuario_id = $usuario['Id_User'];
    if (empty($senha)) {
        $_SESSION['mensagem'] = 'Informe uma nova senha';
        header('Location: senha.php');
        exit;
    }

    if (!empty($senha)) {
        $hash = password_hash($senha,PASSWORD_DEFAULT);

        $sql = "UPDATE users SET Senha = '$hash'
                    WHERE Id_User = '$usuario_id'";

        mysqli_query($conexao, $sql);
        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'Senha atualizada com sucesso';
            header('Location: login.php');
            exit;
        } else {
            $_SESSION['mensagem'] = 'Senha não foi atualizada';
            header('Location: login.php');
            exit;
        }
    }
}

?>