<?php

require_once __DIR__ . '/BaseModel.php';

class ImagensModel extends BaseModel
{

    public function __construct()
    {
        $this->tabela = 'imagens';
        parent::__construct();
    }

    /**
     * Summary of salvar
     * @param array $imagem
     *      [ 'nome', 'nome_original', 'caminho' ]
     * 
     * @return array|null
     *      [ 'id', 'nome', 'nome_original', 'data_envio', 'caminho' ]
     */
    public function salvar($imagem)
    {
        $query = "INSERT INTO $this->tabela (nome, nome_original, caminho)
            VALUES (:nome, :nome_original, :caminho)";

        $stmt = $this->pdo->prepare($query);

        $salvou = $stmt->execute([
            ':nome' => $imagem['nome'],
            ':nome_original' => $imagem['nome_original'],
            ':caminho' => $imagem['caminho']
        ]);

        if ($salvou) {
            $query = "select * from $this->tabela order by id desc limit 1";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetch();
        }
    }

    /**
     * Summary of buscarTodas
     * @return array
     *      [ 'id', 'nome', 'nome_original', 'data_envio', 'caminho' ]
     */
    public function buscarTodas(): array
    {
        $query = "SELECT * FROM $this->tabela";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
