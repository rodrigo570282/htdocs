CREATE DATABASE webapp;
USE webapp;

CREATE TABLE imagens (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    nome_original VARCHAR(255) NOT NULL,
    data_envio DATETIME DEFAULT CURRENT_TIMESTAMP,
    caminho VARCHAR(255) NOT NULL
);

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    imagem_perfil_id INT,

    CONSTRAINT FK_USUARIO_IMAGEM_PERFIL FOREIGN KEY (imagem_perfil_id) REFERENCES imagens (id)
);

CREATE TABLE galeria (
    imagem_id INT NOT NULL,
    usuario_id INT NOT NULL,

    CONSTRAINT FK_GALERIA_IMAGEM FOREIGN KEY (imagem_id) REFERENCES imagens (id),
    CONSTRAINT FK_GALERIA_USUARIO FOREIGN KEY (usuario_id) REFERENCES usuarios (id),

    -- chave primaria composta 
    CONSTRAINT PK_GALERIA_ID PRIMARY KEY (imagem_id, usuario_id)
);

ALTER TABLE usuarios ADD COLUMN senha VARCHAR(255) NOT NULL;