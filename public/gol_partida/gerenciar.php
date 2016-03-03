<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/partida-gol/gerenciador_partidaGol.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    if (isset($_POST['gol'])) {
        excluirPartidaGol($_POST['partida_gol_id']);
        $retorno = "Exclusao de gol realizado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$gols = buscarPartidaGols();
$login = isset($_SESSION['logado']);

renderTemplate('listagem_golPartida', array(
    'gols' => $gols,
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));