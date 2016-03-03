<?php

include_once '../../dados/dados-head.php';
include_once '../../app/funcoes/equipes/gerenciador-equipes.php';

try {
    $usuario = array();
    $retorno = "";

    if (!empty($_POST['excluir'])) {
        excluirEquipe($_POST['excluir']);
        $retorno = "Equipe Excluir com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}
$login = isset($_SESSION['logado']);
$equipes = buscarEquipes();

renderTemplate('listagem_equipe', array(
    'equipes' => $equipes,
    'login' => $login,
    'mensagem' => $retorno
));
?>

