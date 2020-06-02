<?php
header("Content-Type: text/html; charset=utf-8",true);
session_start();
use setasign\Fpdi;
use setasign\fpdf;

require_once 'vendor/autoload.php';
require_once 'vendor/setasign/fpdf/fpdf.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Recibo</title>


  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/Magnific-Popup/magnific-popup.css" rel="stylesheet">
  <link href="vendor/estilo.css" rel="stylesheet">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="vendor/jquery-3.2.1.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/Magnific-Popup/jquery.magnific-popup.min.js"></script>

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
if (isset($_POST['gerarRecibo'])) {

/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(2);
date_default_timezone_set('UTC');
$start = microtime(true);
*/

$pdf = new Fpdi\Fpdi();

$pdf->AddPage();

//Set the source PDF file
$pagecount = $pdf->setSourceFile("exemplo.pdf");
//Import the first page of the file
$tpl = $pdf->importPage(1);
//Use this page as template
$pdf->useTemplate($tpl);

//info vendedor
$nomeVendedor = (isset($_POST['nomeVendedor'])) ? $_POST['nomeVendedor'] : ""; 
$cpfCnpjVendedor = (isset($_POST['cpfCnpjVendedor'])) ? $_POST['cpfCnpjVendedor'] : ""; 
//info Comprador
$nomeComprador = (isset($_POST['nomeComprador'])) ? $_POST['nomeComprador'] : ""; 
$rgComprador = (isset($_POST['rgComprador'])) ? $_POST['rgComprador'] : ""; 
$cpfComprador = (isset($_POST['cpfComprador'])) ? $_POST['cpfComprador'] : ""; 
$enderecoComprador = (isset($_POST['enderecoComprador'])) ? $_POST['enderecoComprador'] : ""; 
$foneComprador = (isset($_POST['foneComprador'])) ? $_POST['foneComprador'] : ""; 
$emailComprador = (isset($_POST['emailComprador'])) ? $_POST['emailComprador'] : "";

//infor conjuge
$nomeConjuge = (isset($_POST['nomeConjuge'])) ? $_POST['nomeConjuge'] : ""; 
$rgConjuge = (isset($_POST['rgConjuge'])) ? $_POST['rgConjuge'] : ""; 
$cpfConjuge = (isset($_POST['cpfConjuge'])) ? $_POST['cpfConjuge'] : ""; 
$numMatricula =(isset($_POST['numMatricula'])) ? $_POST['numMatricula'] : ""; 
$cri = (isset($_POST['cri'])) ? $_POST['cri'] : ""; 

//informacoes do imovel
$descricaoImovel = (isset($_POST['descricaoImovel'])) ? $_POST['descricaoImovel'] : ""; 
$totalImovel = (isset($_POST['totalImovel'])) ? $_POST['totalImovel'] : ""; 
$sinal = (isset($_POST['sinal'])) ? $_POST['sinal'] : ""; 
$financiamento = (isset($_POST['financiamento'])) ? $_POST['financiamento'] : "";
$totalImovelExtenso = (isset($_POST['totalImovel'])) ? valorPorExtenso($totalImovel, true, false) : ""; 
$sinalExtenso = (isset($_POST['sinal'])) ? valorPorExtenso($sinal, true, false) : "";
$financiamentoExtenso =  (isset($_POST['financiamento'])) ? valorPorExtenso($financiamento, true, false) : "";

//informacoes pagamento
$formapagamento = (isset($_POST['formapagamento'])) ? $_POST['formapagamento'] : ""; 
$outroPagamento =(isset($_POST['outroPagamento'])) ? $_POST['outroPagamento'] : ""; 
$banco =(isset($_POST['contapagamento'])) ? $_POST['contapagamento'] : "";
$clausula4 =(isset($_POST['clausula4'])) ? $_POST['clausula4'] : "";
$clausula8 =(isset($_POST['clausula8'])) ? $_POST['clausula8'] : "";
$obsClausula = (isset($_POST['obsClausula'])) ? $_POST['obsClausula'] : "";
$obsClausula2 = (isset($_POST['obsClausula2'])) ? $_POST['obsClausula2'] : "";
$clausula8Extenso =(isset($_POST['clausula8'])) ? valorPorExtenso($_POST['clausula8'], true, false) : "";
//rodape
$nomecompradorrodape = (isset($_POST['nomecompradorrodape'])) ? $_POST['nomecompradorrodape'] : ""; 
$cpfcompradorrodape = (isset($_POST['cpfcompradorrodape'])) ? $_POST['cpfcompradorrodape'] : ""; 
$nometestemunha1= (isset($_POST['nometestemunha1'])) ? $_POST['nometestemunha1'] : "";
$cpftestemunha1= (isset($_POST['cpftestemunha1'])) ? $_POST['cpftestemunha1'] : "";
$nometestemunha2= (isset($_POST['nometestemunha2'])) ? $_POST['nometestemunha2'] : "";
$cpftestemunha2= (isset($_POST['cpftestemunha2'])) ? $_POST['cpftestemunha2'] : "";
//responsavel
$responsavel = (isset($_POST['responsavel'])) ? $_POST['responsavel'] : "";
$creci = (isset($_POST['creci'])) ? $_POST['creci'] : "";

//datas
$diames = (isset($_POST['diames'])) ? $_POST['diames'] : "";
$cidade = (isset($_POST['cidade'])) ? $_POST['cidade'] : "";



$_SESSION['nomeVendedor'] = $nomeVendedor;
$_SESSION['cpfCnpjVendedor'] = $cpfCnpjVendedor;
$_SESSION['nomeComprador'] = $nomeComprador;
$_SESSION['rgComprador'] = $rgComprador;
$_SESSION['cpfComprador'] = $cpfComprador;
$_SESSION['enderecoComprador'] = $enderecoComprador;
$_SESSION['foneComprador'] = $foneComprador;
$_SESSION['emailComprador'] = $emailComprador;
$_SESSION['nomeConjuge'] = $nomeConjuge;
$_SESSION['rgConjuge'] = $rgConjuge;
$_SESSION['cpfConjuge'] = $cpfConjuge;
$_SESSION['numMatricula'] = $numMatricula;
$_SESSION['descricaoImovel'] = $descricaoImovel;
$_SESSION['totalImovel'] = $totalImovel;
$_SESSION['sinal'] = $sinal;
$_SESSION['financiamento'] = $financiamento;
$_SESSION['formapagamento'] = $formapagamento;
$_SESSION['outroPagamento'] = $outroPagamento;
$_SESSION['clausula8'] = $clausula8;
$_SESSION['clausula4'] = $clausula4;
$_SESSION['conta'] = $banco;
$_SESSION['cri'] = $cri;
$_SESSION['obsclausula'] = $obsClausula;
$_SESSION['obsclausula2'] = $obsClausula2;
$_SESSION['diames'] = $_POST['diames'];
$_SESSION['cidade'] = $_POST['cidade'];
$_SESSION['responsavel']=$_POST['responsavel'];
$_SESSION['creci'] = $_POST['creci'];
$_SESSION['nometestemunha1'] = $_POST['nometestemunha1'];
$_SESSION['cpftestemunha1'] = $_POST['cpftestemunha1'];
$_SESSION['nometestemunha2'] = $_POST['nometestemunha2'];
$_SESSION['cpftestemunha2'] = $_POST['cpftestemunha2'];



//NOME DO VENDEDOR
$pdf->SetY(21);
$pdf->SetX(55);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $nomeVendedor), 0, 0, 'L');

//CPF DO VENDEDOR
$pdf->SetY(21);
$pdf->SetX(165);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, $cpfCnpjVendedor, 0, 0, 'L');


//NOME DO CI
$pdf->SetY(37.5);
$pdf->SetX(78);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $responsavel), 0, 0, 'L');

//CPF DO CI
$pdf->SetY(37.5);
$pdf->SetX(178);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, $creci, 0, 0, 'L');

//NOME DO Comprador
$pdf->SetY(51);
$pdf->SetX(12);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $nomeComprador), 0, 0, 'L');

//RG DO Comprador
$pdf->SetY(51);
$pdf->SetX(120);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, $rgComprador, 0, 0, 'L');

//CPF DO Comprador
$pdf->SetY(51);
$pdf->SetX(159);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, $cpfComprador, 0, 0, 'L');

//ENDERECO DO Comprador
$pdf->SetY(58);
$pdf->SetX(12); 
$pdf->SetFont('Arial','B',(strlen($enderecoComprador) > 39)? 9 : 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $enderecoComprador), 0, 0, 'L');

//Fone DO Comprador
$pdf->SetY(58);
$pdf->SetX(110);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, $foneComprador, 0, 0, 'L');

//Email DO Comprador
$pdf->SetY(58);
$pdf->SetX(150);
$pdf->SetFont('Arial','B',(strlen($emailComprador) > 24)? 9 : 11); 
$pdf->Cell(0, 10, $emailComprador, 0, 0, 'L');


//Nome DO Conjuge
$pdf->SetY(68);
$pdf->SetX(12);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $nomeConjuge), 0, 0, 'L');

//RG DO Conjuge
$pdf->SetY(69);
$pdf->SetX(120);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, $rgConjuge, 0, 0, 'L');

//CPF DO conjuge
$pdf->SetY(69);
$pdf->SetX(159);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, $cpfConjuge, 0, 0, 'L');

//descricao
$pdf->SetY(83);
$pdf->SetX(12);
$pdf->SetFont('Arial','B',(strlen($descricaoImovel) > 59)? 8 : 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $descricaoImovel), 0, 0, 'L');

//numero da matricula
$pdf->SetY(83);
$pdf->SetX(132);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, $numMatricula, 0, 0, 'L');

//numero cri
$pdf->SetY(83);
$pdf->SetX(166);
$pdf->SetFont('Arial','B',(strlen($descricaoImovel) > 20)? 8 : 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $cri), 0, 0, 'L');

//valor do imovel
$pdf->SetY(96);
$pdf->SetX(18);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, $totalImovel, 0, 0, 'L');

//valor do imovel por extenso

$pdf->SetY(98);
$pdf->SetX(48);
$pdf->SetFont('Arial','B',(strlen($totalImovelExtenso) > 50)? 9 : 11);
//$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $totalImovelExtenso), 0, 0, 'C');
$pdf->MultiCell(105, 3, iconv('UTF-8', 'windows-1252', $totalImovelExtenso),0,'C', false);

//valor do sinal
$pdf->SetY(103);
$pdf->SetX(18);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $sinal), 0, 0, 'L');

//valor do sinal extenso
$pdf->SetY(105);
$pdf->SetX(48);
$pdf->SetFont('Arial','B',(strlen($sinalExtenso) > 50)? 9 : 11);
//$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $sinalExtenso), 0, 0, 'C');
$pdf->MultiCell(105, 3, iconv('UTF-8', 'windows-1252', $sinalExtenso),0,'C', false);

//valor do financiamento
$pdf->SetY(111);
$pdf->SetX(18);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $financiamento), 0, 0, 'L');

//valor do financiamento extenso
$pdf->SetY(111.5);
$pdf->SetX(48);
$pdf->SetFont('Arial','B', (strlen($financiamentoExtenso) > 50)? 9 : 11);
//$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $financiamentoExtenso), 0, 0, 'C');
$pdf->MultiCell(105, 3, iconv('UTF-8', 'windows-1252', $financiamentoExtenso),0,'C', false);

//forma de pagamento
switch ($formapagamento) {
    case 'especie':
    $pdf->SetY(101);
    $pdf->SetX(157.5); 
    $pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, "X", 0, 0, 'L');   
        break;
        case 'deposito':
    $pdf->SetY(107.5);
    $pdf->SetX(157.5);
    $pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, "X", 0, 0, 'L');    
        break;
        case 'cheque':
    $pdf->SetY(114);
    $pdf->SetX(157.5); 
    $pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, "X", 0, 0, 'L');   
        break;
}



//valor outro
$pdf->SetY(117);
$pdf->SetX(12);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $outroPagamento), 0, 0, 'L');


//banco de pagamento
switch ($banco) {
    case 'cef':
     $pdf->SetY(126.2);
        $pdf->SetX(29); 
        $pdf->SetFont('Arial','B',9);
$pdf->Cell(0, 10, "X", 0, 0, 'L');   
        break;
        case 'itau':
    $pdf->SetY(126.2);
    $pdf->SetX(86); 
    $pdf->SetFont('Arial','B',9);
$pdf->Cell(0, 10, "X", 0, 0, 'L');  
        break;
        case 'sicredi':
    $pdf->SetY(126.2);
    $pdf->SetX(137.5);
    $pdf->SetFont('Arial','B',9);
$pdf->Cell(0, 10, "X", 0, 0, 'L');    
        break;
}



//clausula 4
$pdf->SetY(165.3);
$pdf->SetX(155);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $clausula4), 0, 0, 'L');
//clausula 8
$pdf->SetY(190.5);
$pdf->SetX(93.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $clausula8), 0, 0, 'L');
//clausula 8 extenso
$pdf->SetY(193.6);
$pdf->SetX(115);
$pdf->SetFont('Arial','B',(strlen($clausula8Extenso) > 44)? 5 : 7);
//$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $clausula8Extenso), 0, 0, 'C');
$pdf->MultiCell(50, 2, iconv('UTF-8', 'windows-1252', $clausula8Extenso),0,'C', false);
//obs
$pdf->SetY(202.5);
$pdf->SetX(13);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $obsClausula), 0, 0, 'L');
//obs
$pdf->SetY(209.2);
$pdf->SetX(13);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $obsClausula2), 0, 0, 'L');


$data = date("d_m_Y");
$horas= date("h-i-s");



//DATA
$pdf->SetY(231.2);
$pdf->SetX(140);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $cidade)." , ".$diames, 0, 0, 'L');



//rodape nome comprador
$pdf->SetY(250.5);
$pdf->SetX(124);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(0, 10, $nomecompradorrodape, 0, 0, 'L');

$pdf->SetY(256.3);
$pdf->SetX(125);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(0, 10, $cpfcompradorrodape, 0, 0, 'L');


$pdf->SetAutoPageBreak(true, 2);
$pdf->SetY(278.6);
$pdf->SetX(124);
$pdf->Write(0, iconv('UTF-8', 'windows-1252', $nometestemunha2), '', 0, 'C', true, 0, false, false, 0);
$pdf->SetY(284.5);
$pdf->SetX(125);
$pdf->Write(0, $cpftestemunha2, '', 0, 'C', true, 0, false, false, 0);

$pdf->SetY(278.6);
$pdf->SetX(36);
$pdf->Write(0, iconv('UTF-8', 'windows-1252', $nometestemunha1), '', 0, 'C', true, 0, false, false, 0);
$pdf->SetY(284.5);
$pdf->SetX(36);
$pdf->Write(0, $cpftestemunha1, '', 0, 'C', true, 0, false, false, 0);



$caminhopdf ="pdf/".str_replace(" ", "-", $nomeComprador)."_data_".$data."-horas-".$horas.".pdf";

$pdf->Output($caminhopdf, "F");



 ?>

    <div class="card">
      <div class="card-img-top text-center titulo">
        <p> ARQUIVO </p>
      </div>
      <div class="card-body">
        <h3>Seu recibo esta pronto</h3>
        <br>

        

        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-5">
              <a href="<?php echo $caminhopdf;?>" target="_blank" ><img src="img/pdf.png" width="100px" height="100px">Recibo_2019.pdf</a>
              </div>
              <div class="col-md-2">
                <a href="<?php echo $caminhopdf;?>" download="pdfs.pdf"><img src="img/download.png" width="65px" height="65px">Baixar</a>
              </div>
              <div class="col-md-2">
                <a href="<?php echo $caminhopdf;?>" target="_blank" ><img src="img/visualizar.png" width="65px" height="65px">Visualizar</a>
              </div>
              <div class="col-md-3">
                <a href="https://api.whatsapp.com/send?text=Novo recibo gerado clique no link para baixar <?php echo "http://www.sistemasdominus.com.br/recibo/". $caminhopdf; ?> "target="_blank"><img src="img/whats.png" width="65px" height="65px">Compartilhar</a>
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
            <li><a class="btn btn-primary"  href="formulario.php">Voltar</a></li>
          </ul>
        </div>
        <div class="col align-self-center">

        </div>
        <div class="col align-self-end">
          <ul class="nav" style="float:right;">

            <li><a class="btn btn-success" href="index.php">Ok! Finalizar</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>

 

  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/jquery-3.2.1.min.js"></script>


  <?php

} else {
    header("Location: formulario.php");
}





 function valorPorExtenso( $valor , $bolExibirMoeda , $bolPalavraFeminina )
    {
 
        $valor = removerFormatacaoNumero( $valor );
 
        $singular = null;
        $plural = null;
 
        if ( $bolExibirMoeda )
        {
            $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
        else
        {
            $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
 
        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezessete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
 
 
        if ( $bolPalavraFeminina )
        {
        
            if ($valor == 1) 
            {
                $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
            else 
            {
                $u = array("", "um", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
            
            
            $c = array("", "cem", "duzentas", "trezentas", "quatrocentas","quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
            
            
        }
 
 
        $z = 0;
 
        $valor = number_format( $valor, 2, ".", "." );
        $inteiro = explode( ".", $valor );
 
        for ( $i = 0; $i < count( $inteiro ); $i++ ) 
        {
            for ( $ii = mb_strlen( $inteiro[$i] ); $ii < 3; $ii++ ) 
            {
                $inteiro[$i] = "0" . $inteiro[$i];
            }
        }
 
        // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
        $rt = null;
        $fim = count( $inteiro ) - ($inteiro[count( $inteiro ) - 1] > 0 ? 1 : 2);
        for ( $i = 0; $i < count( $inteiro ); $i++ )
        {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
 
            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count( $inteiro ) - 1 - $i;
            $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ( $valor == "000")
                $z++;
            elseif ( $z > 0 )
                $z--;
                
            if ( ($t == 1) && ($z > 0) && ($inteiro[0] > 0) )
                $r .= ( ($z > 1) ? " de " : "") . $plural[$t];
                
            if ( $r )
           // $rt = $rt . ((() ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        
        $rt = $rt;

        if(($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)){
          if(($i < $fim)){
            $rt .= ", ". $r;
          }else{
            $rt .=" e ". $r;
          }
        }else{
          $rt .= " ".$r;
        }
        
        
        
          }
 
        $rt = mb_substr( $rt, 1 );
 
        return($rt ? " * * ".trim( $rt )." * * " : " ");
 
    }

    function removerFormatacaoNumero( $strNumero )
    {
 
        $strNumero = trim( str_replace( "R$", null, $strNumero ) );
 
        $vetVirgula = explode( ",", $strNumero );
        if ( count( $vetVirgula ) == 1 )
        {
            $acentos = array(".");
            $resultado = str_replace( $acentos, "", $strNumero );
            return $resultado;
        }
        else if ( count( $vetVirgula ) != 2 )
        {
            return $strNumero;
        }
 
        $strNumero = $vetVirgula[0];
        $strDecimal = mb_substr( $vetVirgula[1], 0, 2 );
 
        $acentos = array(".");
        $resultado = str_replace( $acentos, "", $strNumero );
        $resultado = $resultado . "." . $strDecimal;
 
        return $resultado;
 
    }
?>

</body>
</html>





