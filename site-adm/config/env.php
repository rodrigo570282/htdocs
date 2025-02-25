<?php

$caminhoArquivo = __DIR__ . '/../.env';
$conteudoArquivo = file($caminhoArquivo);

$variaveis = [];

array_map(
    function ($linha) use (&$variaveis) {
        list($key, $val) = explode('=', $linha); 
        $variaveis[$key] = $val;
    },
    $conteudoArquivo
);

define('VARIAVEIS', $variaveis);