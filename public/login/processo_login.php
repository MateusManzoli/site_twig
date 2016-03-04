<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/login/gerenciador-login.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    validarLogin($_POST['email'], $_POST['senha']);

    $retorno = "Login realizado com sucesso !";
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();

renderTemplate('processo_login', array(
    'mensagem' => $retorno,
    'categorias' => $categorias
));

