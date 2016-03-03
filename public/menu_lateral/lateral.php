<?php

include_once '../../dados/dados-head.php';
include_once'../../app/funcoes/login/gerenciador-login.php';

$login = isset($_SESSION['logado']);


renderTemplate('template', array(
    'login' => $login
));
