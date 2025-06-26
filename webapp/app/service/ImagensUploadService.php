<?php
require_once __DIR__ . '/../model/ImagensModel.php';

class ImagensUploadService
{

    /**
     * Summary of upload
     * @param mixed $imagem
     * 
     * @return array|null
     *      [ 'id', 'nome', 'nome_original', 'data_envio', 'caminho' ]
     */
    public static function upload($imagem)
    {
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

        // to-do arrumar
        $diretorioDestino = './uploads/';
        $caminhoParaSalvar = __DIR__ . '/../../' . $diretorioDestino;

        // Tratamento caso o diretório uploads não exista
        if (!is_dir($caminhoParaSalvar)) {
            mkdir($caminhoParaSalvar);
        }

        // tratamento para manter o nome único
        $nomeUnico = uniqid() . '_' . $imagem['name'];
        $caminhoImagemBanco = $diretorioDestino . $nomeUnico;

        // salva imagem no disco
        $salvou = move_uploaded_file(
            $imagem['tmp_name'],
            $caminhoParaSalvar . $nomeUnico
        );

        if ($salvou) {
            // salva os metadados da imagem no banco de dados
            $imagensModel = new ImagensModel();
            return $imagensModel->salvar([
                'nome' => $nomeUnico,
                'nome_original' => $imagem['name'],
                'caminho' => $caminhoImagemBanco
            ]);
        }
    }
}
