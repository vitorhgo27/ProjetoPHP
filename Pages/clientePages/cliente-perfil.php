<?php
require '../../conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente - Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php include('../../navbar.php'); ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Perfil do Cliente
                                <a href="../../home.php" class="btn btn-danger float-end">Voltar</a>
                            </h4>
                        </div>
                        <div class="card-body">
                                <?php
                            if (isset($_GET['Cod_Cliente'])) {
                                $cliente_id = mysqli_real_escape_string($conexao, $_GET['Cod_Cliente']);
                                $sql = "SELECT * FROM Clientes WHERE Cod_Cliente = '$cliente_id'";
                                $query = mysqli_query($conexao, $sql);

                                if (mysqli_num_rows($query) > 0) {
                                    $cliente = mysqli_fetch_array($query);
                                ?>
                                <div class="mb-3">
                                    <label>Nome</label>
                                    <p class="form-control">
                                        <?=$cliente['Nome_Cliente'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <p class="form-control">
                                        <?=$cliente['Email_Cliente'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Data de Nascimento</label>
                                    <p class="form-control">
                                        <?=date('d/m/Y', strtotime($cliente['Nasc_Cliente']));?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Telefone</label>
                                    <p class="form-control">
                                        <?=$cliente['Tel_Cliente'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Documento</label>
                                    <p class="form-control">
                                        <?=$cliente['Doc_Cliente'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>CEP</label>
                                    <p class="form-control">
                                        <?=$cliente['CEP_Cliente'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Endereço</label>
                                    <p class="form-control">
                                        <?=$cliente['End_Cliente'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Complemento</label>
                                    <p class="form-control">
                                        <?=$cliente['Comp_Cliente'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Observações</label>
                                    <p class="form-control">
                                        <?=$cliente['Obs_Cliente'];?>
                                    </p>
                                </div>
                                <?php
                                } else {
                                    print "<h4>Cliente não encontrado</h4>";
                                }
                            }
                            ?>
                            <a href="cliente-edit.php?Cod_Cliente=<?=$cliente['Cod_Cliente']?>" class="btn btn-success btn-sm"><i class="bi bi-trash3"></i> Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>