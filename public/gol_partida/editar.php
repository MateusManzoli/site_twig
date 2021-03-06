<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/partida-gol/gerenciador_partidaGol.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    if ($_POST) {
        editarPartidaGol($_POST);
        $retorno = "Gol editado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$partida_gol = buscarPartidaGol($_GET['id']);
$login = isset($_SESSION['logado']);

renderTemplate('editar_golPartida', array(
    'partida_gol' => $partida_gol,
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
    
));