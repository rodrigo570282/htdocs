<?php 

require_once './../../config/env.php'; 

?>

<?php require_once __DIR__ . '\..\components\head.php'; ?>
<body class="content">
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>
    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>
    <link rel="stylesheet" href="view/assets/css/components/tabela.css">

    <main class="content-grid">
        <h1>Usuários</h1>

        <?php
        // Dados de exemplo (você pode substituir por dados do banco de dados)
        $usuarios = [
            ['id' => 1, 'nome' => 'João Silva', 'email' => 'joao@email.com'],
            ['id' => 2, 'nome' => 'Maria Oliveira', 'email' => 'maria@email.com'],
            ['id' => 3, 'nome' => 'Pedro Santos', 'email' => 'pedro@email.com'],
        ];
        ?>

        <a href="#">Adicionar Usuário</a>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id']; ?></td>
                        <td><?php echo $usuario['nome']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td>
                            <a href="#">Editar</a> | <a href="#">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>
</html>