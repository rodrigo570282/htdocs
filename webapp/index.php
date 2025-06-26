<?php

// inicia a sessão
session_start();


require_once __DIR__ . '/app/model/GaleriaModel.php';

$galeriaModel = new GaleriaModel();
$imagens = $galeriaModel->buscarTodas();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>

    <style>
        <?php require_once __DIR__ . '/app/view/assets/style.css'; ?>
    </style>
</head>

<body>
    <?php if (isset($_SESSION['id'])): ?>
        <section>
            <p>
                Olá <?= $_SESSION['nome'] ?>
            </p>
        </section>
    <?php endif; ?>
    <section>
        <div class="flex end g-2">
            <a href="login.php">
                Entrar
            </a>
            <a href="logout.php">
                Sair
            </a>
            <a href="usuarioCadastrar.php">
                Cadastrar usuário
            </a>
        </div>
        <?php if (isset($_SESSION['id'])): ?>
            <form action="upload.php"
                method="POST"
                enctype="multipart/form-data">
                <div>
                    <label for="usuario_id">Usuário</label>
                    <input type="text" name="usuario_id" required>
                </div>
                <div>
                    <label for="foto">Imagem</label>
                    <input type="file" name="foto" accept="image/*">
                </div>
                <button type="submit">Enviar</button>
            </form>
        <?php endif; ?>
    </section>

    <section>
        <div class="container">
            <?php foreach ($imagens as $imagem): ?>
                <div class="image-box">
                    <img src="<?= $imagem['imagem_caminho'] ?>" alt="<?= $imagem['imagem_nome_original'] ?>">
                    <a href="<?= $imagem['imagem_caminho'] ?>" download>
                        <?= $imagem['imagem_nome_original'] ?>
                    </a>
                    <span>
                        Enviado por:
                        <a href="usuarioGaleria.php?id=<?= $imagem['usuario_id'] ?>">
                            <?= $imagem['usuario_nome'] ?>
                        </a>
                    </span>
                </div>
            <?php endforeach  ?>
        </div>
    </section>
</body>

</html>