<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/atletas/gerenciador-atletas.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';


try {
    $usuario = array();
    $retorno = "";

    if ($_POST) {
        editarAtleta($_POST);

        $retorno = "Atleta editado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$atleta = buscarAtleta($_GET['id']);
$login = isset($_SESSION['logado']);


renderTemplate('editar_atleta', array(
    'atleta' => $atleta,
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));
?>