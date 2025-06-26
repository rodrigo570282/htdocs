<?php
require_once __DIR__ . '/app/model/UsuariosModel.php';
require_once __DIR__ . '/app/service/ImagensUploadService.php';

$usuariosModel = new UsuariosModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Esta preenchido o form
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

        // faz upload da imagem de perfil se existir
        if (!empty($_FILES['imagem_perfil']['tmp_name'])) {
            $imagemSalva = ImagensUploadService::upload($_FILES['imagem_perfil']);
        }

        // salva no banco de dados
        $usuariosModel->salvar([
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'imagem_perfil_id' => $imagemSalva['id'] ?? null
        ]);

        return header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuário</title>

    <style>
        <?php require_once __DIR__ . '/app/view/assets/style.css'; ?>
    </style>
</head>

<body>
    <section>
        <div class="flex">
            <p>
                <a href="index.php">Voltar</a>
            </p>
        </div>
        <form action="usuarioCadastrar.php"
            method="POST"
            enctype="multipart/form-data">
            <div>
                <label for="nome">Nome</label>
                <input name="nome" type="text">
            </div>
            <div>
                <label for="email">E-mail</label>
                <input name="email" type="text">
            </div>
            <div>
                <label for="senha">Senha</label>
                <input name="senha" type="password">
            </div>
            <div>
                <label for="imagem_perfil">Foto de perfil</label>
                <input type="file" name="imagem_perfil" accept="image/*">
            </div>

            <div>
                <button type="submit">Salvar</button>
            </div>
        </form>
    </section>
</body>

</html>