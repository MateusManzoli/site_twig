<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/fale-conosco/gerenciador-faleConosco.php';
include_once '../../app/funcoes/resposta-faleConosco/gerenciar-resposta.php';
try {
    $usuario = array();
    $retorno = "";

    if (isset($_POST['id'])) {
        enviarResposta($_POST);
        $retorno = "Resposta enviada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$solicitacoes = buscarSolicitacao($_GET['id']);
$login = isset($_SESSION['logado']);

renderTemplate('responder_contato', array(
    'solicitacoes' => $solicitacoes,
    'login' => $login,
    'mensagem' => $retorno
));
