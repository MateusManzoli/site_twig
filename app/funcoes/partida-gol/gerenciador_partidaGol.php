<?php

function buscarPartidaGols() {
    $buscar = "SELECT * FROM aprendizagem.partida_gol";
    $rodada = pesquisar($buscar);
    return $rodada;
}

function buscarPartidaGol($id) {
    $buscar = "select * from aprendizagem.partida_gol where id = $id";
    $rodada = pesquisar($buscar);
    return $rodada[0];
}

function cadastrarPartidaGol($dados) {
    $cadastrar = "
        INSERT INTO aprendizagem.partida_gol SET
        partida_id = '" . addslashes($dados['partida_id']) . "',
        equipe_id = '" . addslashes($dados['equipe_id']) . "',
        atleta_id = '" . addslashes($dados['atleta_id']) . "',
        minuto = '" . addslashes($dados['minuto']) . "'";
    return inserir($cadastrar);
}

function editarPartidaGol($dados) {
    validarDadosPartidaGol($dados);
    $editar = "UPDATE aprendizagem.partida_gol SET 
            partida_id = '" . addslashes($dados['partida_id']) . "',
            equipe_id = '" . addslashes($dados['equipe_id']) . "',
            atleta_id = '" . addslashes($dados['atleta_id']) . "',
            minuto = '" . addslashes($dados['minuto']) . "'
            where id = {$dados['id']} ";
    return editar($editar);
}

function excluirPartidaGol($id) {
    $excluir = "delete from `aprendizagem`.`partida_gol` where id = $id";
    return excluir($excluir);
}

function validarDadosPartidaGol($dados) {
    if (empty($dados['partida_id'])) {
        throw new Exception('O campo partida precisa ser preenchido');
    }
    if (empty($dados['equipe_id'])) {
        throw new Exception('O campo equipe precisa ser preenchido');
    }
    if (empty($dados['atleta_id'])) {
        throw new Exception('O campo atleta precisa ser preenchido');
    }
    if (empty($dados['minuto'])) {
        throw new Exception('O campo minuto precisa ser preenchido');
    }
}