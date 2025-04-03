<?php

require_once __DIR__ . "/../config/Database.php";

class UsuarioModel
{
    private $tabela = "usuario";
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar()
    {
        $query = "SELECT * FROM $this->tabela;";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function buscarPorId($id)
    {
        // Correção: Usar prepared statements para evitar injeção de SQL
        $query = "SELECT * FROM $this->tabela WHERE id = :id;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT); // Adicionado PDO::PARAM_INT para segurança
        $stmt->execute();
        return $stmt->fetch();
    }

    public function criar($nome, $email, $telefone, $data_nascimento, $cpf)
    {
        $query = "INSERT INTO $this->tabela (nome, email, telefone, data_nascimento, cpf) 
                  VALUES (:nome, :email, :telefone, :data_nascimento, :cpf);";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function editar($usuario)
    {
        $query = "UPDATE $this->tabela SET nome = :nome, email = :email, telefone = :telefone, data_nascimento = :data_nascimento, cpf = :cpf 
                  WHERE id = :id;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $usuario["id"], PDO::PARAM_INT); // Adicionado PDO::PARAM_INT para segurança
        $stmt->bindParam(":nome", $usuario["nome"]);
        $stmt->bindParam(":email", $usuario["email"]);
        $stmt->bindParam(":telefone", $usuario["telefone"]);
        $stmt->bindParam(":data_nascimento", $usuario["data_nascimento"]);
        $stmt->bindParam(":cpf", $usuario["cpf"]);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function excluir($id)
    {
        $query = "DELETE FROM $this->tabela WHERE id = :id;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT); // Adicionado PDO::PARAM_INT para segurança
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
?>