<?php
include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/login/gerenciador-login.php';

try {
    $editar_cliente = array();
    $retorno = "";

    if ($_POST) {
        editarUsuario($_POST);
        $_GET['usuario_id'] = $_POST['id'];
        $retorno = "Usuario editado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$usuario = buscarUsuario($_GET['id']);
$login = isset($_SESSION['logado']);

renderTemplate('editar_usuario', array(
    'usuario' => $usuario,
    'login' => $login,
    'mensagem' => $retorno
));
