CREATE DATABASE login
DEFAULT character SET utf8
DEFAULT COLLATE uf8_general_ci;

USE LOGIN;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    senha VARCHAR(100),
    email VARCHAR(100),
    cpf VARCHAR(11)
);

INSERT INTO usuarios (nome, senha, email, cpf) 
VALUES ('José dos Santos', 'josesantos', 'josesantos@gmail.com', '12345678912');
