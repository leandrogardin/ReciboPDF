<?php
session_start();
require_once("../checarLogin.php");
header("Content-Type: text/html; charset=utf-8",true);
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Recibo</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/Magnific-Popup/magnific-popup.css" rel="stylesheet">
  <link href="../vendor/estilo.css" rel="stylesheet">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../vendor/jquery-3.2.1.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../vendor/Magnific-Popup/jquery.magnific-popup.min.js"></script>
  <script src="../vendor/jquery.mask.min.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      #0c2461
    <![endif]-->
    <script>
  $(document).ready(function(){
                /* ao pressionar uma tecla em um campo que seja de class="inputUnico", 
				em vez de submeter o formulário, vai pular para o próximo campo.
				o formulário só vai executar o submit com a tecla enter se estiver no ultimo campo do formulário*/
                $('.inputUnico').keypress(function(e){
                    /* 
                     * verifica se o evento é Keycode (para IE e outros browsers)
                     * se não for pega o evento Which (Firefox)
                    */
                   var tecla = (e.keyCode?e.keyCode:e.which);
                    
                   /* verifica se a tecla pressionada é a tecla ENTER */
                   if(tecla == 13){
                       /* guarda o seletor do campo onde foi pressionado Enter */
                       campo =  $('.inputUnico');
                       /* pega o indice do elemento*/
                       indice = campo.index(this);
                       /*soma mais um ao indice e verifica se não é null
                        *se não for é porque existe outro elemento
                       */
                      if(campo[indice+1] != null){
                         /* adiciona mais 1 no valor do indice */
                         proximo = campo[indice + 1];
                         /* passa o foco para o proximo elemento */
                         proximo.focus();
                      }else{
						return true;
					  }
                   }
        

				   if(tecla == 13){
                    /* impede o submit caso esteja dentro de um form */
                    e.preventDefault(e);
                    return false;
					}else{
                    /* se não for tecla enter deixa escrever */
                    return true;
					}
                })
             })
  </script>
  <script>
    function avancar() {

      var element = document.getElementById("tela1a");
      element.classList.remove("active");
      var element = document.getElementById("tela2a");
      element.classList.remove("active");
      var element = document.getElementById("tela2v");
      element.classList.remove("active");
      var element = document.getElementById("tela3a");
      element.classList.remove("active");
      var element = document.getElementById("tela3v");
      element.classList.remove("active");
      var element = document.getElementById("tela4v");
      element.classList.remove("active");

      var nomecomprador = document.getElementById("nomecomprador").value;
      var cpfcomprador = document.getElementById("cpfcomprador").value;
      if(nomecomprador != null){
        document.getElementById("nomecompradorrodape").value = nomecomprador;
      }

      if(cpfcomprador != null){
        document.getElementById("cpfcompradorrodape").value = cpfcomprador;
      }

    }

    (function(window) {
      'use strict';

      var noback = {

        //globals
        version: '0.0.1',
        history_api: typeof history.pushState !== 'undefined',

        init: function() {
          window.location.hash = '#no-back';
          noback.configure();
        },

        hasChanged: function() {
          if (window.location.hash == '#no-back') {
            window.location.hash = '#gerandonovorecibo';
            //mostra mensagem que não pode usar o btn volta do browser
            if ($("#msgAviso").css('display') == 'none') {
              $("#msgAviso").slideToggle("slow");
            }
          }
        },

        checkCompat: function() {
          if (window.addEventListener) {
            window.addEventListener("hashchange", noback.hasChanged, false);
          } else if (window.attachEvent) {
            window.attachEvent("onhashchange", noback.hasChanged);
          } else {
            window.onhashchange = noback.hasChanged;
          }
        },

        configure: function() {
          if (window.location.hash == '#no-back') {
            if (this.history_api) {
              history.pushState(null, '', '#gerandonovorecibo');
            } else {
              window.location.hash = '#gerandonovorecibo';
              //mostra mensagem que não pode usar o btn volta do browser
              if ($("#msgAviso").css('display') == 'none') {
                $("#msgAviso").slideToggle("slow");
              }
            }
          }
          noback.checkCompat();
          noback.hasChanged();
        }

      };

      // AMD support
      if (typeof define === 'function' && define.amd) {
        define(function() {
          return noback;
        });
      }
      // For CommonJS and CommonJS-like
      else if (typeof module === 'object' && module.exports) {
        module.exports = noback;
      } else {
        window.noback = noback;
      }
      noback.init();
    }(window));
  </script>
</head>

<body>

  <div class="container">
    <form action="recibo.php" method="POST">
      <div class="tab-content">
        <div id="tela1" class="tab-pane active">
          <br>
          <div class="card">
            <div class="card-img-top text-center titulo">
              <p> VENDEDOR </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nome completo do vendedor</label>
                    <input type="text" x-moz-errormessage="Ops. 
    Não esqueça de preencher este campo." class="form-control inputUnico" name="nomeVendedor" value="<?php if (isset($_SESSION['vendedor']) and $_SESSION['vendedor'] != "Administrador") {
                                                                                            echo $_SESSION['vendedor'];
                                                                                          };

                                                                                          if(isset($_SESSION['nomeVendedor'])){ echo $_SESSION['nomeVendedor'];};
                                                                                          
                                                                                          ?>"  autofocus>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">RG</label>
                    <input type="text" class="form-control inputUnico" name="rgVendedor" value="<?php if (isset($_SESSION['rgVendedor'])) {
                                                                                                    echo $_SESSION['rgVendedor'];
                                                                                                  } ?>" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">CPF/CNPJ</label>
                    <input type="text" class="form-control inputUnico cpfvendedor" name="cpfCnpjVendedor" value="<?php if (isset($_SESSION['cpfCnpjVendedor'])) {
                                                                                                    echo $_SESSION['cpfCnpjVendedor'];
                                                                                                  } ?>" >
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Endereço</label>
                    <input type="text" class="form-control inputUnico" name="enderecoVendedor" maxlength="55" value="<?php if (isset($_SESSION['enderecoVendedor'])) {
                                                                                                    echo $_SESSION['enderecoVendedor'];
                                                                                                  } ?>" >
                  </div>
                </div></div>
            </div>
          </div>
          <br>
          <div class="card">
            <div class="card-img-top text-center titulo">
              <p> COMPRADOR </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nome completo do comprador</label>
                    <input type="text" class="form-control inputUnico" name="nomeComprador" id="nomecomprador" value="<?php if (isset($_SESSION['nomeComprador'])) {
                                                                                                    echo $_SESSION['nomeComprador'];
                                                                                                  } ?>" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">RG</label>
                    <input type="text" class="form-control inputUnico" name="rgComprador" value="<?php if (isset($_SESSION['rgComprador'])) {
                                                                                                    echo $_SESSION['rgComprador'];
                                                                                                  } ?>" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">CPF/CNPJ/MF</label>
                    <input type="text" class="form-control inputUnico cpfcomprador" id="cpfcomprador" name="cpfComprador" value="<?php if (isset($_SESSION['cpfComprador'])) {
                                                                                                    echo $_SESSION['cpfComprador'];
                                                                                                  } ?>" >
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Endereço</label>
                    <input type="text" class="form-control inputUnico" name="enderecoComprador" maxlength="62" value="<?php if (isset($_SESSION['enderecoComprador'])) {
                                                                                                    echo $_SESSION['enderecoComprador'];
                                                                                                  } ?>" >
                  </div>
                </div>
                <!--
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">Fone</label>
                    <input type="text" class="form-control inputUnico phone_with_ddd" name="foneComprador" value="<?php /*if (isset($_SESSION['foneComprador'])) {
                                                                                                    echo $_SESSION['foneComprador'];
                                                                                                  } */?>" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="text" class="form-control inputUnico" name="emailComprador" maxlength="32" value="<?php /*if (isset($_SESSION['emailComprador'])) {
                                                                                                    echo $_SESSION['emailComprador'];
                                                                                                  } */?>" >
                  </div>
                </div> -->
              </div>
            </div>
          </div>

          <br>
<!--
          <div class="card">
            <div class="card-img-top text-center titulo">
              <p> CÔNJUGE</p>
            </div>
            <div class="card-body" style="border:5px;">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nome completo do cônjuge</label>
                    <input type="text" class="form-control inputUnico" name="nomeConjuge" value="<?php /* if (isset($_SESSION['nomeConjuge'])) {
                                                                                                    echo $_SESSION['nomeConjuge'];
                                                                                                  } ?>" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">RG</label>
                    <input type="text" class="form-control inputUnico" name="rgConjuge" value="<?php if (isset($_SESSION['rgConjuge'])) {
                                                                                                    echo $_SESSION['rgConjuge'];
                                                                                                  } ?>" >
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">CPF/CNPJ/MF</label>
                    <input type="text" class="form-control inputUnico cpfconjuge" name="cpfConjuge" value="<?php if (isset($_SESSION['cpfConjuge'])) {
                                                                                                    echo $_SESSION['cpfConjuge'];
                                                                                                  } */?>" >
                  </div>
                </div>
              </div>
            </div>
          </div> -->

          <div class="container" style="padding-top:5px;">
            <div class="row">
              <div class="col align-self-start">
                <a class="btn btn-danger" href="../index.php">Cancelar</a>
              </div>
              <div class="col align-self-center">

              </div>
              <div class="col align-self-end">
                <ul class="nav" style="float:right;">
                  <li><a class="btn btn-success" id="tela1a" onclick="avancar()" data-toggle="tab" href="#tela2">Avançar</a></li>
                </ul>
              </div>
            </div>
          </div>

        </div>
        <div id="tela2" class="tab-pane ">

          <div class="card">
            <div class="card-img-top text-center titulo">
              <p> INFORMAÇÕES DO IMÓVEL </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Descrição do Imovel</label>
                    <input type="text" class="form-control inputUnico" name="descricaoImovel" value="<?php if (isset($_SESSION['descricaoImovel'])) {
                                                                                                    echo $_SESSION['descricaoImovel'];
                                                                                                  } ?>" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Conforme Matrícula nº</label>
                    <input type="text" class="form-control inputUnico" name="numMatricula" value="<?php if (isset($_SESSION['numMatricula'])) {
                                                                                                    echo $_SESSION['numMatricula'];
                                                                                                  } ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Do C.R.I. da Cidade</label>
                    <input type="text" class="form-control inputUnico" name="cri" maxlength="23" value="<?php if (isset($_SESSION['cri'])) {
                                                                                                    echo $_SESSION['cri'];
                                                                                                  } ?>">
                  </div>
                </div>


              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">Valor total do Imovel</label>
                    <input type="text" class="form-control inputUnico dinheiro" id="dinheiro" name="totalImovel" value="<?php if (isset($_SESSION['totalImovel'])) {
                                                                                                    echo $_SESSION['totalImovel'];
                                                                                                  } ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">Sinal de negócio</label>
                    <input type="text" class="form-control inputUnico dinheiro" name="sinal" value="<?php if (isset($_SESSION['sinal'])) {
                                                                                                    echo $_SESSION['sinal'];
                                                                                                  } ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">Financiamento</label>
                    <input type="text" class="form-control inputUnico dinheiro" name="financiamento" value="<?php if (isset($_SESSION['financiamento'])) {
                                                                                                    echo $_SESSION['financiamento'];
                                                                                                  } ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Outro <small style="color: #ccc">(max 300 caracteres)</small></label>
                    <input type="text" class="form-control inputUnico" name="outroPagamento" maxlength="300" value="<?php if (isset($_SESSION['outroPagamento'])) {
                                                                                                    echo $_SESSION['outroPagamento'];
                                                                                                  } ?>">
                  </div>
                </div>
                



              </div>
              <div class="container">
                <div class="row">
                  <div class="form-group">
                    <label class="bmd-label-floating">Forma de pagamento</label>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="especie" name="formapagamento" class="custom-control-input inputUnico" value="especie" <?php
                        if(isset($_SESSION['formapagamento']) AND $_SESSION['formapagamento'] == 'especie'){
                            echo "checked";
                        }
                      ?>>
                      <label class="custom-control-label" for="especie">Em espécie valendo este como recibo.</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="deposito" name="formapagamento" class="custom-control-input inputUnico" value="deposito" <?php
                        if(isset($_SESSION['formapagamento']) AND $_SESSION['formapagamento'] == 'deposito'){
                            echo "checked";
                        }
                      ?>>
                      <label class="custom-control-label" for="deposito">Depósito Bancário valendo comprovante como recibo.</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="cheque" name="formapagamento" class="custom-control-input inputUnico" value="cheque" <?php
                        if(isset($_SESSION['formapagamento']) AND $_SESSION['formapagamento'] == 'cheque'){
                            echo "checked";
                        }
                      ?>>
                      <label class="custom-control-label" for="cheque">Cheque valendo compensação como recibo.</label>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <br>
          <div class="card">
            <div class="card-img-top text-center titulo">
              <p> CONTA BANCARIA </p>
            </div>
            <div class="card-body">
              <div class="container">

                <!--<div class="row">
                <div class="col-md-7">
                  <div class="form-group">                    
                    <input type="text" class="form-control inputUnico input-sm" name="nomeConta" value="Vila Caiçara Imóveis Ltda" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">                    
                    <input type="text" class="form-control inputUnico input-sm" name="cnpjConta" value="21.139.089/0001-41" disabled>
                  </div>
                </div>
              </div> -->

                <div class="row">
                  <div class="form-group">
                    <label class="bmd-label-floating">Selecione a conta bancaria</label>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="cef" name="contapagamento" class="custom-control-input inputUnico" value="cef" <?php
                        if(isset($_SESSION['conta']) AND $_SESSION['conta'] == 'cef'){
                            echo "checked";
                        }
                      ?>>
                      <label class="custom-control-label" for="cef">CEF (104) - Agência 3379 Op. 003 C/C 1814-1.</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="itau" name="contapagamento" class="custom-control-input inputUnico" value="itau" <?php
                        if(isset($_SESSION['conta']) AND $_SESSION['conta'] == 'itau'){
                            echo "checked";
                        }
                      ?> >
                      <label class="custom-control-label" for="itau">ITAÚ (341) - Agência 4051 - C/C 20986-6</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="sicredi" name="contapagamento" class="custom-control-input inputUnico" value="sicredi" <?php
                        if(isset($_SESSION['conta']) AND $_SESSION['conta'] == 'sicredi'){
                            echo "checked";
                        }
                      ?>>
                      <label class="custom-control-label" for="sicredi">SICREDI (748) - Agência 0725 - C/C 28025-9</label>
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
                  <li><a class="btn btn-primary " id="tela2v" onclick="avancar()" data-toggle="tab" href="#tela1">Voltar</a></li>
                </ul>
              </div>
              <div class="col align-self-center">

              </div>
              <div class="col align-self-end">
                <ul class="nav" style="float:right;">

                  <li><a class="btn btn-success" id="tela2a" onclick="avancar()" data-toggle="tab" href="#tela3">Avançar</a></li>
                </ul>
              </div>
            </div>

          </div>
        </div>
        <div id="tela3" class="tab-pane ">
        <div class="card">
            <div class="card-img-top text-center titulo">
              <p> RESPONSAVEL </p>
            </div>
            <div class="card-body">
              <div class="row">
            <div class="col-md-9">
                  <div class="form-group">
                    <label class="bmd-label-floating">C.I. responsável</label>
                    <input type="text" class="form-control inputUnico" name="responsavel" value="<?php if (isset($_SESSION['responsavel'])) {
                                                                                                    echo $_SESSION['responsavel'];
                                                                                                  } ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">CRECI/PR</label>
                    <input type="text" class="form-control inputUnico" name="creci" value="<?php if (isset($_SESSION['creci'])) {
                                                                                                    echo $_SESSION['creci'];
                                                                                                  } ?>">
                  </div>
                </div>
                </div>
            </div>
          </div>
          <div class="card">
            <div class="card-img-top text-center titulo">
              <p> CLÁUSULAS </p>
            </div>
            <div class="card-body">
              <h3>Complete as clausulas</h3>
              <br>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="4"><strong>Cláusula 4ª:</strong> As despesas com o ato da escritura (...)serão de exclusiva responsabilidade do/a:</span>
                   </div>
                   <input type="text" class="form-control inputUnico" id="" name="clausula4" aria-describedby="4" value="<?php if (isset($_SESSION['clausula4'])) {
                                                                                                    echo $_SESSION['clausula4'];
                                                                                                  } ?>">               
              </div>
              <br>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3"><strong>Cláusula 8ª:</strong> A Imobiliária Vila Caiçara Ltda - ME, faz jus ao recebimento de R$:</span>
                </div>
                <input type="text" class="form-control inputUnico dinheiro" name="clausula8" id="" aria-describedby="basic-addon3 "value="<?php if (isset($_SESSION['clausula8'])) {
                                                                                                    echo $_SESSION['clausula8'];
                                                                                                  } ?>">
              </div>

              <br>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Obs <small style="color: #ccc">(max 500 caracteres)</small></label>
                  <input type="text" class="form-control inputUnico" name="obsClausula" maxlength="500" placeholder="Observações" value="<?php if (isset($_SESSION['obsclausula'])) {
                                                                                                    echo $_SESSION['obsclausula'];
                                                                                                  } ?>">

                </div>
                
              </div>


            </div>
          </div>


          <div class="container" style="padding-top:5px;">
            <div class="row">
              <div class="col align-self-start">
                <ul class="nav">
                  <li><a class="btn btn-primary" id="tela3v" onclick="avancar()" data-toggle="tab" href="#tela2">Voltar</a></li>
                </ul>
              </div>
              <div class="col align-self-center">

              </div>
              <div class="col align-self-end">
                <ul class="nav" style="float:right;">
                <li><a class="btn btn-success" id="tela3a" onclick="avancar()" data-toggle="tab" href="#tela4">Avançar</a></li>
                </ul>
              </div>
            </div>

          </div>

        </div>

        <div id="tela4" class="tab-pane ">

<div class="card">
  <div class="card-img-top text-center titulo">
    <p> DATA </p>
  </div>
  <div class="card-body">
  <div class="row">
  
  <div class="col-md-3">
                <div class="input-group">
                  <div class="input-group-prepend ">
                  <span class="input-group-text" id="basic-cidade">Cidade</span>
                 </div> 
                    <input type="text" class="form-control inputUnico form-control inputUnico-sm "  name="cidade" aria-describedby="basic-cidade" value="<?php if (isset($_SESSION['cidade'])) {
                                                                                                    echo $_SESSION['cidade'];
                                                                                                  }else{
                                                                                                    echo "Pontal do Paraná";
                                                                                                  } ?>">
                  </div>
                    </div>

                
                <div class="col-md-4">
                <div class="input-group">
                  <div class="input-group-prepend ">
                  <span class="input-group-text" id="basic-mes">Data</span>
                 </div> 
                    <input type="text" class="form-control inputUnico form-control inputUnico-sm "  name="diames" aria-describedby="basic-mes" value="<?php if (isset($_SESSION['diames'])) {
                                                                                                    echo $_SESSION['diames'];
                                                                                                  }else{
                                                                                                    echo strftime("%e de %B de %Y");
                                                                                                  } ?>">
                  </div>
                    </div>
               
                  
           </div>
           </div>
           </div>
   <br>
   <div class="card">
  <div class="card-img-top text-center titulo">
    <p> TESTEMUNHAS </p>
  </div>
  <div class="card-body">
    <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nome comprador</label>
                    <input type="text" class="form-control inputUnico " id="nomecompradorrodape" name="nomecompradorrodape" value="<?php if (isset($_SESSION['nomecompradorrodape'])) {
                                                                                                    echo $_SESSION['nomecompradorrodape'];
                                                                                                  } ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">CPF/MF</label>
                    <input type="text" class="form-control inputUnico cpf" id="cpfcompradorrodape" name="cpfcompradorrodape" value="<?php if (isset($_SESSION['cpfcompradorrodape'])) {
                                                                                                    echo $_SESSION['cpfcompradorrodape'];
                                                                                                  } ?>">
                  </div>
                </div>
           </div>
<br>
           <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nome Testemunha</label>
                    <input type="text" class="form-control inputUnico "  name="nometestemunha1" value="<?php if (isset($_SESSION['nometestemunha1'])) {
                                                                                                    echo $_SESSION['nometestemunha1'];
                                                                                                  } ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">CPF/MF</label>
                    <input type="text" class="form-control inputUnico cpf" name="cpftestemunha1" value="<?php if (isset($_SESSION['cpftestemunha1'])) {
                                                                                                    echo $_SESSION['cpftestemunha1'];
                                                                                                  } ?>">
                  </div>
                </div>
           </div>
           
           <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nome Testemunha</label>
                    <input type="text" class="form-control inputUnico "  name="nometestemunha2" value="<?php if (isset($_SESSION['nometestemunha2'])) {
                                                                                                    echo $_SESSION['nometestemunha2'];
                                                                                                  } ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">CPF/MF</label>
                    <input type="text" class="form-control inputUnico cpf " name="cpftestemunha2" value="<?php if (isset($_SESSION['cpftestemunha2'])) {
                                                                                                    echo $_SESSION['cpftestemunha2'];
                                                                                                  } ?>">
                  </div>
                </div>
           </div>
    

  </div>
</div>


<div class="container" style="padding-top:5px;">
  <div class="row">
    <div class="col align-self-start">
      <ul class="nav">
        <li><a class="btn btn-primary" id="tela4v" onclick="avancar()" data-toggle="tab" href="#tela3">Voltar</a></li>
      </ul>
    </div>
    <div class="col align-self-center">

    </div>
    <div class="col align-self-end">
      <ul class="nav" style="float:right;">
        <li><input type="submit" name="gerarRecibo" class="btn btn-success" value="Gerar recibo"></li>
      </ul>
    </div>
  </div>

</div>

</div>
        <!--<div id="tela4" class="tab-pane" style="width: 100%; height:100%;">
    <div class="card">
      <div class="card-img-top text-center titulo">
        <p> ARQUIVO </p>
      </div>
      <div class="card-body">
        <h3>Seu recibo esta pronto</h3>
        <br>

        <?php
        if (isset($_POST['gerarRecibo'])) {
          echo "clicou";
        } else {
          echo "n clicou";
        }
        ?>


        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-5">
                <img src="img/pdf.png" width="100px" height="100px">Recibo_2019.pdf
              </div>
              <div class="col-md-2">
                <a href=""><img src="img/download.png" width="65px" height="65px">Baixar</a>
              </div>
              <div class="col-md-2">
                <a href=""><img src="img/visualizar.png" width="65px" height="65px">Visualizar</a>
              </div>
              <div class="col-md-3">
                <a href=""><img src="img/whats.png" width="65px" height="65px">Compartilhar</a>
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
            <li><a class="btn btn-primary" id="tela4v" onclick="avancar()" data-toggle="tab" href="#tela3">Voltar</a></li>
          </ul>
        </div>
        <div class="col align-self-center">

        </div>
        <div class="col align-self-end">
          <ul class="nav" style="float:right;">

            <li><a class="btn btn-success" id="tela4a" onclick="avancar()" data-toggle="tab" href="#tela1">Ok! Finalizar</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>-->
    </form>
  </div>


  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../vendor/jquery-3.2.1.min.js"></script>
  <script src="../vendor/jquery.mask.min.js"></script>
  <script type="text/javascript">
    $('.dinheiro').mask('#.##0,00', {
      reverse: true
    });
    $('.phone_with_ddd').mask('(00) 00000-00000');
    $('.rg').mask('00.000.000-0000');
    $('.cpf').mask('000.000.000-00', {
      reverse: true
    });
    $('.cnpj').mask('00.000.000/0000-00', {
      reverse: true
    });



    var options = {
      onKeyPress: function(cpf, e, field, options) {
        var masks = ['000.000.000-00#', '00.000.000/0000-00'];
        var mask = (cpf.length > 14) ? masks[1] : masks[0];
        $('.cpfcomprador').mask(mask, options);
      }
    };
    
    var options2 = {
      onKeyPress: function(cpf, e, field, options) {
        var masks = ['000.000.000-00#', '00.000.000/0000-00'];
        var mask = (cpf.length > 14) ? masks[1] : masks[0];
        $('.cpfvendedor').mask(mask, options);
      }
    };
    
    var options3 = {
      onKeyPress: function(cpf, e, field, options) {
        var masks = ['000.000.000-00#', '00.000.000/0000-00'];
        var mask = (cpf.length > 14) ? masks[1] : masks[0];
        $('.cpfconjuge').mask(mask, options);
      }
    };

    $('.cpfcomprador').mask('000.000.000-00#', options);
    $('.cpfvendedor').mask('000.000.000-00#', options2);
    $('.cpfconjuge').mask('000.000.000-00#', options3);    
    $('.cpf').mask('000.000.000-00');
  </script>


</body>

</html>