<?php

function buscarEquipes() {
    $buscar = " select eq.*,
esporte.nome AS 'nome_esporte'
from aprendizagem.equipe eq
left join esporte ON eq.esporte_id = esporte.id";
    $equipe = pesquisar($buscar);
    return $equipe;
}

function buscarEquipe($id) {
    $buscar = "select * from aprendizagem.equipe where id = $id";
    $equipe = pesquisar($buscar);
    return $equipe[0];
}

function buscarEquipePorPesquisa($pesquisa) {
    // manchete passado no pesquisa nao esta correto pois o nome do formulario de pesquisa era "pesquisa"
    $sql = "select * from aprendizagem.equipe where nome like '%{$pesquisa}%' or conteudo like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarEquipe($dados) {
    validarDadosEquipe($dados);

    if (verificacao($dados['nome'], $dados['esporte_id'])) {
        throw new Exception('Ja possuimos esses dados em nosso sistema');
    }
    $cadastrar = "
        INSERT INTO aprendizagem.equipe SET
            esporte_id = '" . addslashes($dados['esporte_id']) . "',
            nome = '" . addslashes($dados['nome']) . "',
            cidade = '" . addslashes($dados['cidade']) . "',
            presidente = '" . addslashes($dados['presidente']) . "'
        ";
    return inserir($cadastrar);
}

function verificacao($nome, $esporte) {
    $verificar = "select * from aprendizagem.equipe where nome = '{$nome}' && esporte_id = $esporte";
    $equipe = pesquisar($verificar);
    return $equipe;
}

function editarEquipe($dados) {
    validarDadosEquipe($dados);
    $editar = "UPDATE aprendizagem.equipe SET 
            esporte_id = '" . addslashes($dados['esporte_id']) . "',
            nome = '" . addslashes($dados['nome']) . "',
            cidade = '" . addslashes($dados['cidade']) . "',
            presidente = '" . addslashes($dados['presidente']) . "'
            where id = {$dados['id']} ";
    return editar($editar);
}

function excluirEquipe($id) {
    $excluir = "DELETE FROM aprendizagem.equipe WHERE id = $id";
    var_dump($excluir);
    return excluir($excluir);
}

function validarDadosEquipe($dados) {
    // empty 'vazio'
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }
    if (empty($dados['nome'])) {
        throw new Exception('O campo nome precisa ser preenchido');
    }
    if (empty($dados['cidade'])) {
        throw new Exception('O campo cidade precisa ser preenchido');
    }
    if (empty($dados['presidente'])) {
        throw new Exception('O campo presidente precisa ser preenchido');
    }
}

function selecionarPatrocinio() {
    $selecionar = "SELECT * FROM aprendizagem.patrocinador";
    $selec = pesquisar($selecionar);
    return $selec;
}

function inserirPatrocinio($dados) {
    //verifica se ja existe os dados na tabela, se existi nao cadastra
    if (verificarRegistros($dados['patrocinador_id'], $dados['equipe_id'])) {

        throw new Exception("Sua equipe ja possui esse patrocinador");
    }
    $inserir = " INSERT INTO aprendizagem.equipe_patrocinio SET
            patrocinador_id = '" . addslashes($dados['patrocinador_id']) . "',
            equipe_id = '" . addslashes($dados['equipe_id']) . "',
            valor = '" . addslashes($dados['valor']) . "'
        ";
    echo $inserir;
    //retorna o metodo inserir que contem os valores da variavel
    return inserir($inserir);
}

function verificarRegistros($patrocinador_id, $equipe_id) {
    $verificar = "select * from aprendizagem.equipe_patrocinio where patrocinador_id = $patrocinador_id && equipe_id = $equipe_id";
    $verificacao = pesquisar($verificar);
    return $verificacao;
}

function verificarAtletas($atleta_id) {
    $verificar = "select * from aprendizagem.equipe_atleta where atleta_id = $atleta_id ";
    $verificacao = pesquisar($verificar);
    return $verificacao;
}

function contratarAtleta($dados) {

    if (verificarAtletas($dados['atleta_id'])) {
        throw new Exception("Esse atleta ja possui uma equipe!");
    }
    $contratar = "
        INSERT INTO aprendizagem.equipe_atleta SET
           equipe_id = '" . addslashes($dados['equipe_id']) . "',
           atleta_id = '" . addslashes($dados['atleta_id']) . "'";

    echo $contratar;
    return inserir($contratar);
}
