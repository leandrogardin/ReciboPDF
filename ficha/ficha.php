<?php
header("Content-Type: text/html; charset=utf-8", true);
session_start();

use setasign\Fpdi;
use setasign\fpdf;

require_once '../vendor/autoload.php';
require_once '../vendor/setasign/fpdf/fpdf.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Ficha</title>


  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/Magnific-Popup/magnific-popup.css" rel="stylesheet">
  <link href="../vendor/estilo.css" rel="stylesheet">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../vendor/jquery-3.2.1.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../vendor/Magnific-Popup/jquery.magnific-popup.min.js"></script>

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

    <?php
    if (isset($_POST['gerarficha'])) {

      $pdf = new Fpdi\Fpdi();

      $pdf->AddPage();


      $comsem = (isset($_POST["comsem"])) ? $_POST["comsem"] : " ";

     

      if($comsem == 'com'){
        $pagecount = $pdf->setSourceFile("ficha_com.pdf");
      }elseif($comsem == 'sem'){
        $pagecount = $pdf->setSourceFile("ficha_sem.pdf");
      }else{
        $pagecount = $pdf->setSourceFile("ficha.pdf");
      }


       $_SESSION['comsem'] = $comsem;
      $tpl = $pdf->importPage(1);
      //Use this page as template
      $pdf->useTemplate($tpl);




      $cliente = (isset($_POST["cliente"])) ? $_POST["cliente"] : "";
      $estadocivil = (isset($_POST["estadocivil"])) ? $_POST["estadocivil"] : "";
      $rg = (isset($_POST["rg"])) ? $_POST["rg"] : "";
      $cpf = (isset($_POST["cpf"])) ? $_POST["cpf"] : "";
      $naturalidade = (isset($_POST["naturalidade"])) ? $_POST["naturalidade"] : "";
      $endereco = (isset($_POST["endereco"])) ? $_POST["endereco"] : "";
      $bairro = (isset($_POST["bairro"])) ? $_POST["bairro"] : "";
      $cidade = (isset($_POST["cidade"])) ? $_POST["cidade"] : "";
      $email = (isset($_POST["email"])) ? $_POST["email"] : "";
      $celular = (isset($_POST["celular"])) ? $_POST["celular"] : "";
      $comercial = (isset($_POST["comercial"])) ? $_POST["comercial"] : "";
      $tipoimovel = (isset($_POST["tipoimovel"])) ? $_POST["tipoimovel"] : "";
      $enderecoimovel = (isset($_POST["enderecoimovel"])) ? $_POST["enderecoimovel"] : "";
      $bairroimovel = (isset($_POST["bairroimovel"])) ? $_POST["bairroimovel"] : "";
      $cidadeimovel = (isset($_POST["cidadeimovel"])) ? $_POST["cidadeimovel"] : "";
      $proximo = (isset($_POST["proximo"])) ? $_POST["proximo"] : "";
      $edificil = (isset($_POST["edificil"])) ? $_POST["edificil"] : "";
      $areaconstruida = (isset($_POST["areaconstruida"])) ? $_POST["areaconstruida"] : "";
      $areautil = (isset($_POST["areautil"])) ? $_POST["areautil"] : "";
      $areadoterreno = (isset($_POST["areadoterreno"])) ? $_POST["areadoterreno"] : "";
      $quadra = (isset($_POST["quadra"])) ? $_POST["quadra"] : "";
      $lote = (isset($_POST["lote"])) ? $_POST["lote"] : "";
      $idade = (isset($_POST["idade"])) ? $_POST["idade"] : "";
      $condominio = (isset($_POST["condominio"])) ? $_POST["condominio"] : "";
      $valorcondominio = (isset($_POST["valorcondominio"])) ? $_POST["valorcondominio"] : "";
      $obs = (isset($_POST["obs"])) ? $_POST["obs"] : "";
      $valorimovel = (isset($_POST["valorimovel"])) ? $_POST["valorimovel"] : "";
      $outrobem = (isset($_POST["outrobem"])) ? $_POST["outrobem"] : "";
      $valoroutrobem = (isset($_POST["valoroutrobem"])) ? $_POST["valoroutrobem"] : "";
      $autorizocidade = (isset($_POST["autorizocidade"])) ? $_POST["autorizocidade"] : "";
      $autorizocri = (isset($_POST["autorizocri"])) ? $_POST["autorizocri"] : "";
      $validade = (isset($_POST["validade"])) ? $_POST["validade"] : "";
      $comissao = (isset($_POST["comissao"])) ? $_POST["comissao"] : "";
      $cidade = (isset($_POST["cidade"])) ? $_POST["cidade"] : "";
      $diames = (isset($_POST["diames"])) ? $_POST["diames"] : "";
      $cidadediames = (isset($_POST["cidadediames"])) ? $_POST["cidadediames"] : "";
      $obsimovel = (isset($_POST["obsimovel"])) ? $_POST["obsimovel"] : "";

      $_SESSION["obsimovel"] = $obsimovel;
      $_SESSION["cliente"] = $cliente;
      $_SESSION["estadocivil"] = $estadocivil;
      $_SESSION["rg"] = $rg;
      $_SESSION["cpf"] = $cpf;
      $_SESSION["naturalidade"] = $naturalidade;
      $_SESSION["endereco"] = $endereco;
      $_SESSION["bairro"] = $bairro;
      $_SESSION["cidade"] = $cidade;
      $_SESSION["email"] = $email;
      $_SESSION["celular"] = $celular;
      $_SESSION["comercial"] = $comercial;
      $_SESSION["tipoimovel"] = $tipoimovel;
      $_SESSION["enderecoimovel"] = $enderecoimovel;
      $_SESSION["bairroimovel"] = $bairroimovel;
      $_SESSION["cidadeimovel"] = $cidadeimovel;
      $_SESSION["proximo"] = $proximo;
      $_SESSION["edificil"] = $edificil;
      $_SESSION["areaconstruida"] = $areaconstruida;
      $_SESSION["areautil"] = $areautil;
      $_SESSION["areadoterreno"] = $areadoterreno;
      $_SESSION["quadra"] = $quadra;
      $_SESSION["lote"] = $lote;
      $_SESSION["idade"] = $idade;
      $_SESSION["condominio"] = $condominio;
      $_SESSION["valorcondominio"] = $valorcondominio;
      $_SESSION["obs"] = $obs;
      $_SESSION["valorimovel"] = $valorimovel;
      $_SESSION["outrobem"] = $outrobem;
      $_SESSION["valoroutrobem"] = $valoroutrobem;
      $_SESSION["autorizocri"] = $autorizocri;
      $_SESSION["autorizocidade"] = $autorizocidade;      
      $_SESSION["validade"] = $validade;
      $_SESSION["comissao"] = $comissao;
      $_SESSION["cidade"] = $cidade;
      $_SESSION["diames"] = $diames;
      $_SESSION["cidadediames"] = $cidadediames;
      $financiamentoExtenso = (isset($_POST['financiamento'])) ? valorPorExtenso($financiamento, true, false) : "";





      //cliente
      exibirnopdf($y = 55.5, $x=15.5, $texto=$cliente, $fontsizemax = null, $alinhamento = 'L', $pdf);
      //estado civil
      if ($estadocivil == "solteiro") {
        exibirnopdf($y = 52.4, $x=195.2, $texto="x", $fontsizemax = null, $alinhamento = 'L', $pdf);
      } 
      if($estadocivil == "casado") {
        exibirnopdf($y = 55.7, $x=195.2, $texto="x", $fontsizemax = null, $alinhamento = 'L', $pdf);
      }
      
      exibirnopdf($y = 62.5, $x=24, $texto=$rg, $fontsizemax = null, $alinhamento = 'L', $pdf);
      
      exibirnopdf($y = 62.5, $x=86.5, $texto=$cpf, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 62.5, $x=155, $texto=$naturalidade, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 69.5, $x=18, $texto=$endereco, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 76, $x=16, $texto=$bairro, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 75.5, $x=118, $texto=$cidade, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 82.2, $x=16, $texto=$email, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 82.2, $x=108, $texto=$celular, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 82.2, $x=161, $texto=$comercial, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 159.2, $x=18, $texto=$enderecoimovel, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 166, $x=16, $texto=$bairroimovel, $fontsizemax = null, $alinhamento = 'L', $pdf);
      
      exibirnopdf($y = 166, $x=117, $texto=$cidadeimovel, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 172.3, $x=17, $texto=$proximo, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 172.7, $x=107, $texto=$edificil, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 179.3, $x=19.5, $texto=$areaconstruida, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 179.3, $x=78, $texto=$areautil, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 178.7, $x=151, $texto=$areadoterreno, $fontsizemax = null, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 186.3, $x=16, $texto=$quadra, $fontsizemax = 19, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 186.2, $x=62.5, $texto=$lote, $fontsizemax = 18, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 186.2, $x=105, $texto=$idade, $fontsizemax = 18, $alinhamento = 'L', $pdf);

      if ($condominio == "sim") {
        exibirnopdf($y = 183, $x=155.3, $texto="x", $fontsizemax = null, $alinhamento = 'L', $pdf);
      } 
      if($condominio == "nao") {
        exibirnopdf($y = 186.3, $x=155.3, $texto="x", $fontsizemax = null, $alinhamento = 'L', $pdf);
      }

      exibirnopdf($y = 186.2, $x=168, $texto=$valorcondominio, $fontsizemax = 18, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 193, $x=14.3, $texto=$obs, $fontsizemax = 95, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 199.5, $x=19, $texto=$valorimovel, $fontsizemax = 95, $alinhamento = 'L', $pdf);

      if ($outrobem == "sim") {
        exibirnopdf($y = 196.3, $x=153.3, $texto="x", $fontsizemax = null, $alinhamento = 'L', $pdf);
      } 
      if($outrobem == "nao") {
        exibirnopdf($y = 199.5, $x=153.3, $texto="x", $fontsizemax = null, $alinhamento = 'L', $pdf);
      }

      exibirnopdf($y = 199.5, $x=167, $texto=$valoroutrobem, $fontsizemax = NULL, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 107.7, $x=171, $texto=$autorizocri, $fontsizemax = NULL, $alinhamento = 'L', $pdf);
      exibirnopdf($y = 107.7, $x=115, $texto=$autorizocidade, $fontsizemax = NULL, $alinhamento = 'L', $pdf);

      exibirnopdf($y = 211, $x=57, $texto=str_replace("Dias", "", $validade), $fontsizemax = NULL, $alinhamento = 'L', $pdf);
      exibirnopdf($y = 211, $x=0, $texto=valorPorExtenso($valor=str_replace("Dias", "", $validade), $bolExibirMoeda =false, $bolPalavraFeminina=false), $fontsizemax = 30, $alinhamento = 'C', $pdf);

      
      exibirnopdf($y = 217, $x=56, $texto= $comissao, $fontsizemax = NULL, $alinhamento = 'L', $pdf);
      exibirnopdf($y = 217, $x=15, $texto=valorPorExtenso($valor=str_replace("%", "", $comissao), $bolExibirMoeda =false, $bolPalavraFeminina=false), $fontsizemax = NULL, $alinhamento = 'C', $pdf);
      
      exibirnopdf($y = 248, $x=110, $texto=$cidadediames.", ".$diames, $fontsizemax = null, $alinhamento = 'C', $pdf);

      if(isset($_POST['checkcasa'])){
        $_SESSION['checkcasa'] = 'checked';
        exibirnopdf($y = 126, $x=16.7, $texto='X', $fontsizemax = null, $alinhamento = 'L', $pdf);
      }
      if(isset($_POST['checksobrado'])){
        $_SESSION['checksobrado'] = 'checked';
        exibirnopdf($y = 126, $x=37, $texto='X', $fontsizemax = null, $alinhamento = 'L', $pdf);
      }
      if(isset($_POST['checkapartamento'])){
        $_SESSION['checkapartamento'] = 'checked';
        exibirnopdf($y = 126, $x=63.2, $texto='X', $fontsizemax = null, $alinhamento = 'L', $pdf);
      }
      if(isset($_POST['checkterreno'])){
        $_SESSION['checkterreno'] = 'checked';
        exibirnopdf($y = 126, $x=82.5, $texto='X', $fontsizemax = null, $alinhamento = 'L', $pdf);
      }
      if(isset($_POST['checkchacara'])){
        $_SESSION['checkchacara'] = 'checked';
        exibirnopdf($y = 126, $x=101.5, $texto='X', $fontsizemax = null, $alinhamento = 'L', $pdf);
      }
      if(isset($_POST['checksitio'])){
        $_SESSION['checksitio'] = 'checked';
        exibirnopdf($y = 126, $x=116.2, $texto='X', $fontsizemax = null, $alinhamento = 'L', $pdf);
      }
      if(isset($_POST['checkloja'])){
        $_SESSION['checkloja'] = 'checked';
        exibirnopdf($y = 126, $x=129.7, $texto='X', $fontsizemax = null, $alinhamento = 'L', $pdf);
      }
      if(isset($_POST['checkbarracao'])){
        $_SESSION['checkbarracao'] = 'checked';
        exibirnopdf($y = 126, $x=151.5, $texto='X', $fontsizemax = null, $alinhamento = 'L', $pdf);
      }
      if(isset($_POST['checkresidencial'])){
        $_SESSION['checkresidencial'] = 'checked';
        exibirnopdf($y = 126, $x=174.5, $texto='X', $fontsizemax = null, $alinhamento = 'L', $pdf);
      }
      if(isset($_POST['checkcomercial'])){
        $_SESSION['checkcomercial'] = 'checked';
        exibirnopdf($y = 126, $x=195.3, $texto='X', $fontsizemax = null, $alinhamento = 'L', $pdf);
      }
      
      $pdf->SetY(134.5);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);

$pdf->MultiCell(190, 6, iconv('UTF-8', 'windows-1252', $obsimovel),0,'L', false);

      $data = date("d_m_Y");
      $horas = date("h-i-s");
      $caminhopdf = "pdf/ficha-" . str_replace(" ", "-", $cliente) . "_dia_" . $data . "-hr-" . $horas . ".pdf";

      $pdf->Output($caminhopdf, "F");

      
      ?>

    <div class="card">
      <div class="card-img-top text-center titulo">
        <p> ARQUIVO </p>
      </div>
      <div class="card-body">
        <h3>Sua ficha esta pronta</h3>
        <br>



        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-5">
                <a href="<?php echo $caminhopdf; ?>" target="_blank"><img src="../img/pdf.png" width="100px" height="100px">Ficha_2019.pdf</a>
              </div>
              <div class="col-md-2">
                <a href="<?php echo $caminhopdf; ?>" download="pdfs.pdf"><img src="../img/download.png" width="65px" height="65px">Baixar</a>
              </div>
              <div class="col-md-2">
                <a href="<?php echo $caminhopdf; ?>" target="_blank"><img src="../img/visualizar.png" width="65px" height="65px">Visualizar</a>
              </div>
              <div class="col-md-3">
                <a href="https://api.whatsapp.com/send?text=Novo recibo gerado clique no link para baixar <?php echo "http://www.sistemasdominus.com.br/recibo/ficha/" . $caminhopdf; ?> " target="_blank"><img src="../img/whats.png" width="65px" height="65px">Compartilhar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container" style="padding-top:5px;">
      <div class="row">
        <div class="col align-self-start">
          <ul class="nav">
            <li><a class="btn btn-primary" href="formulario.php">Voltar</a></li>
          </ul>
        </div>
        <div class="col align-self-center">

        </div>
        <div class="col align-self-end">
          <ul class="nav" style="float:right;">

            <li><a class="btn btn-success" href="../index.php">Ok! Finalizar</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>



  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../vendor/jquery-3.2.1.min.js"></script>


  <?php

  } else {
    header("Location: formulario.php");
  }


  function exibirnopdf($y, $x, $texto, $fontsizemax, $alinhamento, $pdf){
    $pdf->SetY($y);
    $pdf->SetX($x);
    if(isset($fontsizemax)){
      $pdf->SetFont('Arial','B',(strlen($texto) > $fontsizemax)? 9 : 11);
    }else{
    $pdf->SetFont('Arial', 'B', 11);
    }
    $pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $texto), 0, 0, $alinhamento);
  }

  function valorPorExtenso($valor, $bolExibirMoeda, $bolPalavraFeminina)
  {

    $valor = removerFormatacaoNumero($valor);

    $singular = null;
    $plural = null;

    if ($bolExibirMoeda) {
      $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
      $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");
    } else {
      $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
      $plural = array("", "", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");
    }

    $c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
    $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa");
    $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezessete", "dezoito", "dezenove");
    $u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");


    if ($bolPalavraFeminina) {

      if ($valor == 1) {
        $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");
      } else {
        $u = array("", "um", "duas", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");
      }


      $c = array("", "cem", "duzentas", "trezentas", "quatrocentas", "quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
    }


    $z = 0;

    $valor = number_format($valor, 2, ".", ".");
    $inteiro = explode(".", $valor);

    for ($i = 0; $i < count($inteiro); $i++) {
      for ($ii = mb_strlen($inteiro[$i]); $ii < 3; $ii++) {
        $inteiro[$i] = "0" . $inteiro[$i];
      }
    }

    // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
    $rt = null;
    $fim = count($inteiro) - ($inteiro[count($inteiro) - 1] > 0 ? 1 : 2);
    for ($i = 0; $i < count($inteiro); $i++) {
      $valor = $inteiro[$i];
      $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
      $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
      $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

      $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
      $t = count($inteiro) - 1 - $i;
      $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
      if ($valor == "000")
        $z++;
      elseif ($z > 0)
        $z--;

      if (($t == 1) && ($z > 0) && ($inteiro[0] > 0))
        $r .= (($z > 1) ? " de " : "") . $plural[$t];

      if ($r)
        // $rt = $rt . ((() ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;

        $rt = $rt;

      if (($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) {
        if (($i < $fim)) {
          $rt .= ", " . $r;
        } else {
          $rt .= " e " . $r;
        }
      } else {
        $rt .= " " . $r;
      }
    }

    $rt = mb_substr($rt, 1);

    return ($rt ? " * * " . trim($rt) . " * * " : " ");
  }

  function removerFormatacaoNumero($strNumero)
  {

    $strNumero = trim(str_replace("R$", null, $strNumero));

    $vetVirgula = explode(",", $strNumero);
    if (count($vetVirgula) == 1) {
      $acentos = array(".");
      $resultado = str_replace($acentos, "", $strNumero);
      return $resultado;
    } else if (count($vetVirgula) != 2) {
      return $strNumero;
    }

    $strNumero = $vetVirgula[0];
    $strDecimal = mb_substr($vetVirgula[1], 0, 2);

    $acentos = array(".");
    $resultado = str_replace($acentos, "", $strNumero);
    $resultado = $resultado . "." . $strDecimal;

    return $resultado;
  }
  
  ?>

</body>

</html>