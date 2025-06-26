<?php

require_once __DIR__ . '/BaseModel.php';

class UsuariosModel extends BaseModel
{

    public function __construct()
    {
        $this->tabela = 'usuarios';
        parent::__construct();
    }

    /**
     * Summary of salvar
     * @param array $usuario
     *      [ 'nome', 'email', 'senha', 'imagem_perfil_id' ]
     * @return bool
     */
    public function salvar($usuario): bool
    {
        $query = "INSERT INTO $this->tabela (nome, email, imagem_perfil_id, senha)
            VALUES (:nome, :email, :imagem_perfil_id, :senha)";

        $stmt = $this->pdo->prepare($query);

        $hashDaSenha = password_hash($usuario['senha'], PASSWORD_BCRYPT);
        return $stmt->execute([
            ':nome' => $usuario['nome'],
            ':email' => $usuario['email'],
            ':imagem_perfil_id' => $usuario['imagem_perfil_id'],
            ':senha' => $hashDaSenha
        ]);
    }

    /**
     * Summary of buscarPorId
     * @return array
     *      [ 'id', 'nome', 'email', 'imagem_perfil_caminho' ] 
     */
    public function buscarPorId($id): array
    {
        $query = "
            select
            u.*,
            i.caminho as imagem_perfil_caminho
            from usuarios u
            left join imagens i on i.id = u.imagem_perfil_id
            WHERE u.id = :id
        ";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch();
    }

    /**
     * Summary of validarLogin
     * @param string $email
     * @param string $senha
     * 
     * @return array|bool
     *      [ 'id', 'nome', 'email', 'imagem_perfil_caminho' ]
     */
    public function validarLogin($email, $senha)
    {
        $query = "
            select
            u.*,
            i.caminho as imagem_perfil_caminho
            from usuarios u
            left join imagens i on i.id = u.imagem_perfil_id
            WHERE u.email = :email
        ";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':email' => $email
        ]);
        $usuario = $stmt->fetch();

        if (!$usuario) {
            return false;
        }

        $senhaValida = password_verify($senha, $usuario['senha']);
        if (!$senhaValida) {
            return false;
        }

        return $usuario;
    }
}
