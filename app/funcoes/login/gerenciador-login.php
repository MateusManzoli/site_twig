<?php

function cadastrarUsuarios($dados) {
    validarUsuarios($dados);

    $data_nascimento = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);

    if (verifica($dados['email'])) {
        throw new Exception("Email ja cadastrado em nosso sistema");
    }
    $cadastrarUsu = "INSERT INTO aprendizagem.usuario SET
             nome = '" . ($dados['nome']) . "',
             email = '" . ($dados['email']) . "',
             senha = '" . md5($dados['senha']) . "',
             data_nascimento = '" . $data_nascimento->format('Y-m-d') . "'";
    return inserir($cadastrarUsu);
}

function verifica($email) {
    $email = "select * from aprendizagem.usuario where email = '{$email}'";
    $verificar = pesquisar($email);
    return $verificar;
}

function buscarUsuarios() {
    $sql = "SELECT * FROM aprendizagem.usuario";
    return pesquisar($sql);
}

function buscarUsuario($id) {
    $buscar = "select * from aprendizagem.usuario where id = $id";
    $usuario = pesquisar($buscar);
    return $usuario[0];
}

function excluirUsuario($id) {
    $deletar = "delete from aprendizagem.usuario where id = $id";
    return excluir($deletar);
}

function editarUsuario($dados) {
    $atualizar = "UPDATE aprendizagem.usuario SET 
            nome = '" . addslashes($dados['nome']) . "',
            email = '" . addslashes($dados['email']) . "',
            senha = '" . addslashes($dados['senha']) . "',
            data_nascimento = '" . addslashes($dados['data_nascimento']) . "'
            where id = {$dados['id']} ";

    return editar($atualizar);
}

function formatarDataVisualizacao($data) {

    $dataFormatada = DateTime::createFromFormat('Y-m-d', $data);
    echo $dataFormatada->format('d/m/Y');
}

function validarUsuarios($dados) {
    // empty 'vazio'

    if (empty($dados['nome'])) {
        throw new Exception('O campo nome precisa ser preenchido');
    }

    if (empty($dados['email'])) {
        throw new Exception('O campo email precisa ser preenchido');
    }

    if (empty($dados['senha'])) {
        throw new Exception('O campo senha precisa ser preenchido');
    }

    if (empty($dados['data_nascimento'])) {
        throw new Exception('O campo data de nascimento precisa ser preenchido');
    }
}

function validarLogin($email, $senha) {

    $login = "select * from aprendizagem.usuario where email = '" . $email . "' && senha ='" . md5($senha) . "'";
    $logar = pesquisar($login);

    if (!$logar) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        $_SESSION['logado'] = false;
        throw new Exception('O nome de usuário e a senha fornecidos não correspondem às informações em nossos registros.Verifique-as e tente novamente.');
    }
    return ($_SESSION = array(
        'usuario' => array(
            'email' => $email,
            'senha' => $senha,
            'nome' => $logar[0]['nome'],
        ),
        'horarios' => array(
            'data' => date('d/m/Y'),
            'hora' => date('H:i:s'),
        ),
        'logado' => true,
    ));
}

//funcao para destruir o login do usuario
function sair() {
    unset($_SESSION);
    session_destroy();
}
