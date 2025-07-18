<?php

function verificarSessaoEDeslogar(int $tempoLimiteSessao = 1800): void
{
    // Inicia a sessão se ainda não estiver iniciada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Se o usuário está logado (verificamos pela presença do 'id' na sessão)
    if (isset($_SESSION['id'])) {
        // Obtenha a hora atual e a hora do login registrada na sessão
        $horaAtual = time();
        $horaLogin = $_SESSION['hora_login']; // Assume que 'hora_login' é definido no momento do login

        // Se a última interação extrapolou o limite de tempo permitido para a sessão
        if (($horaAtual - $horaLogin) > $tempoLimiteSessao) {
            // Redireciona o usuário para a página de logout para deslogá-lo
            header('Location: logout.php');
            exit(); // **Crucial**: Termina a execução do script para garantir o redirecionamento imediato
        }
        // Se a sessão está ativa e dentro do tempo limite, o script continua sua execução normalmente
    } else {
        // Se o usuário não está logado (não há 'id' na sessão), redireciona para a página de logout
        header('Location: logout.php');
        exit(); // **Crucial**: Termina a execução do script
    }
}

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
                    <input type="hidden" name="usuario_id" value="<?= $_SESSION['id'] ?>" required>
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