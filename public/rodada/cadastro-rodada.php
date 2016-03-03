<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/rodada/gerenciador-rodada.php';
include_once '../../app/funcoes/campeonato/gerenciador-campeonato.php';

try {
    $retorno = "";
    if (!empty($_POST['campeonato']) && is_numeric($_POST['campeonato'])) {
        cadastrarRodada($_POST);
        $retorno = "Rodada cadastrada com êxito! ";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$campeonatos = buscarCampeonatos();
$login = isset($_SESSION['logado']);

renderTemplate('cadastro_rodada', array(
    'campeonatos' => $campeonatos,
    'login' => $login,
    'mensagem' => $retorno
));
