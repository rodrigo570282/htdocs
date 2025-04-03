<?php
require_once __DIR__ . '/../../../config/env.php';
require_once __DIR__ . '/../../../model/UsuarioModel.php';

$usuarioModel = new UsuarioModel();

// modo edição ou criação
if (isset($_GET['id'])) {
    $modo = 'EDICAO';
    $usuario = $usuarioModel->buscarPorId($_GET['id']);
} else {
    $modo = 'CRIACAO';
    $usuario = [
        'id' => '',
        'email' => '',
        'nome' => '',
        'cpf' => '',
        'dataNascimento' => '',
    ];
}

// Processamento do formulário de edição/criação
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) { //Verifica se é post e se o email está setado.
    $dados = [
        'id' => $_POST['id'],
        'email' => $_POST['email'],
        'nome' => $_POST['nome'],
        'cpf' => $_POST['cpf'],
        'dataNascimento' => $_POST['dataNascimento'],
    ];

    if ($modo === 'CRIACAO') {
        if ($usuarioModel->criar($dados['nome'], $dados['email'], $dados['telefone'], $dados['dataNascimento'], $dados['cpf'])) {
            header('Location: ' . APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/usuarios.php');
            exit;
        } else {
            echo "Erro ao criar usuário.";
        }
    } elseif ($modo === 'EDICAO') {
        if ($usuarioModel->editar($dados)) {
            header('Location: ' . APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/usuarios.php');
            exit;
        } else {
            echo "Erro ao editar usuário.";
        }
    }
}

// Processamento da exclusão
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) { //Verifica se é post e se o excluir está setado.
    $id = $_GET['id'];
    if ($usuarioModel->excluir($id)) {
        header('Location: ' . APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/usuarios.php');
        exit;
    } else {
        echo "Erro ao excluir usuário.";
    }
}
?>

<?php require_once __DIR__ . '/../../components/head.php'; ?>

<body class="container-adm">
    <?php require_once __DIR__ . '/../../components/navbar.php'; ?>
    <?php require_once __DIR__ . '/../../components/sidebar.php'; ?>

    <main class="content-adm">
        <h3>Usuários >> <?= $modo == 'EDICAO' ? 'Editar ' . $usuario['id'] : 'Criar' ?></h3>

        <div class="container">
            <form class="form" method="POST" action="">
                <div class="form-content">
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

                    <div class="input-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" value="<?= $usuario['email'] ?>" required>
                    </div>

                    <div class="input-group">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" value="<?= $usuario['nome'] ?>" required>
                    </div>

                    <div class="input-group">
                        <label for="dataNascimento">Data de nascimento</label>
                        <input name="dataNascimento" type="date" value="<?= $usuario['dataNascimento'] ?>">
                    </div>

                    <div class="input-group">
                        <label for="cpf">CPF</label>
                        <input name="cpf" type="text" value="<?= $usuario['cpf'] ?>">
                    </div>
                </div>

                <div class="form-actions">
                    <a href="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/usuarios.php' ?>">
                        <button class="btn" type="button">Cancelar</button>
                    </a>
                    <button class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </main>

    <?php require_once __DIR__ . '/../../components/footer.php'; ?>

    <script src="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_JS'] ?>main.js"></script>
</body>

</html>