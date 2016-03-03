<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes//partida/gerenciar-partida.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    if ($_POST) {
        editarPartida($_POST);
        $retorno = "Partida editada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$partida = buscarPartida($_GET['id']);
$login = isset($_SESSION['logado']);

renderTemplate('editar_partida', array(
    'partida' => $partida,
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));

