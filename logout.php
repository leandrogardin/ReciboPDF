<?php
 
// inicia a sessão
session_start();
 
// muda o valor de logged_in para false
$_SESSION['logado'] = false;
 
// finaliza a sessão
session_destroy();
 
// retorna para a index.php
header('Location: login.php');