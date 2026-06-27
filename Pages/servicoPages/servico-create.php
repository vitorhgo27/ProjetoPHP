<?php
require '../../conexao.php';
require '../../auth.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto PHP - Procedimentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php include('../../navbar.php'); ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Adicionar Procedimento
                                <a href="servico-home.php" class="btn btn-danger float-end">Voltar</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="../../Modules/Servico/servicoController.php" method="POST">
                                <div class="mb-3">
                                    <label>Procedimento</label>
                                    <input type="text" name="Descricao_Servico" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Duração</label>
                                    <input type="time" name="Duracao_Servico" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="create_servico" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>