<?php

function buscarCategorias() {
    $sql = "SELECT * FROM aprendizagem.categorias_twig";
    return pesquisar($sql);
}
function buscarCategoria($id) {
    $buscar = "SELECT * FROM aprendizagem.categorias_twig where id = $id";
    $categoria = pesquisar($buscar);
    return $categoria[0];
}