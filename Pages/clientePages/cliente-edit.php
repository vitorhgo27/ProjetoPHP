<?php
require '../../conexao.php';
require '../../auth.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php include('../../navbar.php'); ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Cliente
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
                            <form action="../../Modules/Cliente/clienteController.php" method="POST">
                                <label>Codigo</label><br>
                                <input class="hidden" name="cliente-id" value="<?=$cliente['Cod_Cliente']?>">
                                <div class="mb-3">
                                    <label>Nome</label>
                                    <input type="text" name="nome-cliente" value="<?=$cliente['Nome_Cliente']?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="text" name="email-cliente" value="<?=$cliente['Email_Cliente']?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Data de Nascimento</label>
                                    <input type="date" name="data_nascimento-cliente" value="<?=$cliente['Nasc_Cliente']?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Telefone</label>
                                    <input type="bigint" name="telefone-cliente" value="<?=$cliente['Tel_Cliente']?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Documento</label>
                                    <input type="bigint" name="documento-cliente" value="<?=$cliente['Doc_Cliente']?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>CEP</label>
                                    <input type="int" name="cep-cliente" value="<?=$cliente['CEP_Cliente']?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Endereço</label>
                                    <input type="text" name="endereco-cliente" value="<?=$cliente['End_Cliente']?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Complemento - Endereço</label>
                                    <input type="text" name="comp-cliente" value="<?=$cliente['Comp_Cliente']?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Observações</label>
                                    <input type="text" name="obs-cliente" value="<?=$cliente['Obs_Cliente']?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_cliente" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                            <?php
                            } else {
                                print "<h4>Cliente não encontrado</h4>";
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>