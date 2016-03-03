<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/atletas/gerenciador-atletas.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    if (!empty($_POST['delete'])) {
        excluirAtleta($_POST['id_atleta']);
        $retorno = "Atleta excluido com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$login = isset($_SESSION['logado']);
$atletas = buscarAtletas();

renderTemplate('listagem_atleta', array(
    'atletas' => $atletas,
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));
?>
