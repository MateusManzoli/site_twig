<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/login/gerenciador-login.php';
include_once '../../app/funcoes/tipo-noticia/gerenciar-tipoNoticia.php';

try {
    $retorno = "";
    if (!empty($_POST['delete'])) {
        excluirUsuario($_POST['id_usuario']);

        $retorno = "Usuario excluido com êxito! ";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$categorias = buscarCategorias();
$usuarios = buscarUsuarios();
$login = isset($_SESSION['logado']);

renderTemplate('listagem_usuario', array(
    'usuarios' => $usuarios,
    'login' => $login,
    'mensagem' => $retorno,
    'categorias' => $categorias
));

