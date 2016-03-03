<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/noticia/gerenciador-noticias.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

$categorias = buscarCategorias();

try {
    $usuario = array();
    $retorno = "";

    if (isset($_POST)) {
        cadastrarNoticia($_POST);
        $retorno = "Noticia cadastrada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$login = isset($_SESSION['logado']);

renderTemplate('cadastro_noticia', array(
    'categorias' => $categorias,
    'login' => $login,
    'mensagem' => $retorno
));
