<?php

// Garanta que o caminho para UsuariosModel.php esteja correto em relação a este arquivo
// Ex: se LoginHandler.php está em app/service/ e UsuariosModel.php em app/model/
require_once __DIR__ . '/../model/UsuariosModel.php';

class LoginHandler {

    /**
     * Processa uma tentativa de login, incluindo a lógica de bloqueio por falhas.
     *
     * @param string $email O email fornecido pelo usuário.
     * @param string $senha A senha fornecida pelo usuário.
     * @return array Um array associativo contendo o status de sucesso, mensagem e, opcionalmente, o caminho de redirecionamento.
     */
    public static function handleLoginAttempt(string $email, string $senha): array {
        // Inicializa variáveis de sessão para tentativas de login se elas não existirem
        // Certifique-se de que session_start() foi chamado no script principal antes de usar esta função.
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 0;
        }
        if (!isset($_SESSION['blocked_until'])) {
            $_SESSION['blocked_until'] = 0; // Inicializa com 0, indicando não bloqueado
        }

        $response = ['success' => false, 'message' => ''];

        // 1. Verifica se o usuário está atualmente bloqueado
        if ($_SESSION['blocked_until'] > time()) {
            $remainingTime = $_SESSION['blocked_until'] - time();
            $response['message'] = "Muitas tentativas de login. Tente novamente em " . $remainingTime . " segundos.";
            return $response; // Retorna imediatamente se bloqueado
        }

        // 2. Validação básica dos campos de entrada
        if (empty($email) || empty($senha)) {
            $response['message'] = "Por favor, preencha todos os campos.";
            return $response;
        }

        // 3. Tenta validar as credenciais com o modelo de usuários
        $usuariosModel = new UsuariosModel();
        $usuarioValido = $usuariosModel->validarLogin($email, $senha);

        if ($usuarioValido) {
            // 4. Login Bem-sucedido: Reseta tentativas e tempo de bloqueio
            $_SESSION['login_attempts'] = 0;
            $_SESSION['blocked_until'] = 0;

            // Define variáveis de sessão para o usuário logado
            $_SESSION['id'] = $usuarioValido['id'];
            $_SESSION['nome'] = $usuarioValido['nome'];
            $_SESSION['email'] = $usuarioValido['email'];
            $_SESSION['imagem_perfil_caminho'] = $usuarioValido['imagem_perfil_caminho'];
            $_SESSION['hora_login'] = time();

            $response['success'] = true;
            $response['message'] = 'Login bem-sucedido!';
            $response['redirect'] = 'index.php'; // Indica que um redirecionamento é necessário
            return $response;
        } else {
            // 5. Login Falho: Incrementa tentativas e aplica bloqueio se necessário
            $_SESSION['login_attempts']++;
            $response['message'] = "Usuário ou senha inválidos."; // Mensagem genérica

            // Verifica se o número máximo de tentativas (3) foi atingido
            if ($_SESSION['login_attempts'] >= 3) {
                $_SESSION['blocked_until'] = time() + 120; // Bloqueia por 2 minutos (120 segundos)
                $_SESSION['login_attempts'] = 0; // Reseta as tentativas após iniciar o bloqueio
                $response['message'] = "Muitas tentativas de login. Tente novamente mais tarde."; // Mensagem genérica de bloqueio
            }
            return $response;
        }
    }
}