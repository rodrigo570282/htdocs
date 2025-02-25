<!DOCTYPE html>
<html>
<head>
    <title>Lista de Carros</title>
</head>
<body>

<h1>Lista de Carros</h1>

<?php
// Array com informações dos carros
$carros = [
    ['marca' => 'Toyota', 'modelo' => 'Corolla', 'ano' => 2023],
    ['marca' => 'Honda', 'modelo' => 'Civic', 'ano' => 2022],
    ['marca' => 'Volkswagen', 'modelo' => 'Gol', 'ano' => 2021],
    ['marca' => 'Chevrolet', 'modelo' => 'Onix', 'ano' => 2020],
    ['marca' => 'Fiat', 'modelo' => 'Argo', 'ano' => 2019],
    ['marca' => 'Hyundai', 'modelo' => 'HB20', 'ano' => 2018],
    ['marca' => 'Ford', 'modelo' => 'Fiesta', 'ano' => 2017],
    ['marca' => 'Renault', 'modelo' => 'Kwid', 'ano' => 2016],
    ['marca' => 'Nissan', 'modelo' => 'Versa', 'ano' => 2015],
    ['marca' => 'Peugeot', 'modelo' => '208', 'ano' => 2014]
];

// Percorrendo o array e exibindo as informações
foreach ($carros as $carro) {
    echo "<h2>{$carro['ano']}</h2>";
    echo "<p>{$carro['marca']} {$carro['modelo']} {$carro['ano']}</p>";
}
?>

</body>
</html>