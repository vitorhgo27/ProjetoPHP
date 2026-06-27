<?php
require '../../conexao.php';
require '../../auth.php';
require '../../database.php';
inicializarBanco($conexao);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto PHP - Procedimentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    </head>
  <body>
    <?php include('../../navbar.php'); ?>
    <div class="container mt-4">
        <?php include('../../mensagem.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Lista de Procedimentos
                            <a href="servico-create.php" class="btn btn-primary float-end">Adicionar Procedimento</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Descrição</th>
                                    <th>Duração</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM Servicos';
                                $servicos = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($servicos) > 0) {
                                    foreach($servicos as $servico) {
                                ?>
                                <tr>
                                    <td><?=$servico['Cod_Servico']?></td>
                                    <td><?=$servico['Descricao_Servico']?></td>
                                    <td><?=$servico['Duracao_Servico']?></td>
                                    <td>
                                        <a href="servico-view.php?Cod_Servico=<?=$servico['Cod_Servico']?>" class="btn btn-secondary btn-sm"><span class="bi bi-eye-fill"></span> Visualizar</a>
                                        <a href="servico-edit.php?Cod_Servico=<?=$servico['Cod_Servico']?>" class="btn btn-success btn-sm"><span class="bi bi-sliders"></span> Editar</a>
                                        <form action="../../Modules/Servico/servicoController.php" method="POST" class="d-inline">
                                            <button onclick="return confirm('Deseja Inativar Serviço?')" type="submit" name="inativar_servico" value="<?=$servico['Cod_Servico']?>" class="btn btn-danger btn-sm"><span class="bi bi-trash3"></span>
                                                Inativar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                } 
                                } else {
                                    print '<h5>Nenhum Serviço Encontrado</h5>';
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
