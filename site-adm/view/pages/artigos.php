<?php
require_once '../components/head.php';
?>

<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
        
        <a href="adicionar_artigo.php" class="add-article-button">Adicionar Artigo</a>

        <table class="modern-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Conteúdo</th>
                    <th>Categoria_ID</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Avanços na Pesquisa de Câncer</td>
                    <td>Conteúdo resumido do artigo sobre avanços na pesquisa de câncer.</td>
                    <td>1</td>
                    <td>
                        <a href="editar_artigo.php?id=1" class="edit-button">Editar</a>
                        <a href="excluir_artigo.php?id=1" class="delete-button">Excluir</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Explorando o Universo: Missões Espaciais Recentes</td>
                    <td>Conteúdo resumido do artigo sobre missões espaciais recentes.</td>
                    <td>1</td>
                    <td>
                        <a href="editar_artigo.php?id=2" class="edit-button">Editar</a>
                        <a href="excluir_artigo.php?id=2" class="delete-button">Excluir</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Os Melhores Filmes de 2025</td>
                    <td>Conteúdo resumido do artigo sobre os melhores filmes de 2025.</td>
                    <td>2</td>
                    <td>
                        <a href="editar_artigo.php?id=3" class="edit-button">Editar</a>
                        <a href="excluir_artigo.php?id=3" class="delete-button">Excluir</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Tendências em Videogames: O Futuro dos Jogos Interativos</td>
                    <td>Conteúdo resumido do artigo sobre tendências em videogames.</td>
                    <td>2</td>
                    <td>
                        <a href="editar_artigo.php?id=4" class="edit-button">Editar</a>
                        <a href="excluir_artigo.php?id=4" class="delete-button">Excluir</a>
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

        /* Botão "Adicionar Artigo" */
        .add-article-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .add-article-button:hover {
            background-color: #45a049;
        }

        /* Botões "Editar" e "Excluir" */
        .edit-button, .delete-button {
            display: inline-block;
            padding: 8px 12px;
            margin: 4px;
            text-decoration: none;
            border-radius: 5px;
            color: black;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .edit-button {
            background-color: #ddd;
        }

        .edit-button:hover {
            background-color: #ccc;
        }

        .delete-button {
            background-color: #f44336;
        }

        .delete-button:hover {
            background-color: #d32f2f;
        }

        /* Centralizar colunas ID e Categoria_ID */
        .modern-table td:nth-child(1), .modern-table td:nth-child(4) {
            text-align: center;
        }
    </style>
</body>
</html>