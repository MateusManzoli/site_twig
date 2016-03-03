<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/login/gerenciador-login.php';

try {
    $usuario = array();
    $retorno = "";

    validarLogin($_POST['email'], $_POST['senha']);

    $retorno = "Login realizado com sucesso !";
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

renderTemplate('processo_login', array(
    'mensagem' => $retorno
));

