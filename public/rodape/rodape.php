<?php

include_once'../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

$categorias = buscarCategorias();
$login = isset($_SESSION['logado']);

renderTemplate('rodape', array(
    'login' => $login,
    'categorias' => $categorias
));

