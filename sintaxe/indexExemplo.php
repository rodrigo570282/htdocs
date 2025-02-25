<?php

// IF ELSE tradicional
$num1 = 10;

// condição => divisivel por 2
if ( ($num1 % 2) == 0 ) {
    echo "$num1 É par!";
} else {
    echo "$num1 Não é par!";
}

echo "<br><br>";

// IF ELSE IF
$num1 = 8;
$num2 = 8;

//  condição
if ($num1 > $num2) {
    // executa este bloco se a condição for TRUE
    echo "num1 maior que num2";
} else if ($num1 < $num2) {
    // executa este bloco se a condição for TRUE
    echo "num1 não é maior que num2";
} else {
    // executa este bloco se nenhuma condição anterior for atendida
    echo "num1 é igual a num2";
}

echo "<br><br>";

// Ternário
$nome = "FULANO";

$ehValido = $nome === "" ? "Não pode ser vazio" : "Valido";

// if ($nome === "") {
//     $ehValido = FALSE;
// } else {
//     $ehValido = TRUE;
// }

var_dump($ehValido);

echo "<br><br>";

// Estrutras de repetição

$nomes = [
    "Otávio",
    "Henrique",
    "Carlos",
    "Rodrigo",
    "Jonathan"
];

// percorrer um array
foreach ($nomes as $nome) {
    echo "$nome <br>";
}

echo "<br><br>";

// repetição tradicional for
for ($i = 1; $i <= 10; $i++) {
    echo "$i <br>";
}

echo "<br><br>";

// FUNÇÕES

function escreverOlaMundo() {
    echo "<br> Olá Mundo! <br>";
}

function somar($a, $b) {
    echo $a + $b;
}

function ehPar($num) {
    if (($num % 2) == 0) {
        return "$num é PAR";
    } else {
        return "$num é IMPAR";
    }
}

// Tratamento de erros
function dividir($a, $b) {
    try {
        $res =  $a / $b;
        echo "$a / $b = $res";
    } catch (DivisionByZeroError $e) {
        echo "Não pode dividir por zero!";
    } catch (TypeError $e) {
        echo "Somente números!";
    }
}


?>

<div>
    <h1>HOME</h1>

    <p>
        <?php escreverOlaMundo(); ?>
    </p>

    <p>
        <?php somar(1, 999); ?>
    </p>

    <p>
        <?php echo ehPar(100); ?>
    </p>

    <p>
        <?php dividir(5, "asdasd"); ?>
    </p>
</div>