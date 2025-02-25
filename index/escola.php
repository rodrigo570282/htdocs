<?php

class Escola {
    public $nome;
    public $endereco;
    public $capacidade;

    public function __construct($nome, $endereco, $capacidade) {
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->capacidade = $capacidade;
    }
}

// Array para armazenar as escolas
$escolas = [];

// Função para inserir uma nova escola
function inserirEscola($escola) {
    global $escolas;
    $escolas[] = $escola;
}

// Função para listar todas as escolas
function listarEscolas() {
    global $escolas;
    foreach ($escolas as $escola) {
        echo "Nome: {$escola->nome}<br>";
        echo "Endereço: {$escola->endereco}<br>";
        echo "Capacidade: {$escola->capacidade}<br><br>";
    }
}

// Função para excluir uma escola (por índice)
function excluirEscola($indice) {
    global $escolas;
    if (isset($escolas[$indice])) {
        unset($escolas[$indice]);
    }
}

// Exemplo de uso:
$escola1 = new Escola('Escola Municipal', 'Rua das Escolas, 123', 500);
$escola2 = new Escola('Colégio Estadual', 'Avenida Principal, 456', 800);
$escola3 = new Escola('Colégio Federal', 'Avenida Brasil, 456', 900);

inserirEscola($escola1);
inserirEscola($escola2);


listarEscolas();

// Excluir a primeira escola
excluirEscola(0);

echo "Após a exclusão:<br>";
listarEscolas();