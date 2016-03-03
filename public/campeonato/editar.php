<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/campeonato/gerenciador-campeonato.php';
try {
    $usuario = array();
    $retorno = "";

    if ($_POST) {
        editarCampeonato($_POST);

        $retorno = "Campeonato editado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$campeonato = buscarCampeonato($_GET['id']);
$login = isset($_SESSION['logado']);

renderTemplate('editar_campeonato', array(
    'campeonato' => $campeonato,
    'login' => $login,
    'mensagem' => $retorno
));