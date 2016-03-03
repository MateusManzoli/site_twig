<?php

include_once '../../app/config.php';

function buscarPartidaEquipes() {
    $buscar = "SELECT pa.*,
eqm.nome AS 'equipe_mandante_nome', eqm.cidade as 'equipe_mandante_cidade', eqm.id AS 'equipe_mandante_id',
eqv.nome AS 'equipe_visitante_nome', eqv.cidade as 'equipe_visitante_cidade',eqv.id AS 'equipe_visitante_id',
campeonato.nome AS 'campeonato_nome'
FROM aprendizagem.partida pa
LEFT JOIN rodada ON rodada.id = (pa.rodada_id)
left join campeonato ON (campeonato.id = rodada.campeonato_id)
LEFT JOIN aprendizagem.partida_equipe pem ON ( pem.partida_id = pa.id AND pem.mandante = 1)
LEFT JOIN aprendizagem.partida_equipe pev ON ( pev.partida_id = pa.id AND pev.mandante = 0)
LEFT JOIN aprendizagem.equipe eqm ON (eqm.id = pem.equipe_id ) 
LEFT JOIN aprendizagem.equipe eqv ON (eqv.id = pev.equipe_id ) 
";
    $rodada = pesquisar($buscar);
    return $rodada;
}

function buscarPartidaEquipe($id) {
    $buscar = "SELECT * FROM aprendizagem.partida_equipe where id = $id";
    $rodada = pesquisar($buscar);
    return $rodada[0];
}

function buscarPartidaEquipePorPesquisa($pesquisa) {
    $sql = "select * from aprendizagem.partida_equipe where numero like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function tratarCadastroPartidaEquipe($dados) {

    $partidas = array(
        'casa' => array(
            'partida_id' => $dados['partida_id'],
            'equipe_id' => $dados['casa_equipe_id'],
            'mandante' => 1,
        ),
        'visitante' => array(
            'partida_id' => $dados['partida_id'],
            'equipe_id' => $dados['visitante_equipe_id'],
            'mandante' => 0,
        )
    );
    foreach ($partidas as $partida) {
        cadastrarPartidaEquipe($partida);
    }
}

function cadastrarPartidaEquipe($dados) {
    $cadastrar = "
        INSERT INTO aprendizagem.partida_equipe SET
            partida_id = '" . addslashes($dados['partida_id']) . "',
            equipe_id = '" . addslashes($dados['equipe_id']) . "',
            mandante = '" . addslashes($dados['mandante']) . "'";
    return inserir($cadastrar);
}

function excluirPartidaEquipe($id) {
    $excluir = "delete from `aprendizagem`.`partida_equipe` where id = $id";
    return excluir($excluir);
}

function editarPartidaEquipe($dados) {
    validarDadosPartidaEquipe($dados);
    $editar = "UPDATE aprendizagem.partida_equipe SET
            id = '" . addslashes($dados['id']) . "',
            partida_id = '" . addslashes($dados['partida']) . "',
            equipe_id = '" . addslashes($dados['equipe']) . "',
            mandante = '" . addslashes($dados['mandante']) . "'
            where id = {$dados['id']} ";
            echo $editar;
    return editar($editar);
}

function validarDadosPartidaEquipe($dados) {
    if (empty($dados['partida'])) {
        throw new Exception('O campo partida(id) precisa ser preenchido');
    }

    if (empty($dados['equipe'])) {
        throw new Exception('O campo equipe(id) precisa ser preenchido');
    }

    if (empty($dados['mandante'])) {
        throw new Exception('O campo mandante mandante ser preenchido');
    }
}
