<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes//partida/gerenciar-partida.php';

try {
    $usuario = array();
    $retorno = "";

    if ($_POST) {
        editarPartida($_POST);
        $retorno = "Partida editada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$partida = buscarPartida($_GET['id']);
$login = isset($_SESSION['logado']);

renderTemplate('editar_partida', array(
    'partida' => $partida,
    'login' => $login,
    'mensagem' => $retorno
));

