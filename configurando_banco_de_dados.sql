CREATE DATABASE curso_sql1;

USE curso_sql1;

CREATE TABLE cargo_funcionarios
(
    id int not null AUTO_INCREMENT,
    nome_cargo varchar(255),
    permissoes varchar(255),
    PRIMARY KEY(id)
);

USE curso_sql1;

INSERT INTO cargo_funcionarios SET nome_cargo='Operador', permissoes='ADD';
INSERT INTO cargo_funcionarios SET nome_cargo='Gerente', permissoes='ADD,EDIT,GRAFICOS';
INSERT INTO cargo_funcionarios SET nome_cargo='Administrador', permissoes='ADD,EDIT,DEL,GRAFICOS,USUARIOS';


use curso_sql1;

CREATE TABLE categorias
(
    id int not null AUTO_INCREMENT,
    nome_categorias varchar(255),
   	PRIMARY KEY(id)
);

use curso_sql1;

INSERT INTO categorias SET nome_categorias='tecnologia';
INSERT INTO categorias SET nome_categorias='eletrodomesticos';
INSERT INTO categorias SET nome_categorias='esporte';
INSERT INTO categorias SET nome_categorias='relogios';
INSERT INTO categorias SET nome_categorias='ferramentas';


use curso_sql1;

CREATE TABLE funcionarios
(
    id int not null AUTO_INCREMENT,
    nome varchar(255),
    senha varchar(255),
    cargo int(255),
    PRIMARY KEY(id)
);

use curso_sql1;

INSERT INTO funcionarios SET nome='jose123', senha=md5('123'), cargo='3';


use curso_sql1;

CREATE TABLE itensvenda
(
    id int not null AUTO_INCREMENT,
    id_vendas int(255),
    id_produto int(255),
    quantidade int(255),
    data_compra datetime,
    id_usuarios int(255),
    PRIMARY KEY(id)
);


use curso_sql1;

CREATE TABLE produtos
(
    id int not null AUTO_INCREMENT,
    id_categoria int(255),
    nome_produtos varchar(255),
    preco double,
    imagem_produtos varchar(255),
    PRIMARY KEY(id)
);


use curso_sql1;

INSERT INTO PRODUTOS set id_categoria='1', nome_produtos='Celular LG', preco='500';
INSERT INTO PRODUTOS set id_categoria='1', nome_produtos='Smartphone SAMSUNG', preco='600';
INSERT INTO PRODUTOS set id_categoria='1', nome_produtos='Impressora HP', preco='400';
INSERT INTO PRODUTOS set id_categoria='1', nome_produtos='Notbook DELL', preco='1600';
INSERT INTO PRODUTOS set id_categoria='2', nome_produtos='Geladeira Eletrolux', preco='1000';
INSERT INTO PRODUTOS set id_categoria='2', nome_produtos='Freezer Continental', preco='800';
INSERT INTO PRODUTOS set id_categoria='3', nome_produtos='Tenis Adidas', preco='200';
INSERT INTO PRODUTOS set id_categoria='3', nome_produtos='Bola Futsal Penalty', preco='60';
INSERT INTO PRODUTOS set id_categoria='4', nome_produtos='Relogio Rolex', preco='2000';
INSERT INTO PRODUTOS set id_categoria='4', nome_produtos='Relogio Hulbolt', preco='2500';
INSERT INTO PRODUTOS set id_categoria='5', nome_produtos='Estojo Kit Ferramentas', preco='200';
INSERT INTO PRODUTOS set id_categoria='5', nome_produtos='Parafusadeira Mondial', preco='300';
INSERT INTO PRODUTOS set id_categoria='1', nome_produtos='Notbook i7', preco='2500';
INSERT INTO PRODUTOS set id_categoria='1', nome_produtos='Celular Blackbarry', preco='4000';



use curso_sql1;

CREATE TABLE usuarios
(
    id int not null AUTO_INCREMENT,
    nome_usuarios varchar(255),
    email_usuarios varchar(255),
    cpf_usuarios int(255),
    telefone_usuarios varchar(255),
    estado_usuarios varchar(255),
    cidade_usuarios varchar(255),
    bairro_usuarios varchar(255),
    rua_usuarios varchar(255),
    numero_endereco_usuarios int(255),
    senha varchar(255),
    PRIMARY KEY(id)
);



use curso_sql1;

CREATE TABLE vendas
(
    id int not null AUTO_INCREMENT,
    valor_vendas double,
    id_usuarios int(255),
    PRIMARY KEY(id)
);

