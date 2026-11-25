<?php

require_once __DIR__ .
    '/../Modules/validacao_usuario.php';

// Obtem a data atual para gerar datas de teste.
$hoje = new DateTimeImmutable('today');

// Define os cenarios de teste.
$testes = [
    [
        'descricao' => 'Usuario com 20 anos',
        'data' => $hoje->modify('-20 years')->format('Y-m-d'),
        'esperado' => true
    ],
    [
        'descricao' => 'Usuario com exatamente 18 anos',
        'data' => $hoje->modify('-18 years')->format('Y-m-d'),
        'esperado' => true
    ],
    [
        'descricao' => 'Usuario com 17 anos',
        'data' => $hoje->modify('-17 years')->format('Y-m-d'),
        'esperado' => false
    ],
    [
        'descricao' => 'Usuario com 10 anos',
        'data' => $hoje->modify('-10 years')->format('Y-m-d'),
        'esperado' => false
    ],
    [
        'descricao' => 'Data de nascimento futura',
        'data' => $hoje->modify('+1 day')->format('Y-m-d'),
        'esperado' => false
    ],
    [
        'descricao' => 'Data de nascimento invalida',
        'data' => '2026-02-30',
        'esperado' => false
    ],
    [
        'descricao' => 'Data de nascimento vazia',
        'data' => '',
        'esperado' => false
    ]
];

// Contador de falhas.
$falhas = 0;

// Executa todos os cenarios.
foreach ($testes as $teste) {

    $resultado = validarIdade($teste['data']);

    if ($resultado === $teste['esperado']) {

        echo "[PASSOU] " . $teste['descricao'] . PHP_EOL;

    } else {

        echo "[FALHOU] " . $teste['descricao'] . PHP_EOL;

        $falhas++;
    }
}

// Se algum teste falhar, o CI devera ficar vermelho.
if ($falhas > 0) {
    echo PHP_EOL;
    echo "$falhas teste(s) falharam." . PHP_EOL;

    exit(1);
}

// Se todos passarem, o CI devera ficar verde.
echo PHP_EOL;
echo "Todos os 7 testes passaram!" . PHP_EOL;

exit(0);