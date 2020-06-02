<?php
session_start();

require_once("checarLogin.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Configurações Recibo Online</title>

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
                        <div class="col-10">
                            O sistema de recibo da funciona da seguinte forma: Um pdf base é usado como fundo assim os campos preenchiveis estarão fixados em um posicionamento X e Y do pdf onde condis com o local apropriado com base no PDF-PADRÃO.
                            Nessa tela você pode alterar o PDF-PADRÃO porém buscar tentar manter a mesma distancia entre campos preenchiveis. Quais quer erro de posicionamento
                            na geração do recibo, entre em contato com nosso equipe de desenvolvimento atraves do email: leandro.ivp@hotmail.com
                        </div>
                        <div class="col-2">
                            <img src="img/pdfbase.png" alt="" width="150px">
                        </div>

                    </div>
                    <br>
                    <br>
                    <form method="POST" action="" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Novo PDF</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="novopdf" class="custom-file-input" id="pdf" disabled>
                            <label class="custom-file-label" for="pdf">Selecionar PDF</label>
                        </div>
                    </div>  
    
                    <br>

                    <div class="row float-right">
                        <input type="submit" name="upload" class="btn btn-success" value="Salvar" disabled>
                    </div> 
                </form>
                    <a href="index.php" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </div>

<?php
if(isset($_POST['upload'])){
        
    
if (move_uploaded_file($_FILES['novopdf']['tmp_name'], "padrao/novo/exemplo.pdf")) {
    echo "Arquivo válido e enviado com sucesso";
}
}
    ?>

        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <script src="vendor/jquery.mask.min.js"></script>


</body>

</html>