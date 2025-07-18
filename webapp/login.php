<?php
// inicia a sessão
session_start();

// Se está logado
if (isset($_SESSION['id'])) {
    // Se a ultima interação extrapolou o limite de tempo
    $horaAtual = time();
    $horaLogin = $_SESSION['hora_login'];
    // 1800 segundos -> 30 minutos
    $tempoLimiteSessao = 1800;
    if (($horaAtual - $horaLogin) > $tempoLimiteSessao) {
        // desloga o usuario
        return header('Location: logout.php');
    }
}

require_once __DIR__ . '/app/model/UsuariosModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_POST['email']) && !empty($_POST['senha'])) {
        
        $usuariosModel = new UsuariosModel();
        $usuarioValido = $usuariosModel->validarLogin($_POST['email'], $_POST['senha']);  

        if ($usuarioValido) {
            $_SESSION['id'] = $usuarioValido['id'];
            $_SESSION['nome'] = $usuarioValido['nome'];
            $_SESSION['email'] = $usuarioValido['email'];
            $_SESSION['imagem_perfil_caminho'] = $usuarioValido['imagem_perfil_caminho'];
            $_SESSION['hora_login'] = time();

            return header('Location: index.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        <?php require_once __DIR__ . '/app/view/assets/style.css'; ?>
    </style>
</head>

<body>
    <section>
        <div class="flex">
            <a href="index.php">
                Voltar
            </a>
        </div>
        <div class="flex end">
            <a href="usuarioCadastrar.php">
                Cadastrar usuário
            </a>
        </div>
        <form action="login.php" method="POST">
            <div>
                <label for="email">E-mail</label>
                <input type="text" name="email" required>
            </div>
            <div>
                <label for="senha">Senha</label>
                <input type="password" name="senha">
            </div>
            <button type="submit">Enviar</button>
        </form>
    </section>
</body>

</html>