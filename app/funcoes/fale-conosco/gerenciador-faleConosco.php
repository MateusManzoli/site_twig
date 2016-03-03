<?php


//md5 é utilizado para colocar codigos na senha
function enviarSolicitacao($dados) {
    validarSolicitacao($dados);
// formato que será passado no formulario d m Y
//formato que sera armazenado no BD Y-m-d
    $date_nascimento = DateTime::createFromFormat('d/m/Y', $dados['nascimento']);
    $enviar = "INSERT INTO aprendizagem.atendimento SET
            nome = '" . addslashes(($dados['nome'])) . "',
            email = '" . ($dados['email']) . "',
            sexo = '" . ($dados['optionsRadios']) . "',
            cidade = '" . addslashes(($dados['cidade'])) . "',            
            logradouro = '" . addslashes(($dados['logradouro'])) . "',
            estado = '" . addslashes(($dados['estado'])) . "',
            data = '" . $dados['data_solicitacao'] . "',
            assunto = '" . ($dados['assunto']) . "',
            mensagem = '" . addslashes(($dados['mensagem'])) . "',
            nascimento = '" . $date_nascimento->format('Y-m-d') . "'";
    return inserir($enviar);
}

function buscarSolicitacoes() {
    $sql = "SELECT * FROM aprendizagem.atendimento";
    return pesquisar($sql);
}

function buscarSolicitacao($id) {
    $buscar = "select * from aprendizagem.atendimento where id = $id";
    $usuario = pesquisar($buscar);
    return $usuario[0];
}

function excluirSolicitacao($id) {
    $excluir = "delete from aprendizagem.atendimento where id = $id";
    return excluir($excluir);
}

function validarSolicitacao($dados) {
// empty 'vazio'
    if (empty($dados['nome'])) {
        throw new Exception('O campo nome precisa ser preenchido');
    }
    if (empty($dados['email'])) {
        throw new Exception('O campo email precisa ser preenchido');
    }
    if (empty($dados['optionsRadios'])) {
        throw new Exception('O campo Sexo precisa ser preenchido');
    }
    if (empty($dados['nascimento'])) {
        throw new Exception('O campo nascimento precisa ser preenchido');
    }
    if (empty($dados['logradouro'])) {
        throw new Exception('O campo logradouro precisa ser preenchido');
    }
    if (empty($dados['estado'])) {
        throw new Exception('O campo estado precisa ser preenchido');
    }
    if (empty($dados['assunto'])) {
        throw new Exception('O campo assunto precisa ser preenchido');
    }
    if (empty($dados['mensagem'])) {
        throw new Exception('O campo mensagem precisa ser preenchido');
    }
}
