<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

$categorias = buscarCategorias();
$login = isset($_SESSION['logado']);

renderTemplate('musicas_sertanejas', array(
    'login' => $login,
    'categorias' => $categorias
));
