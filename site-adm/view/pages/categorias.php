<?php
require_once '../components/head.php';
?>

<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
    

        <a href="adicionar_categoria.php" class="add-category-button">Adicionar Categoria</a>

        <table class="modern-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><a href="categoria.php?id=1">Ciência</a></td>
                    <td>
                        <a href="editar_categoria.php?id=1" class="edit-button">Editar</a>
                        <a href="excluir_categoria.php?id=1" class="delete-button">Excluir</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><a href="categoria.php?id=2">Entretenimento</a></td>
                    <td>
                        <a href="editar_categoria.php?id=2" class="edit-button">Editar</a>
                        <a href="excluir_categoria.php?id=2" class="delete-button">Excluir</a>
                    </td>
                </tr>
                
            </tbody>
        </table>


    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>

    <style>
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
            background-color: #4CAF50;
            color: white;
        }

        .modern-table th, .modern-table td {
            padding: 12px 15px;
            text-align: left;
        }

        .modern-table th {
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center; /* Centraliza o texto do cabeçalho */
        }

        .modern-table tbody tr:nth-child(even) {
            background-color: #f4f4f9;
        }

        .modern-table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .modern-table td {
            font-size: 16px;
            color: #333;
        }

        /* Estilos de borda */
        .modern-table th, .modern-table td {
            border: 1px solid #ddd;
        }

        .modern-table thead th {
            border-bottom: 2px solid #4CAF50;
        }

        /* Links na tabela */
        .modern-table td a {
            color: #4CAF50;
            text-decoration: none;
        }

        .modern-table td a:hover {
            text-decoration: underline;
        }

        /* Botão "Adicionar Categoria" */
        .add-category-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: black; /* Altera a cor do texto para preto */
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .add-category-button:hover {
            background-color: #45a049;
        }

        /* Botões "Editar" e "Excluir" */
        .edit-button, .delete-button {
            display: inline-block;
            padding: 8px 12px; /* Aumenta o tamanho clicável */
            margin: 4px; /* Adiciona margem entre os botões */
            text-decoration: none;
            border-radius: 5px; /* Bordas arredondadas */
            color: black; /* Mantém a cor do texto preta */
            font-weight: bold; /* Texto em negrito para destaque */
            transition: background-color 0.3s ease; /* Transição suave */
        }

        .edit-button {
            background-color: #ddd; /* Cor de fundo cinza */
        }

        .edit-button:hover {
            background-color: #ccc; /* Cor de fundo cinza mais escura no hover */
        }

        .delete-button {
            background-color: #f44336; /* Cor de fundo vermelha */
        }

        .delete-button:hover {
            background-color: #d32f2f; /* Cor de fundo vermelha mais escura no hover */
        }

        /* Centralizar coluna ID */
        .modern-table td:nth-child(1) {
            text-align: center;
        }

        /* Centralizar coluna Ações */
        .modern-table td:nth-child(3) {
            text-align: center;
        }
    </style>
</body>
</html>