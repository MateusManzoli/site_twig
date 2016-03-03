<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/noticia/gerenciador-noticias.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    if ($_POST) {
        editarNoticia($_POST);

        $retorno = "Noticia editada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$noticia = buscarNoticia($_GET['id']);
$login = isset($_SESSION['logado']);

renderTemplate('editar_noticia', array(
    'noticia' => $noticia,
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));
