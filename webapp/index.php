<?php

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo</title>
    <style>
        /* Estilos gerais da página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Contêiner principal */
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Estilização do botão de upload */
        input[type="file"] {
            display: none;
        }

        label {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            margin-top: 10px;
        }

        label:hover {
            background-color: #0056b3;
        }

        /* Estilos para os botões */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn {
            background-color: #28a745;
            color: white;
        }

        .submit-btn:hover {
            background-color: #218838;
        }

        .cancel-btn {
            background-color: #dc3545;
            color: white;
        }

        .cancel-btn:hover {
            background-color: #c82333;
        }

        /* Estilização da prévia da imagem */
        #preview {
            display: none;
            margin-top: 15px;
            max-width: 100%;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enviar Arquivo</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data" onsubmit="redirectToGallery()">
            <!-- Input oculto para upload -->
            <input type="file" name="foto" id="foto" accept="image/*" onchange="previewImage()">
            <label for="foto">Escolher Arquivo</label>

            <!-- Prévia da imagem -->
            <img id="preview" alt="Prévia da imagem selecionada">

            <!-- Contêiner de botões -->
            <div class="button-container">
                <button type="submit" class="submit-btn">Enviar</button>
                <button type="button" class="cancel-btn" onclick="cancelUpload()">Cancelar</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage() {
            var input = document.getElementById("foto");
            var preview = document.getElementById("preview");
            var file = input.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };

                reader.readAsDataURL(file);
            }
        }

        function cancelUpload() {
            var input = document.getElementById("foto");
            var preview = document.getElementById("preview");

            input.value = ""; // Limpa a seleção de arquivo
            preview.src = "";
            preview.style.display = "none"; // Esconde a prévia da imagem
        }

        function redirectToGallery() {
            setTimeout(function () {
                window.location.href = "galeria.php";
            }, 1000); // Aguarda 1 segundo antes de redirecionar
        }
    </script>
</body>
</html>
