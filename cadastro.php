<?php

$json_file = file_get_contents("banco/vendedores.json");
$array = json_decode($json_file, true);

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Recibo Online</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/Magnific-Popup/magnific-popup.css" rel="stylesheet">
    <link href="vendor/estilo.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <script src="vendor/jquery.mask.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      #0c2461
    <![endif]-->

</head>

<body>

    <div class="container">


        <div class="card">
            <div class="card-img-top text-center titulo-inicio">
                <img src="img/logo.png" alt="logo">
            </div>
            <div class="card-body">
                <div class="container">
                    <p>Todos vendedores cadastrados</p>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">

                                <?php
                                for ($i = 0; $i < count($array); $i++) {
                                    echo '<li class="list-group-item"><a href="#">' . $array[$i]['nome'] . '</a>   <span class="float-right"><span class="badge badge-primary">Cpf/Cnpj: ' . $array[$i]['cpfCnpj'] . '</span> <span class="badge badge-info">Cod acesso: ' . $array[$i]['cod'] . '</span></span></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <a href="index.php" class="btn btn-danger">Voltar</a>
                    <div class="row float-right">
                        <button href="formulario.php" class="btn btn-success" data-toggle="modal" data-target="#novocadastro">Novo cadastro</button>
 </div>
                </div>


            </div>
        </div>
        <?php


if (isset($_POST['cadastrovendedor'])) {                                       
    $array[$i]['nome'] = $_POST['nomeVendedor'];
    $array[$i]['cpfCnpj'] = $_POST['cpfCnpjVendedor'];
    $array[$i]['cod'] = $i;
    $array[$i]['senha'] = $_POST['senha'];
    $dados_json = json_encode($array);    
    file_put_contents('banco/vendedores.json', $dados_json);
    echo "Cadastrado com sucesso";       
}
?>

        <div class="modal fade" id="novocadastro" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar novo vendedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="cadastro.php">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nome completo do vendedor</label>
                                        <input type="text" class="form-control" name="nomeVendedor" value="" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">CPF/CNPJ</label>
                                        <input type="text" class="form-control cpfcnpj" name="cpfCnpjVendedor" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Senha</label>
                                        <input type="password" class="form-control cpfcnpj" name="senha" value="" required>
                                    </div>
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submitt" class="btn btn-success" name="cadastrovendedor">Salvar</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
                                
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <script src="vendor/jquery.mask.min.js"></script>


</body>

</html>