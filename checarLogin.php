<?php

if (!isset($_SESSION)) {
    session_start();
}
ob_start();



$sessao = $_SESSION['logado'];



function VerificarStatusLogin($sessao)
{

    if (!isset($sessao) || $sessao !== true) {
        return false;
    }
    return true;
}

if (!VerificarStatusLogin($sessao)) {
    header('Location: login.php');
}
