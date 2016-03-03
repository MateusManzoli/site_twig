<?php


function buscarPartidas() {
    $buscar = "SELECT * FROM aprendizagem.partida";
    $partida = pesquisar($buscar);
    return $partida;
}

function buscarPartida($id) {
    $buscar = "select * from aprendizagem.partida where id = $id";
    $partida = pesquisar($buscar);
    return $partida[0];
}

function buscarPartidaPorPesquisa($pesquisa) {
    // manchete passado no pesquisa nao esta correto pois o nome do formulario de pesquisa era "pesquisa"
    $sql = "select * from aprendizagem.partida where rodada_id like '%{$pesquisa}%' or local like '%{$pesquisa}%' or data like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarPartida($dados) {
    validarDadosPartida($dados);
    $data = DateTime::createFromFormat('d/m/Y H:i:s', $dados['data'] . $dados['horario']);

    /* if (verificar($dados['local'] . $dados['data'])) {
      throw new Exception("Ja possuimos esse campeontao em nosso sistema");
      } */
    $cadastrar = "
        INSERT INTO aprendizagem.partida SET
            rodada_id = '" . addslashes($dados['rodada_id']) . "',
            local = '" . addslashes($dados['local']) . "',
            data = '" . $data->format('Y-m-d H:i:s') . "'";
    return inserir($cadastrar);
}

/* function verificar($local , $data) {
  $campeonato = "select * from aprendizagem.partida where local = '{$local}' and data = '{$data}'";
  $verificar = pesquisar($campeonato);
  return $verificar;
  } */

function editarPartida($dados) {
    $atualizar = "UPDATE aprendizagem.partida SET 
            rodada_id = '" . addslashes($dados['rodada_id']) . "',
            local = '" . addslashes($dados['local']) . "',
            data = '" . addslashes($dados['data']) . "'
            where id = {$dados['id']} ";
    return editar($atualizar);
}

function validarDadosPartida($dados) {
    // empty 'vazio'
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }

    if (empty($dados['local'])) {
        throw new Exception('O campo local precisa ser preenchido');
    }
    if (empty($dados['data'])) {
        throw new Exception('O campo data precisa ser preenchido');
    }
}

function rodada() {
    for ($i = 1; $i <= 10; $i++) {
        echo $i;
    }
}

function formatarData($data) {
    $dataFormatada = DateTime::createFromFormat('Y-m-d H:i:s', $data);
    echo $dataFormatada->format('d/m/Y H:i:s');
}

function excluirPartida($id) {
    $excluir = "delete from `aprendizagem`.`partida` where id = $id";
    return excluir($excluir);
}
