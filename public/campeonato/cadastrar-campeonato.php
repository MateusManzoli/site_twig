<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/campeonato/gerenciador-campeonato.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    if (isset($_POST['campeonato'])) {
        cadastrarCampeonato($_POST);
        $retorno = "Campeonato cadastrado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$login = isset($_SESSION['logado']);

renderTemplate('cadastrar_campeonato', array(
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));
