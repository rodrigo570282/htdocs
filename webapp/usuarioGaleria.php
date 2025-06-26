<?php
require_once __DIR__ . '/app/model/UsuariosModel.php';
require_once __DIR__ . '/app/model/GaleriaModel.php';

$usuairosModel = new UsuariosModel();
$galeriaModel = new GaleriaModel();

if (!isset($_GET['id'])) {
    return header('Location: index.php');
}

$id = $_GET['id'];
$usuario = $usuairosModel->buscarPorId($id);
$imagens = $galeriaModel->buscarPorUsuarioId($id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de <?= $usuario['nome'] ?></title>

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
        <div class="flex column center align-center">
            <?php if (!empty($usuario['imagem_perfil_caminho'])): ?>
                <p class="profile-image">
                    <img src="<?= $usuario['imagem_perfil_caminho'] ?>" alt="foto de perfil">
                </p>
            <?php endif; ?>
            <p>
                Bem vindo a galeria de <strong><?= $usuario['nome'] ?></strong>,
                entre em contado pelo e-mail <?= $usuario['email'] ?>
            </p>
        </div>
    </section>

    <section>
        <div class="container">
            <?php foreach ($imagens as $imagem): ?>
                <div class="image-box">
                    <img src="<?= $imagem['imagem_caminho'] ?>" alt="<?= $imagem['imagem_nome_original'] ?>">
                    <a href="<?= $imagem['imagem_caminho'] ?>" download>
                        <?= $imagem['imagem_nome_original'] ?>
                    </a>
                </div>
            <?php endforeach  ?>
        </div>
    </section>
</body>

</html>