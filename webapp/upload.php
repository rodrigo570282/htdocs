<?php

require_once __DIR__ . '/app/model/GaleriaModel.php';
require_once __DIR__ . '/app/service/ImagensUploadService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['foto']) && isset($_POST['usuario_id'])) {
        $imagem = $_FILES['foto'];
        // to-do validar se existe o usuário
        $usuarioId = $_POST['usuario_id'];

        $imagemSalva = ImagensUploadService::upload($imagem);

        $galeriaModel = new GaleriaModel();
        $galeriaModel->salvar($imagemSalva['id'], $usuarioId);
    }
}

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
    <section>
        <div class="flex">
            <p>
                <a href="index.php">Voltar</a>
            </p>
        </div>
        <?php if ($imagemSalva): ?>
            <p>
                Imagem salva com sucesso em <?= $imagemSalva['caminho'] ?>.
            </p>
        <?php endif ?>
    </section>
</body>

</html>