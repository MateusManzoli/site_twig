<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/fale-conosco/gerenciador-faleConosco.php';
try {
    $usuario = array();
    $retorno = "";

    if (isset($_POST['publicar'])) {
        enviarSolicitacao($_POST);
        $retorno = "Solicitacao enviada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$login = isset($_SESSION['logado']);

$date = date('d/m/Y H:i:s');
renderTemplate('contato', array(
    'date' => $date,
    'login' => $login,
    'mensagem' => $retorno
));
