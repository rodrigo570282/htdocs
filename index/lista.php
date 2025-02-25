<!DOCTYPE html>
<html>
<head>
    <title>Lista de Nomes Ordenada</title>
</head>
<body>
    <h1>Lista de Nomes Ordenada Alfabéticamente</h1>
    <ol>
        <?php
        // Criando um array com os nomes desordenados
        $nomes = ['Carlos', 'Ana', 'Zeca', 'Bia', 'Eduardo', 'Fernanda', 'Gabriel', 'Helena', 'Igor', 'Julia', 'Kevin', 'Laura'];

        // Ordenando o array em ordem alfabética
        sort($nomes);

        // Exibindo a lista ordenada em HTML
        foreach ($nomes as $nome) {
            echo "<li>$nome</li>";
        }
        ?>
    </ol>
</body>
</html>