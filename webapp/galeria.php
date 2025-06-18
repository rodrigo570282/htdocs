<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Imagens</title>
    <style>
        /* Estilos gerais da página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        /* Estilização do contêiner da galeria */
        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        /* Estilização das imagens */
        .gallery-item {
            width: 200px;
            height: 200px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h2>Galeria de Imagens</h2>
    <div class="gallery-container">
        <?php
            // Diretório onde as imagens são armazenadas
            $diretorio = "uploads/";

            // Verifica se o diretório existe
            if (is_dir($diretorio)) {
                $arquivos = scandir($diretorio); // Obtém a lista de arquivos
                foreach ($arquivos as $arquivo) {
                    // Exclui diretórios padrão ('.' e '..') e verifica se é uma imagem válida
                    if ($arquivo != "." && $arquivo != ".." && preg_match("/\.(jpg|jpeg|png|gif)$/i", $arquivo)) {
                        echo "<div class='gallery-item'><img src='$diretorio$arquivo' alt='Imagem'></div>";
                    }
                }
            } else {
                echo "<p>Nenhuma imagem encontrada.</p>";
            }
        ?>
    </div>
</body>
</html>
