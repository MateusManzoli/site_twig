<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/noticia/gerenciador-noticias.php';

try {
    $usuario = array();
    $retorno = "";

    if (isset($_POST['excluir'])) {
        excluirNoticias($_POST['id_noticia']);
        $retorno = "Noticia excluida com êxito !";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$noticias = buscarNoticiasMenuPrincipal();
$login = isset($_SESSION['logado']);

renderTemplate('listagem_noticia', array(
    'noticias' => $noticias,
    'login' => $login,
    'mensagem' => $retorno
));
