<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/noticia/gerenciador-noticias.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

$categorias = buscarCategorias();
$noticia = buscarNoticia($_GET['id']);
$login = isset($_SESSION['logado']);

renderTemplate('noticia', array(
    'noticia' => $noticia,
    'login' => $login,
    'categorias' => $categorias
));

