CREATE DATABASE Biblioteca;
USE Biblioteca;

CREATE TABLE livros (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    genero VARCHAR(100)
);

CREATE TABLE usuario (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    login VARCHAR(90) NOT NULL UNIQUE,
    senha VARCHAR(90) NOT NULL
);

SELECT * FROM usuario;
SELECT * FROM livros;
