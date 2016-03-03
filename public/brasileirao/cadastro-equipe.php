<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/equipes/gerenciador-equipes.php';
include_once '../../app/funcoes/esporte/gerenciar-esporte.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';


try {
    $usuario = array();
    $retorno = "";

    if (!empty($_POST)) {
        cadastrarEquipe($_POST);
        $retorno = "Equipe cadastrada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$esportes = buscarEsportes();

$login = isset($_SESSION['logado']);

renderTemplate('cadastrar_equipe', array(
    'esportes' => $esportes,
    'mensagem' => $retorno,
    'login' => $login,
    'categorias' => $categorias
));
