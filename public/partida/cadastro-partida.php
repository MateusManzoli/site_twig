<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/partida/gerenciar-partida.php';
include_once '../../app/funcoes/rodada/gerenciador-rodada.php';
include_once '../../app/funcoes/campeonato/gerenciador-campeonato.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    if (!empty($_POST['cadastrarRodada'])) {
        cadastrarPartida($_POST);
        $retorno = "Partida cadastrada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$date = date('d/m/Y');
$horario = date('H:i:s');
$rodadas = buscarRodadas();
$login = isset($_SESSION['logado']);

renderTemplate('cadastro_partida', array(
    'rodadas' => $rodadas,
    'date' => $date,
    'horario' => $horario,
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));
