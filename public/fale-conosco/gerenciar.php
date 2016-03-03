<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/fale-conosco/gerenciador-faleConosco.php';
try {
    $usuario = array();
    $retorno = "";

    if (!empty($_POST['deletar'])) {
        excluirSolicitacao($_POST['id']);
        $retorno = "Solicitacao enviada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$solicitacoes = buscarSolicitacoes();
$login = isset($_SESSION['logado']);

renderTemplate('listagem_contato', array(
    'solicitacoes' => $solicitacoes,
    'login' => $login,
    'mensagem' => $retorno
));