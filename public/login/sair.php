<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/login/gerenciador-login.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    sair();

    $retorno = "Logout realizado com sucesso !";
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();

renderTemplate('login_sair', array(
    'mensagem' => $retorno,
    'categorias' => $categorias
));

