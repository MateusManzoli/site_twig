<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/noticia/gerenciador-noticias.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

$categorias = buscarCategorias();
$login = isset($_SESSION['logado']);

renderTemplate('base', array(
    'logado' => $login,
    'categorias' => $categorias
));
