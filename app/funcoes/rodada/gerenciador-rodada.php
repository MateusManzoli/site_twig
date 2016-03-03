<?php


function buscarRodadas() {
    $buscar = "SELECT rd.*, 
campeonato.nome AS 'campeonato_nome'
FROM aprendizagem.rodada rd
left join campeonato ON campeonato.id  = rd.campeonato_id ;
";
    $rodada = pesquisar($buscar);
    return $rodada;
}

function buscarRodada($id) {
    $buscar = "select * from aprendizagem.rodada where id = $id";
    $rodada = pesquisar($buscar);
    return $rodada[0];
}

function buscarProdutosDoPedido() {
    $buscar = "select * from composer.produto
    left join composer.pedido_produto ON(pedido_produto.produto_id = produto.id); ;
";
    $rodada = pesquisar($buscar);
    return $rodada;
}

function buscarRodadaPorPesquisa($pesquisa) {
    $sql = "select * from aprendizagem.rodada where numero like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarRodada($dados) {
    validarDadosRodada($dados);
    if (verificarRegistros($dados['campeonato'], $dados['numero'])) {
        throw new Exception("Os dados ja existem em nossos registros");
    }
    $cadastrar = "
        INSERT INTO aprendizagem.rodada SET
        campeonato_id = '" . addslashes($dados['campeonato']) . "',
        numero = '" . addslashes($dados['numero']) . "'";
    return inserir($cadastrar);
}

function verificarRegistros($campeonato_id, $numero) {
    $verificar = "select * from aprendizagem.rodada where campeonato_id = $campeonato_id && numero = $numero";
    $verificacao = pesquisar($verificar);
    return $verificacao;
}

function editarRodada($dados) {
    validarDadosRodada($dados);
    $editar = "UPDATE aprendizagem.rodada SET 
            numero = '" . addslashes($dados['numero']) . "'
            where id = {$dados['id']} ";
    return editar($editar);
}

function excluirRodada($id) {
    $excluir = "delete from `aprendizagem`.`rodada` where id = $id";
    return excluir($excluir);
}

function validarDadosRodada($dados) {
    if (empty($dados['numero'])) {
        throw new Exception('O campo numero precisa ser preenchido');
    }
}
