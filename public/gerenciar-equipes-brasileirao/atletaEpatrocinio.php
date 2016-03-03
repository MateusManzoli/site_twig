<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/equipes/gerenciador-equipes.php';
include_once '../../app/funcoes/atletas/gerenciador-atletas.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';


try {
    $usuario = array();
    $retorno = "";

    if (!empty($_POST['patrocinador_id']) && is_numeric($_POST['patrocinador_id'])) {
        inserirPatrocinio($_POST);

        $retorno = "Patrocinador adicionado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

try {
    $usuario = array();
    $mensagem = "";

    if (!empty($_POST['atleta_id']) && is_numeric($_POST['atleta_id'])) {
        contratarAtleta($_POST);
        $mensagem = "Atleta contratado com êxito";
    }
} catch (Exception $e) {
    $mensagem = $e->getMessage();
}

$equipe = buscarEquipe($_REQUEST['equipe_id']);
$login = isset($_SESSION['logado']);

$categorias = buscarCategorias();

$patrocinadores = selecionarPatrocinio();
$atletas = buscarAtletas();

renderTemplate('patrocinio', array(
    'equipe_id' => $_REQUEST['equipe_id'],
    'atletas' => $atletas,
    'patrocinadores' => $patrocinadores,
    'mensagem' => $retorno,
    'login' => $login,
    'retorno' => $mensagem,
    'categorias' => $categorias
));
