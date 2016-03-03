<?php

function calcularImc($peso, $altura) {
    $peso = str_replace(',', '.', $peso);
    $altura = str_replace(',', '.', $altura);
    $alturaElevada = $altura * $altura;
    $calculo = $peso / $alturaElevada;
    // array cria 2 posicoes para retorna em diferente ocasioes
    return array('valor' => $calculo, 'situacao' => imcSituacao($calculo));
}

function imcSituacao($dados) {
    if ($dados <= 17) {
        return 'Muito abaixo do peso';
    } elseif ($dados > 17 && $dados <= 18.49) {
        return 'Abaixo do peso';
    } elseif ($dados > 18.5 && $dados <= 24.99) {
        return 'Peso ideal';
    } elseif ($dados > 25 && $dados <= 29.99) {
        return 'Levemente acima do peso';
    } elseif ($dados > 30 && $dados <= 34.99) {
        return 'Obesidade grau I';
    } elseif ($dados > 35 && $dados <= 39.99) {
        return 'Obesidade grau II (severa)';
    } elseif ($dados > 40) {
        return 'Obesidade grau III (mórbida)';
    }
}
