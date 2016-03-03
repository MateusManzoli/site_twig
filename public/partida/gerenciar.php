<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/partida/gerenciar-partida.php';
include_once '../../app/funcoes/partida-equipe/gerenciador-partidaEquipe.php';
include_once '../../app/funcoes/equipes/gerenciador-equipes.php';
include_once '../../app/funcoes/atletas/gerenciador-atletas.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    if ($_POST) {
        excluirPartida($_POST['id_partida']);
        $retorno = "Partida editada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}
$partidas = buscarPartidaEquipes();
$login = isset($_SESSION['logado']);

renderTemplate('listagem_partida', array(
    'partidas' => $partidas,
    'login' => $login,
    'mensagem' => $retorno
));
