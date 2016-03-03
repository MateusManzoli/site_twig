<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/atletas/gerenciador-atletas.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    if (isset($_POST)) {
        cadastrarAtleta($_POST);
        $retorno = "Atleta cadastrado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$login = isset($_SESSION['logado']);

renderTemplate('cadastrar_atleta', array(
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));
