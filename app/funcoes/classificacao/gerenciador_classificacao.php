<?php

include_once '../../PDO/conexao.php';

function buscarClassificacoes() {
    $buscar = "SELECT * FROM aprendizagem.classificacao";
    $classificacoes = pesquisar($buscar);
    return $classificacoes;
}

function buscarClassificacao($id) {
    $buscar = "select * from aprendizagem.classificacao where id = $id";
    $classificacao = pesquisar($buscar);
    return $rodada[0];
}

function buscarClassificacaoPorPesquisa($pesquisa) {
    $sql = "SELECT * FROM aprendizagem.classificacao where equipe_id like '%{$pesquisa}%' or pontos like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarClassificacao($dados) {
    validarDadosClassificacao($dados);
    $cadastrar = "
        INSERT INTO aprendizagem.classificacao SET
            equipe_id = '" . addslashes($dados['equipe_id']) . "',
            pontos = '" . addslashes($dados['mandante']) . "'
        ";
    return inserir($cadastrar);
}

function editarClassificacao($dados) {
    validarDadosClassificacao($dados);
    $editar = "UPDATE aprendizagem.classificacao SET  
            equipe_id = '" . addslashes($dados['mandante']) . "',
            pontos = '" . addslashes($dados['mandante']) . "'
            where id = {$dados['id']} ";
    echo $editar;
    return editar($editar);
}

function excluirClassificacao($id) {
    $excluir = "delete from `aprendizagem`.`classificacao` where id = $id";
    return excluir($excluir);
}

function validarDadosClassificacao($dados) {
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }
    if (empty($dados['partida_id'])) {
        throw new Exception('O campo partida_id precisa ser preenchido');
    }
    if (empty($dados['equipe_id'])) {
        throw new Exception('O campo equipe_id precisa ser preenchido');
    }

    if (empty($dados['mandante'])) {
        throw new Exception('O campo mandante precisa ser preenchido');
    }
}
