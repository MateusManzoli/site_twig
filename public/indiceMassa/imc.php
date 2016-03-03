<?php

error_reporting(0);
ini_set('display_errors', 0);
include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/calculo-imc/gerenciarCalculoImc.php';

try {
    $usuario = array();
    $retorno = "";

    if ($_POST) {
        $calculo = calcularImc($_POST['peso'], $_POST['altura']);
        $retorno = "Imc calculado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$login = isset($_SESSION['logado']);

renderTemplate('imc', array(
    'calculo' => $calculo,
    'login' => $login,
    'mensagem' => $retorno
));
