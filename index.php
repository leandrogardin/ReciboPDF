<?php
session_start();

require_once("checarLogin.php");

//session da sinal

unset($_SESSION['nomeVendedor']);
unset($_SESSION['cpfCnpjVendedor']);
unset($_SESSION['rgVendedor']);
unset($_SESSION['enderecoVendedor']);
unset($_SESSION['nomeComprador']);
unset($_SESSION['rgComprador']);
unset($_SESSION['cpfComprador']);
unset($_SESSION['enderecoComprador']);
unset($_SESSION['foneComprador']);
unset($_SESSION['emailComprador']);
unset($_SESSION['nomeConjuge']);
unset($_SESSION['rgConjuge']);
unset($_SESSION['cpfConjuge']);
unset($_SESSION['numMatricula']);
unset($_SESSION['descricaoImovel']);
unset($_SESSION['totalImovel']);
unset($_SESSION['sinal']);
unset($_SESSION['financiamento']);
unset($_SESSION['formapagamento']);
unset($_SESSION['outroPagamento']);
unset($_SESSION['clausula8']);
unset($_SESSION['clausula4']);
unset($_SESSION['conta']);
unset($_SESSION['cri']);
unset($_SESSION['obsclausula']);
unset($_SESSION['obsclausula2']);
unset($_SESSION['responsavel']);
unset($_SESSION['creci']);
unset($_SESSION['nometestemunha1']);
unset($_SESSION['cpftestemunha1']);
unset($_SESSION['nometestemunha2']);
unset($_SESSION['cpftestemunha2']);
unset($_SESSION['comsem']);
//session da ficha
unset($_SESSION['obsimovel']);
unset($_SESSION["cliente"]);
unset($_SESSION["estadocivil"]);
unset($_SESSION["rg"]);
unset($_SESSION["cpf"]);
unset($_SESSION["naturalidade"]);
unset($_SESSION["endereco"]);
unset($_SESSION["bairro"]);
unset($_SESSION["cidade"]);
unset($_SESSION["email"]);
unset($_SESSION["celular"]);
unset($_SESSION["comercial"]);
unset($_SESSION["tipoimovel"]);
unset($_SESSION["enderecoimovel"]);
unset($_SESSION["bairroimovel"]);
unset($_SESSION["cidadeimovel"]);
unset($_SESSION["proximo"]);
unset($_SESSION["edificil"]);
unset($_SESSION["areaconstruida"]);
unset($_SESSION["areautil"]);
unset($_SESSION["areadoterreno"]);
unset($_SESSION["quadra"]);
unset($_SESSION["lote"]);
unset($_SESSION["idade"]);
unset($_SESSION["condominio"]);
unset($_SESSION["valorcondominio"]);
unset($_SESSION["obs"]);
unset($_SESSION["valorimovel"]);
unset($_SESSION["outrobem"]);
unset($_SESSION["valoroutrobem"]);
unset($_SESSION["autorizocri"]);
unset($_SESSION["autorizocidade"]);
unset($_SESSION["validade"]);
unset($_SESSION["comissao"]);
unset($_SESSION["cidade"]);
unset($_SESSION["diames"]);
unset($_SESSION["cidadediames"]);

unset($_SESSION['checkcasa']);
unset($_SESSION['checksobrado']);
unset($_SESSION['checkapartamento']);
unset($_SESSION['checkterreno']);
unset($_SESSION['checkchacara']);
unset($_SESSION['checksitio']);
unset($_SESSION['checkloja']);
unset($_SESSION['checkbarracao']);
unset($_SESSION['checkresidencial']);
unset($_SESSION['checkcomercial']);



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
                    <div class="row">
                        <p>Bem vindo, <?php echo $_SESSION['vendedor']; ?></p>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="recibos.php">Ver todos recibos</a></li>
                                <?php if ($_SESSION['admin'] == true) { ?>
                                <li class="list-group-item"><a href="cadastro.php">Vendedores</a></li>
                                <li class="list-group-item"><a href="config.php">Configurações</a></li>
                                <?php } ?>

                                <li class="list-group-item"><a href="logout.php">Sair</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row float-right">
                        <a href="sinal/formulario.php" class="btn btn-success">+ Novo Sinal</a>
                    </div>
                    <br><br>
                    <div class="row float-right">
                        <a href="ficha/formulario.php" class="btn btn-success">+ Nova Ficha</a>
                    </div>

                </div>


            </div>
        </div>


        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <script src="vendor/jquery.mask.min.js"></script>


</body>

</html>