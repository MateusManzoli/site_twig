<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/login/gerenciador-login.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $usuario = array();
    $retorno = "";

    if (isset($_POST['cadastrar'])) {
        cadastrarUsuarios($_POST);
        $retorno = "Usuario cadastrado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$login = isset($_SESSION['logado']);

renderTemplate('cadastro_usuario', array(
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));