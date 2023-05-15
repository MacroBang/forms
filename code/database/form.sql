CREATE DATABASE projetoecommerce;
use projetoecommerce;

CREATE TABLE cliente (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    numero_contato VARCHAR(11) NOT NULL,
    senha VARCHAR(255),

    CONSTRAINT pk_cliente PRIMARY KEY (id, cpf)

);

CREATE TABLE cidade (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    UF CHAR(2)
);

CREATE TABLE endereco (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cep VARCHAR(9),
    rua VARCHAR(255) NOT NULL,
    numero INT NOT NULL,
    complemento VARCHAR(255),
    id_cidade INT,
    
    FOREIGN KEY (id_cidade) REFERENCES cidade (id)
);

CREATE TABLE cliente_endereco (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    id_endereco INT,

    FOREIGN KEY (id_endereco) REFERENCES endereco (id),
    FOREIGN KEY (id_cliente) REFERENCES cliente (id)
   
);