<?php
    require_once __DIR__ . '/../../../config/env.php';
    require_once __DIR__ . '/../../../model/UsuarioModel.php';

    $usuarioModel = new UsuarioModel();
    $lista = $usuarioModel->listar();
?>

<?php require_once __DIR__ . '/../../components/head.php'; ?>

<body class="container-adm">
    <?php require_once __DIR__ . '/../../components/navbar.php'; ?>
    <?php require_once __DIR__ . '/../../components/sidebar.php'; ?>

    <main class="content-adm">
        <h3>Usuários >> Listagem</h3>

        <div class="container">
            <div class="actions">
                <a href="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/usuario.php' ?>">
                    <button class="btn btn-primary">Novo</button>
                </a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Email</td>
                        <td>Nome</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $item) { ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['email'] ?></td>
                        <td><?= $item['nome'] ?></td>
                        <td class="table-actions">
                            <a
                                href="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/usuario.php?id=' . $item['id'] ?>">
                                <span class="btn-icon material-symbols-outlined" title="Acessar">
                                    login
                                </span>
                            </a>
                            <form method="POST"
                                action="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/usuario.php?id=' . $item['id'] ?>">
                                <span class="btn-icon material-symbols-outlined" title="Excluir">
                                    delete
                                </span>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php require_once __DIR__ . '/../../components/footer.php'; ?>

    <script src="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_JS'] ?>main.js"></script>
</body>

</html>