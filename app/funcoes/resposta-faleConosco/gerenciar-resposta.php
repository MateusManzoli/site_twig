<?php
function enviarResposta($solicitacao) {
    validarResposta($solicitacao);
    $resposta = "INSERT INTO aprendizagem.atendimento_resposta SET
            atendimento_id = '" . ($solicitacao['id']) . "',
            mensagem = '". addslashes(($solicitacao['mensagem'])) ."'";
    return inserir($resposta);
}
/*function excluirResposta($id) {
    $deletar = "delete from aprendizagem.resposta where id = $id";
    return excluir($deletar);
}*/
function validarResposta($solicitacao) {
// empty 'vazio'
    if (empty($solicitacao['mensagem'])) {
        throw new Exception('O campo Mensagem precisa ser preenchido');
    }
}
