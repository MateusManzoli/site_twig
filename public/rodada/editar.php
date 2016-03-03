<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/rodada/gerenciador-rodada.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $retorno = "";
    if ($_POST) {
        editarRodada($_POST);
        $_GET['rodada_id'] = $_POST['id'];
        $retorno = "Rodada editada com êxito! ";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$rodada = buscarRodada($_GET['rodada_id']);
$login = isset($_SESSION['logado']);

renderTemplate('editar_rodada', array(
    'rodada' => $rodada,
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));
