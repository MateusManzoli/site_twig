<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/equipes/gerenciador-equipes.php';
include_once '../../app/funcoes/esporte/gerenciar-esporte.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';


try {
    $usuario = array();
    $retorno = "";

    if ($_POST) {
        editarEquipe($_POST);

        $retorno = "Equipe editada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$login = isset($_SESSION['logado']);
$equ = buscarEquipe($_GET['id']);

renderTemplate('editar_equipe', array(
    'equipe' => $equ,
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));

