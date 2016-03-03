<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/rodada/gerenciador-rodada.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $retorno = "";
    if (isset($_POST['partida'])) {
        excluirRodada($_POST['id_rodada']);

        $retorno = "Usuario excluido com êxito! ";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$rodadas = buscarRodadas();
$login = isset($_SESSION['logado']);

renderTemplate('listagem_rodada', array(
    'rodadas' => $rodadas,
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));

