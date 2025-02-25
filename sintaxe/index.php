<?php

$clientes = [


  ['nome'=> 'rodrigo',
  'email' =>'rodrigo@gmail.com'],

  ['nome'=> 'xavier',
  'email' =>'xavier@gmail.com'],

  ['nome'=> 'matheus',
  'email' =>'matheus@gmail.com'],
    
];

foreach ($clientes as $cliente) {
  <td><php echo </td>
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>tabela</title>
</head>
<body>
<table>
  <tr>
    <th>NOME</th>
    <th>E-MAIL</th>
    
  </tr>
  <tr>
    <td><?php echo $clientes[0]['nome'] ?></td>
    <td><?php echo $clientes[0]['email'] ?></td>
  </tr>
  <tr>
  <td><?php echo $clientes[1]['nome'] ?></td>
    <td><?php echo $clientes[1]['email'] ?></td>
  </tr>
  <tr>
    
  </tr>
  
    
  </tr>
</table>
</body>
</html>


