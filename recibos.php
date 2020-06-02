<?php
require_once("checarLogin.php");
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
                    <p>Sinais e fichas geradas, para realizar uma busca aperte ( Ctrl + F ) do seu teclado.</p>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                        <h3> Todos sinais </h3>
                            <ul class="list-group">
                                <?php
                                $site = "http://www.sistemasdominus.com.br/recibo/";
                                $path = "sinal/pdf/";
                                $diretorio = dir($path);

                                while ($arquivo = $diretorio->read()) {
                                    if ($arquivo != ".." and $arquivo != ".") {
                                        echo "<li class='list-group-item'><a target='_blank' href='" . $path . $arquivo . "'>" . $arquivo . "</a><span class='float-right'><a target='_app' href='" . $path . $arquivo . "'><span class='badge badge-primary'>Visualizar</span></a> <a target='_app' href='https://api.whatsapp.com/send?text=Novo recibo gerado clique no link para baixar " . $site . $path . $arquivo . "'><span class='badge badge-success'>Compartilhar</span></a></span> </li><br />";
                                    }
                                }
                                $diretorio->close();

                                ?>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <h3> Todas fichas </h3>
                            <ul class="list-group">
                                <?php
                                $site = "http://www.sistemasdominus.com.br/recibo/";
                                $path = "ficha/pdf/";
                                $diretorio = dir($path);

                                while ($arquivo = $diretorio->read()) {
                                    if ($arquivo != ".." and $arquivo != ".") {
                                        echo "<li class='list-group-item'><a target='_blank' href='" . $path . $arquivo . "'>" . $arquivo . "</a><span class='float-right'><a target='_app' href='" . $path . $arquivo . "'><span class='badge badge-primary'>Visualizar</span></a> <a target='_app' href='https://api.whatsapp.com/send?text=Novo recibo gerado clique no link para baixar " . $site . $path . $arquivo . "'><span class='badge badge-success'>Compartilhar</span></a></span> </li><br />";
                                    }
                                }
                                $diretorio->close();

                                ?>
                            </ul>
                        </div>

                    </div>
                    <br>
                    <a href="index.php" class="btn btn-danger">Voltar</a>

                </div>


            </div>
        </div>



        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <script src="vendor/jquery.mask.min.js"></script>


</body>

</html>