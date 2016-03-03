<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/login/gerenciador-login.php';
//include_once '../cabecalho/cabecalho.php';

try {
    $usuario = array();
    $retorno = "";

    sair();

    $retorno = "Logout realizado com sucesso !";
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

renderTemplate('login_sair', array(
    'mensagem' => $retorno
));

