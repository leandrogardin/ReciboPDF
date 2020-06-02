<?php
session_start();
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
    <div class="tab-content">
      <div id="tela1" class="tab-pane active">
        <div class="card">
          <div class="card-img-top text-center titulo-inicio">
            <img src="img/logo.png" alt="logo">
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                  <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <form class="form-signin" action="" method="POST">
                      <div class="form-group">
                        <input type="text" id="cod" class="form-control" name="cod" placeholder="Codigo" required autofocus>
                      </div>

                      <div class="form-group">
                        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
                      </div>

                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Manter conectado</label>
                      </div>
                      <button class="btn btn-lg btn-primary btn-block text-uppercase" name="logar" type="submit">Entrar</button>

                    </form>
                    <?php
                    if (isset($_POST['logar'])) {

                      if ($_POST['cod'] == "1" and $_POST['senha'] == "123") {

                        $_SESSION['logado'] = true;
                        $_SESSION['vendedor'] = "Administrador";
                        $_SESSION['admin'] = true;
                        header('Location: index.php');
                      } else {

                        for ($i = 0; $i < count($array); $i++) {

                          if ($array[$i]["cod"] == $_POST['cod'] and $array[$i]["senha"] == $_POST['senha']) {

                            $_SESSION['logado'] = true;
                            $_SESSION['vendedor'] = $array[$i]["nome"];
                            $_SESSION['cpfcnpj'] = $array[$i]["cpfCnpj"];
                            $_SESSION['admin'] = false;
                            header('Location: index.php');
                          }
                        }
                      }
                    }

                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <script src="vendor/jquery.mask.min.js"></script>


</body>

</html>