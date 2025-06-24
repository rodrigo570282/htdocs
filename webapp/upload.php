<?php


echo '<pre>';
print_r($_FILES['foto']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['foto'])) {
        $imagem = $_FILES['foto'];

        // tratamento para tipo de arquivos apenas imagens
        $mimeTypesPermitidas = ['image/jpeg', 'image/png'];
        $extensoesPermitidas = ['jpg', 'jpeg', 'png'];

        // se o mime da imagem não estiver na lista: erro
        if (!in_array($imagem['type'], $mimeTypesPermitidas)) {
            die('Tipo de arquivo iválido!');
        }

        // parse da extensão do arquivo e verifica se é valido
        $extensaoImagem = strtolower(pathinfo(
            $imagem['name'], 
            PATHINFO_EXTENSION
        ));
        if (!in_array($extensaoImagem, $extensoesPermitidas)) {
            die('Extensão de arquivo iválida!');
        }

        // Tratamento para o tamanho do arquivo
        $tamanhoMaximoEmBytes = 16 * 1024 * 1024; // 16MB
        if ($imagem['size'] > $tamanhoMaximoEmBytes) {
            die('Tamanho da imagem inválido!');
        }

        $diretorioDestino = './uploads/';

        // Tratamento caso o diretório uploads não exista
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino);
        }

        // tratamento para manter o nome único
        $nomeUnico = uniqid() . '_' . $imagem['name'];
        $caminhoImagem = $diretorioDestino . $nomeUnico;

        $salvou = move_uploaded_file(
            $imagem['tmp_name'],
            $caminhoImagem
        );
    }
}

if (isset($_FILES['foto'])) {
    $uploadDir = "uploads/";
    $uploadFile = $uploadDir . basename($_FILES['foto']['name']);

    // Verifica se o diretório existe, senão cria
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Move o arquivo para a pasta de uploads
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
        // Redireciona para a galeria após o upload
        header("Location: galeria.php");
        exit();
    } else {
        echo "Erro ao enviar o arquivo.";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["foto"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);

    // Verifica se o upload ocorreu corretamente
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        header("Location: galeria.php"); // Redireciona para a galeria
        exit();
    } else {
        echo "Erro ao enviar o arquivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <?php if ($salvou): ?>
        <p>
            Imagem salva com sucesso em <?= $caminhoImagem ?>.
            <a href="index.php">Voltar</a>
        </p>
    <?php endif ?>
</body>
</html>