<?php 
//require_once __DIR__ . '\..\components\head.php';
require_once '../components/head.php';
?>
<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
     
        <div class="add-user-container">
            <a href="adicionar_usuario.php" class="btn-add-user">Adicionar Usuário</a>
        </div>

        <table class="modern-table">
            <thead>
                <tr>
                    <th>ID do Usuário</th>
                    <th>Nome do Usuário</th>
                    <th>E-mail</th>
                    <th>Ações</th> </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>João Silva</td>
                    <td>joao.silva@email.com</td>
                    <td>
                        <a href="editar_usuario.php?id=1" class="btn-edit">Editar</a>
                        <a href="excluir_usuario.php?id=1" class="btn-delete">Excluir</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ana Souza</td>
                    <td>ana.souza@email.com</td>
                    <td>
                        <a href="editar_usuario.php?id=2" class="btn-edit">Editar</a>
                        <a href="excluir_usuario.php?id=2" class="btn-delete">Excluir</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Lucas Pereira</td>
                    <td>lucas.pereira@email.com</td>
                    <td>
                        <a href="editar_usuario.php?id=3" class="btn-edit">Editar</a>
                        <a href="excluir_usuario.php?id=3" class="btn-delete">Excluir</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Carla Oliveira</td>
                    <td>carla.oliveira@email.com</td>
                    <td>
                        <a href="editar_usuario.php?id=4" class="btn-edit">Editar</a>
                        <a href="excluir_usuario.php?id=4" class="btn-delete">Excluir</a>
                    </td>
                </tr>
            </tbody>
        </table>

    <?php require_once '../components/footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>

    <style>
        /* Estilos do botão Adicionar Usuário */
        .add-user-container {
            margin-bottom: 20px;
        }

        .btn-add-user {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .btn-add-user:hover {
            background-color: #45a049;
        }

        /* Estilos da tabela moderna */
        .modern-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .modern-table thead {
            background-color: #4CAF50; /* Cor de fundo para o cabeçalho */
            color: white;
        }

        .modern-table th, .modern-table td {
            padding: 12px 15px;
            text-align: center; /* Centraliza os títulos e os dados */
        }

        .modern-table th {
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .modern-table tbody tr:nth-child(even) {
            background-color: #f4f4f9; /* Cor de fundo para linhas pares */
        }

        .modern-table tbody tr:hover {
            background-color: #f1f1f1; /* Efeito de hover */
            cursor: pointer;
        }

        .modern-table td {
            font-size: 16px;
            color: #333;
        }

        /* Estilos de borda */
        .modern-table th, .modern-table td {
            border: 1px solid #ddd; /* Borda leve */
        }

        .modern-table thead th {
            border-bottom: 2px solid #4CAF50; /* Borda mais grossa para o cabeçalho */
        }

        /* Links e botões na tabela */
        .modern-table td a {
            color: #4CAF50;
            text-decoration: none;
            margin-right: 10px; /* Espaçamento entre os botões */
            padding: 6px 12px;
            border-radius: 4px;
            border: 1px solid #4CAF50;
            transition: background-color 0.3s ease;
        }

        .modern-table td a:hover {
            background-color: #4CAF50;
            color: white;
        }

        /* Estilos específicos para os botões de Editar e Excluir */
        .btn-edit {
            background-color: #ddd; /* Cinza para o botão Editar */
            color: black; /* Cor do texto preta */
        }

        .btn-delete {
            background-color: #f44336; /* Vermelho para o botão Excluir */
        }

        .btn-edit:hover {
            background-color: #ccc; /* Cor de hover para o botão Editar */
        }

        .btn-delete:hover {
            background-color: #d32f2f; /* Cor de hover para o botão Excluir */
        }
    </style>
</body>
</html>