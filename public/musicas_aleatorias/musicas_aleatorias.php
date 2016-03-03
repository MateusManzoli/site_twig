<?php
include_once '../../dados/dados-head.php';
include_once '../cabecalho/cabecalho.php';

$login = isset($_SESSION['logado']);

renderTemplate('musicas_sertanejas', array(
    'login' => $login
));
