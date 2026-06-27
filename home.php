<?php
require 'conexao.php';
require 'auth.php';
require 'database.php';
inicializarBanco($conexao);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <?php include('mensagem.php'); ?>
                <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Agendamentos
                            <a href="/pages/agendaPages/agenda-create.php" class="btn btn-primary float-end">Adicionar Agendamento</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Telefone</th>
				                    <th>Profissional</th>
				                    <th>Auxiliar</th>
				                    <th>Procedimento</th>
				                    <th>Data</th>
				                    <th>Horário</th>
				                    <th>Status</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT A.Cod_Agenda, C.Nome_Cliente, C.Tel_Cliente, P1.Nome_Profissional as Profissional, P2.Nome_Profissional AS Auxiliar,
					                    S.Descricao_Servico, A.Data_Agenda, A.Hora_Agenda, A.Status_Agenda
					                    FROM Agenda A
					                    LEFT JOIN Clientes C ON C.Cod_Cliente = A.Cliente_Agenda
					                    LEFT JOIN Profissional P1 ON P1.Cod_Profissional = A.Profissional_Agenda
					                    LEFT JOIN Profissional P2 ON P2.Cod_Profissional = A.Auxiliar_Agenda
					                    LEFT JOIN Servicos S ON S.Cod_Servico = Servico_Agenda
					                    ORDER BY A.Data_Agenda ASC, A.Hora_Agenda ASC';
                                $agendamentos = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($agendamentos) > 0) {
                                    foreach($agendamentos as $agenda) {
                                ?>
                                <tr>
                                    <td><?=$agenda['Nome_Cliente']?></td>
                                    <td><?=$agenda['Tel_Cliente']?></td>
                                    <td><?=$agenda['Profissional']?></td>
                                    <td><?=$agenda['Auxiliar']?></td>
                                    <td><?=$agenda['Data_Agenda']?></td>
                                    <td><?=$agenda['Hora_Agenda']?></td>
                                    <td><?=$agenda['Status_Agenda']?></td>
                                    <td>
                                        <a href="/pages/agendaPages/agenda-home.php?Cod_Agenda=<?=$agenda['Cod_Agenda']?>" class="btn btn-secondary btn-sm"><span class="bi bi-eye-fill"></span> Iniciar </a>
                                        <a href="/pages/agendaPages/agenda-edit.php?Cod_Agenda=<?=$agenda['Cod_Agenda']?>" class="btn btn-success btn-sm"><span class="bi bi-sliders"></span> Editar</a>
                                        <form action="/Modules/Agenda/agendaController.php" method="POST" class="d-inline">
                                            <button onclick="return confirm('Deseja cancelar Agendamento?')" type="submit" name="cancel_agenda" value="<?=$agenda['Cod_Agenda']?>" class="btn btn-danger btn-sm"><span class="bi bi-trash3"></span>
                                                Cancelar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                } 
                                } else {
                                    print '<h5>Nenhum Agendamento Encontrado</h5>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Clientes
                            <a href="/pages/clientePages/cliente-create.php" class="btn btn-primary float-end">Adicionar Cliente</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Cliente</th>
                                    <th>Email</th>
                                    <th>Data de Nascimento</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM Clientes';
                                $clientes = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($clientes) > 0) {
                                    foreach($clientes as $cliente) {
                                ?>
                                <tr>
                                    <td><?=$cliente['Cod_Cliente']?></td>
                                    <td><?=$cliente['Nome_Cliente']?></td>
                                    <td><?=$cliente['Email_Cliente']?></td>
                                    <td><?=date('d/m/Y', strtotime($cliente['Nasc_Cliente']))?></td>
                                    <td>
                                        <a href="/pages/clientePages/cliente-perfil.php?Cod_Cliente=<?=$cliente['Cod_Cliente']?>" class="btn btn-secondary btn-sm"><span class="bi bi-eye-fill"></span> Perfil </a>
                                        <a href="/pages/clientePages/cliente-edit.php?Cod_Cliente=<?=$cliente['Cod_Cliente']?>" class="btn btn-success btn-sm"><span class="bi bi-sliders"></span> Editar</a>
                                        <form action="/Modules/Cliente/clienteController.php" method="POST" class="d-inline">
                                            <button onclick="return confirm('Deseja excluir Cliente?')" type="submit" name="delete_cliente" value="<?=$cliente['Cod_Cliente']?>" class="btn btn-danger btn-sm"><span class="bi bi-trash3"></span>
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                } 
                                } else {
                                    print '<h5>Nenhum Cliente Encontrado</h5>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>