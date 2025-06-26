<?php
// Inicializa variável para mensagens
$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
    $imagem = $_FILES['foto'];

    // Definições de segurança
    $mimeTypesPermitidas = ['image/jpeg', 'image/png'];
    $extensoesPermitidas = ['jpg', 'jpeg', 'png'];
    $tamanhoMaximo = 16 * 1024 * 1024; // 16MB

    // Extração da extensão
    $extensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));

    // Validações
    if (!in_array($imagem['type'], $mimeTypesPermitidas)) {
        $mensagem = "Tipo de arquivo inválido.";
    } elseif (!in_array($extensao, $extensoesPermitidas)) {
        $mensagem = "Extensão de arquivo inválida.";
    } elseif ($imagem['size'] > $tamanhoMaximo) {
        $mensagem = "Arquivo excede o tamanho permitido.";
    } else {
        // Diretório de destino
        $diretorio = 'uploads/';
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0777, true);
        }

        // Gera nome único
        $nomeUnico = uniqid() . '.' . $extensao;
        $caminhoFinal = $diretorio . $nomeUnico;

        // Tenta mover o arquivo
        if (move_uploaded_file($imagem['tmp_name'], $caminhoFinal)) {
            header("Location: galeria.php");
            exit();
        } else {
            $mensagem = "Erro ao salvar o arquivo.";
        }
    }
}
?>
