<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/noticia/gerenciador-noticias.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';


if (isset($_POST['pesquisa'])) {
    $noticias = buscarNoticiasPorPesquisa($_POST['pesquisa']);
} elseif (!empty($_GET['categoria'])) {
    $noticias = buscarNoticiasPorCategoria($_GET['categoria']);
} else {
    $noticias = buscarNoticiasMenuPrincipal();
}

$categorias = buscarCategorias();
$login = isset($_SESSION['logado']);

renderTemplate('conteudo', array(
    'noticias' => $noticias,
    'login' => $login,
    'categorias' => $categorias
));

