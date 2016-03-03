<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/partida-gol/gerenciador_partidaGol.php';
include_once '../../app/funcoes/atletas/gerenciador-atletas.php';
include_once '../../app/funcoes/equipes/gerenciador-equipes.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    if (isset($_POST['partida'])) {
        cadastrarPartidaGol($_POST);
        $retorno = "Gol cadastrado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$atletas = buscarAtletaPorEquipe(($_REQUEST['equipe_id']));
$login = isset($_SESSION['logado']);

renderTemplate('cadastrar_golPartida', array(
    'atletas' => $atletas,
    'mensagem' => $retorno,
    'login' => $login,
    'partida_id' => $_GET['partida_id'],
    'equipe_id' => $_GET['equipe_id'],
    'categorias' => $categorias
));
