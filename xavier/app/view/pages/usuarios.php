<?php
include('../../config/env.php');
include('../componentes/navbar.php');
include('../componentes/sidebar.php');

// dados fake
$usuarios = [
    ['nome' => 'Broly', 'email' => 'Broly@email.com'],
    ['nome' => 'Trunks', 'email' => 'Trunks@email.com'],
    ['nome' => 'Yamcha', 'email' => 'Yamcha@email.com'],
    ['nome' => 'Vegeta', 'email' => 'vegeta@email.com']
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xavier Solutions - Usuários</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>style.css">
</head>
<body>
    <!-- Arquivo responsável pela tela de Usuários -->
    <main class="content">
        <h1>Usuários</h1>
        
        <!-- Tabela de Usuários -->
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['nome']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td>
                            <!-- Ações possíveis, como editar ou excluir -->
                            <a href="#">Editar</a> | <a href="#">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <!-- Rodapé -->
    <?php include('../componentes/footer.php'); ?>
</body>
</html>
