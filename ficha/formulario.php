<?php

session_start();
require_once("../checarLogin.php");
header("Content-Type: text/html; charset=utf-8", true);
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
            var element = document.getElementById("tela3v");
            element.classList.remove("active");            
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
        <form action="ficha.php" method="POST">
            <div class="tab-content">
                <div id="tela1" class="tab-pane active">
                    <div class="card">
                        <div class="card-img-top text-center titulo">
                            <p> DADOS PESSOAIS </p>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-9">
                                    <label class="bmd-label-floating">Cliente</label>
                                    <input type="text" class="form-control  inputUnico" name="cliente" value="<?php echo retornasession('cliente'); ?>"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <p>Estado civil</p>
                                        <div class="custom-control custom-radio  custom-control-inline">
                                            <input type="radio" id="solteiro" name="estadocivil" class="custom-control-input inputUnico" value="solteiro" <?php if (isset($_SESSION['estadocivil']) and $_SESSION['estadocivil'] == 'solteiro') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                            <label class="custom-control-label radio-inline" for="solteiro">Solteiro</label>
                                        </div>
                                        <div class="custom-control custom-radio  custom-control-inline">
                                            <input type="radio" id="casado" name="estadocivil" class="custom-control-input inputUnico" value="casado" <?php if (isset($_SESSION['estadocivil']) and $_SESSION['estadocivil'] == 'casado') {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                            <label class="custom-control-label radio-inline" for="casado">Casado</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"><label class="bmd-label-floating">RG/Orgão Emissor</label>
                                    <input type="text" class="form-control inputUnico" name="rg" value="<?php echo retornasession('rg'); ?>"></div>
                                <div class="col-md-3"><label class="bmd-label-floating">CPF/MF</label>
                                    <input type="text" class="form-control inputUnico cpf" name="cpf" value="<?php echo retornasession('cpf'); ?>"></div>
                                <div class="col-md-3"><label class="bmd-label-floating">Naturalidade</label>
                                    <input type="text" class="form-control inputUnico" name="naturalidade" value="<?php echo retornasession('naturalidade'); ?>"></div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-img-top text-center titulo">
                            <p> ENDEREÇO </p>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-6"><label class="bmd-label-floating">Endereço</label>
                                    <input type="text" class="form-control inputUnico" maxlength="75" name="endereco" value="<?php echo retornasession('endereco'); ?>"></div>
                                <div class="col-md-3"><label class="bmd-label-floating">Bairro</label>
                                    <input type="text" class="form-control inputUnico" name="bairro" value="<?php echo retornasession('bairro'); ?>">
                                </div>
                                <div class="col-md-3"><label class="bmd-label-floating">Cidade /UF</label>
                                    <input type="text" class="form-control inputUnico" name="cidade" value="<?php echo retornasession('cidade'); ?>"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-6"><label class="bmd-label-floating">E-mail</label>
                                    <input type="text" class="form-control inputUnico" name="email" value="<?php echo retornasession('email'); ?>"></div>
                                <div class="col-md-3"><label class="bmd-label-floating">Celular</label>
                                    <input type="text" class="form-control inputUnico phone_with_ddd" name="celular" placeholder="(xx)-xxxx-xxxx" value="<?php echo retornasession('celular'); ?>"></div>
                                <div class="col-md-3"><label class="bmd-label-floating">Comercial</label>
                                    <input type="text" class="form-control inputUnico phone_with_ddd_only" name="comercial" placeholder="(xx)-xxxx-xxxx" value="<?php echo retornasession('comercial'); ?>"></div>
                            </div>

                        </div>


                    </div>



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


                <div id="tela2" class="tab-pane">
                    <div class="card">
                        <div class="card-img-top text-center titulo">
                            <p> Referência do Imóvel </p>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input inputUnico" id="casa" name="checkcasa" <?php if(isset($_SESSION['checkcasa'])){echo "checked";} ?> >
                                            <label class="custom-control-label" for="casa">Casa</label>
                                        </div>

                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input inputUnico" id="sobrado" name="checksobrado" <?php if(isset($_SESSION['checksobrado'])){echo "checked";} ?>>
                                            <label class="custom-control-label" for="sobrado">Sobrado</label>
                                        </div>

                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input inputUnico" id="apartamento" name="checkapartamento" <?php if(isset($_SESSION['checkapartamento'])){echo "checked";} ?>>
                                            <label class="custom-control-label" for="apartamento">Apartamento</label>
                                        </div>

                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input inputUnico" id="terreno" name="checkterreno"<?php if(isset($_SESSION['checkterreno'])){echo "checked";} ?>>
                                            <label class="custom-control-label" for="terreno">Terreno</label>
                                        </div>

                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input inputUnico" id="chacara" name="checkchacara"<?php if(isset($_SESSION['checkchacara'])){echo "checked";} ?>>
                                            <label class="custom-control-label" for="chacara">Chácara</label>
                                        </div>

                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input inputUnico" id="sitio" name="checksitio"<?php if(isset($_SESSION['checksitio'])){echo "checked";} ?>>
                                            <label class="custom-control-label" for="sitio">Sítio</label>
                                        </div>

                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input inputUnico" id="loja" name="checkloja"<?php if(isset($_SESSION['checkloja'])){echo "checked";} ?>>
                                            <label class="custom-control-label" for="loja">Loja</label>
                                        </div>

                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input inputUnico" id="barracao" name="checkbarracao"<?php if(isset($_SESSION['checkbarracao'])){echo "checked";} ?>>
                                            <label class="custom-control-label" for="barracao">Barracão</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input inputUnico" id="residencial" name="checkresidencial"<?php if(isset($_SESSION['checkresidencial'])){echo "checked";} ?>>
                                            <label class="custom-control-label" for="residencial">Residencial</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input inputUnico" id="comercial" name="checkcomercial"<?php if(isset($_SESSION['checkcomercial'])){echo "checked";} ?>>
                                            <label class="custom-control-label" for="comercial">Comercial</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Observações de referencia do imovel</label>
                                        <input type="text" class="form-control inputUnico" maxlength="350" name="obsimovel" value="<?php echo retornasession('obsimovel') ?>"></div>
                                </div>                                                                                                        

                                <div class="row">
                                    <div class="col-md-6"><label class="bmd-label-floating">Endereço</label>
                                        <input type="text" class="form-control inputUnico" name="enderecoimovel" value="<?php echo retornasession('enderecoimovel'); ?>"></div>
                                    <div class="col-md-3"><label class="bmd-label-floating">Bairro</label>
                                        <input type="text" class="form-control inputUnico" name="bairroimovel" value="<?php echo retornasession('bairroimovel'); ?>">
                                    </div>
                                    <div class="col-md-3"><label class="bmd-label-floating">Cidade /UF</label>
                                        <input type="text" class="form-control inputUnico" name="cidadeimovel" value="<?php echo retornasession('cidadeimovel'); ?>"></div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3"><label class="bmd-label-floating">Próximo</label><input type="text" class="form-control inputUnico" name="proximo" value="<?php echo retornasession('proximo'); ?>"></div>
                                    <div class="col-md-3"><label class="bmd-label-floating">Edifício</label><input type="text" class="form-control inputUnico" name="edificil" value="<?php echo retornasession('edificil'); ?>"></div>
                                    <div class="col-md-2"><label class="bmd-label-floating">Área Construída</label><input type="text" class="form-control inputUnico" name="areaconstruida" value="<?php echo retornasession('areaconstruida'); ?>"></div>
                                    <div class="col-md-2"><label class="bmd-label-floating">Área Útil</label><input type="text" class="form-control inputUnico" name="areautil" value="<?php echo retornasession('areautil'); ?>"></div>
                                    <div class="col-md-2"><label class="bmd-label-floating">Área do Terreno</label><input type="text" class="form-control inputUnico" name="areadoterreno" value="<?php echo retornasession('areadoterreno'); ?>"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><label class="bmd-label-floating">Quadra</label><input type="text" class="form-control inputUnico" name="quadra" maxlength="22" value="<?php echo retornasession('quadra'); ?>"></div>
                                    <div class="col-md-2"><label class="bmd-label-floating">Lote</label><input type="text" class="form-control inputUnico" name="lote" maxlength="19" value="<?php echo retornasession('lote'); ?>"></div>
                                    <div class="col-md-2"><label class="bmd-label-floating">Idade</label><input type="text" class="form-control inputUnico" name="idade" value="<?php echo retornasession('idade'); ?>"></div>

                                    <div class="input-group mb-3 col-md-5" style="padding-top:25px;">

                                        <div class="input-group-prepend">
                                            <div class="input-group-text">                                               
                                               
                                                <div class="col-md-3">
                                    
                                                <label class="bmd-label-floating" >Condominio:</label>
                                        <div class="custom-control custom-radio  custom-control-inline">
                                       
                                            <input type="radio" id="condominiosim" name="condominio" class="custom-control-input inputUnico" value="sim" <?php if (isset($_SESSION['condominio']) and $_SESSION['condominio'] == 'sim') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                            <label class="custom-control-label" for="condominiosim">Sim</label>
                                        </div>
                                        <div class="custom-control custom-radio  custom-control-inline">
                                            <input type="radio" id="condominionao" name="condominio" class="custom-control-input inputUnico" value="nao" <?php if (isset($_SESSION['condominio']) and $_SESSION['condominio'] == 'nao') {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                            <label class="custom-control-label radio-inline" for="condominionao">Não</label>
                                        </div>

                                    
                                </div>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control inputUnico dinheiro" name="valorcondominio" value="<?php echo retornasession('valorcondominio') ?>" placeholder="Valor R$:">
                                    </div>

                                </div>


                                
                                <div class="row">
                                    <div class="col-md-4"><label class="bmd-label-floating">Valor do Imóvel R$</label><input type="text" class="form-control inputUnico dinheiro" name="valorimovel" value="<?php echo retornasession('valorimovel') ?>"></div>
                                    <div class="input-group mb-3 col-md-8" style="padding-top:25px;">

                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <label class="bmd-label-floating">Recebe Outro Bem na Transação: </label>
                                                <div class="custom-control custom-radio  custom-control-inline">
                                       
                                            <input type="radio" id="outrobemsim" name="outrobem" class="custom-control-input inputUnico" value="sim" <?php if (isset($_SESSION['outrobem']) and $_SESSION['outrobem'] == 'sim') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                            <label class="custom-control-label" for="outrobemsim">Sim</label>
                                        </div>
                                        <div class="custom-control custom-radio  custom-control-inline">
                                            <input type="radio" id="outrobemnao" name="outrobem" class="custom-control-input inputUnico" value="nao" <?php if (isset($_SESSION['outrobem']) and $_SESSION['outrobem'] == 'nao') {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                            <label class="custom-control-label radio-inline" for="outrobemnao">Não</label>
                                        </div>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control inputUnico dinheiro" name="valoroutrobem" placeholder="Valor R$:" value="<?php echo retornasession('valoroutrobem') ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><label class="bmd-label-floating">Obs</label><input type="text" class="form-control inputUnico" name="obs" maxlength="107" value="<?php echo retornasession('obs') ?>"></div>
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
                            <p> Autorização de Vendas </p>
                        </div>
                        <div class="card-body">
                            <br>
                            <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="radio-inline" for="com">A promover <strong>com </strong>ou <strong>sem</strong> exclusividade de venda? </label>
                                        <div class="custom-control custom-radio  custom-control-inline">
                                            <input type="radio" id="com" name="comsem" class="custom-control-input inputUnico" value="com" <?php if (isset($_SESSION['comsem']) and $_SESSION['comsem'] == 'com') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                            <label class="custom-control-label radio-inline" for="com">Com</label>
                                        </div>
                                        <div class="custom-control custom-radio  custom-control-inline">
                                            <input type="radio" id="sem" name="comsem" class="custom-control-input inputUnico" value="sem" <?php if (isset($_SESSION['comsem']) and $_SESSION['comsem'] == 'sem') {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                            <label class="custom-control-label radio-inline" for="sem">Sem</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                <div class="input-group col-md-9">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="5">Autorizo a Imobiliária a venda do imóvel registrado na Cidade de: </span>
                                    </div>
                                    <input type="text" class="form-control inputUnico" id="" name="autorizocidade" aria-describedby="5" value="<?php echo retornasession('autorizocidade') ?>">
                                </div>
                                <div class="input-group col-md-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="4">Matrícula: </span>
                                    </div>
                                    <input type="text" class="form-control inputUnico" id="" name="autorizocri" aria-describedby="4" value="<?php echo retornasession('autorizocri') ?>">
                                </div>                                
                                </div>
                            
                            
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-img-top text-center titulo">
                            <p> Comissão e validade </p>
                        </div>
                        <div class="card-body">

                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="4">O presente tem validade de :</span>
                                </div>
                                <input type="text" class="form-control inputUnico" id="dias" name="validade" placeholder="Dias" aria-describedby="4" value="<?php echo retornasession('dias') ?>">
                            </div>
                            <br>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">Com direito à comissão de :</span>
                                </div>
                                <input type="text" class="form-control inputUnico dinheiro" name="comissao" id="comissao" placeholder="%" aria-describedby="basic-addon3 " value="<?php echo retornasession('comissao') ?>">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-img-top text-center titulo">
                            <p> Data </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text" id="basic-cidade">Cidade</span>
                                        </div>
                                        <input type="text" class="form-control inputUnico form-control inputUnico-sm " name="cidadediames" aria-describedby="basic-cidade" value="<?php if (isset($_SESSION['cidade'])) {
                                                                                                                                                                echo $_SESSION['cidade'];
                                                                                                                                                            } else {
                                                                                                                                                                echo "Pontal do Paraná";
                                                                                                                                                            } ?>">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text" id="basic-mes">Data</span>
                                        </div>
                                        <input type="text" class="form-control inputUnico form-control inputUnico-sm " name="diames" aria-describedby="basic-mes" value="<?php if (isset($_SESSION['diames'])) {
                                                                                                                                                        echo $_SESSION['diames'];
                                                                                                                                                    } else {
                                                                                                                                                        echo strftime("%e de %B de %Y");
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
                                    <li><a class="btn btn-primary" id="tela3v" onclick="avancar()" data-toggle="tab" href="#tela2">Voltar</a></li>
                                </ul>
                            </div>
                            <div class="col align-self-center">

                            </div>
                            <div class="col align-self-end">
                                <ul class="nav" style="float:right;">
                                    <li><input type="submit" class="btn btn-success" name="gerarficha" value="Gerar"></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
        </form>


        <?php
        function retornasession($session)
        {

            if (isset($_SESSION[$session])) {

                return $_SESSION[$session];
            } else {

                return "";
            }
        }


        ?>



    </div>


    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <script src="../vendor/jquery.mask.min.js"></script>

    <script type="text/javascript">
        $('.dinheiro').mask('#.##0,00', {
            reverse: true
        });

        $('.phone_with_ddd').mask('(00)00000-00000');

        $('.phone_with_ddd_only').mask('(00)0000000000');

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
        $('#comissao').mask('##%', {
            reverse: true
        });
        $('#dias').mask('## Dias', {
            reverse: true
        });
    </script>


</body>

</html>