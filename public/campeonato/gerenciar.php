<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/campeonato/gerenciador-campeonato.php';

try {
    $usuario = array();
    $retorno = "";
    if (!empty($_POST)) {
        excluirCampeonato($_POST);
        $retorno = "Campeonato excluido com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$campeonatos = buscarCampeonatos();
$login = isset($_SESSION['logado']);

renderTemplate('listagem_campeonato', array(
    'campeonatos' => $campeonatos,
    'login' => $login,
    'mensagem' => $retorno
));
