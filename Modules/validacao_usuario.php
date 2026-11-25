<?php

// Verifica se o usuario possui pelo menos 18 anos.
function validarIdade(string $dataNascimento): bool
{
    // Verifica se a data foi informada.
    if (empty($dataNascimento)) {
        return false;
    }

    // Converte a data informada.
    $nascimento = DateTimeImmutable::createFromFormat(
        '!Y-m-d',
        $dataNascimento
    );

    // Verifica se a data e valida.
    if (
        !$nascimento ||
        $nascimento->format('Y-m-d') !== $dataNascimento
    ) {
        return false;
    }

    // Obtem a data atual.
    $hoje = new DateTimeImmutable('today');

    // Impede datas de nascimento futuras.
    if ($nascimento > $hoje) {
        return false;
    }

    // Calcula a idade do usuario.
    $idade = $nascimento->diff($hoje)->y;

    // Retorna verdadeiro somente para maiores de 18 anos
    // ou usuarios que possuem exatamente 18 anos.
    return $idade >= 18;
}