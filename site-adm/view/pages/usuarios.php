<?php 

require_once './../../config/env.php'; 

?>

<?php require_once __DIR__ . '\..\components\head.php'; ?>
<body class="content">
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>
    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    <main class="content-grid">
        <h1>Usuários 
        <button class="adicionar">Adicionar Usuários</button>
        </h1>

        <style>
            .table {
                tr, td, th {
                    border: 1px solid;
                }
            }
        </style>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>Nome</th>
                    <th>ações</th>
                    <th></th>
                </tr>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>rodrigo.com</td>
                    <td>Rodrigo</td>
                    <td>
                        <button class="editar">Editar</button>
                        <button class="excluir">Excluir</button>
                    </td>
                    <td></td>
                </tr>
                
            </tbody>
            </thead>
        </table>
    </main>

    

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
    
</body>
</html>

<!-- id - email - nome (botao editar) (botão excluir) -->