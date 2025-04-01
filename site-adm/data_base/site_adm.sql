create database if not exists site_adm;


use site_adm;

create table usuarios (
id INT auto_increment primary key,
NOME VARCHAR (100) not null,
EMAIL VARCHAR (100) not null unique
);

create table categorias (
id INT auto_increment primary key,
nome VARCHAR(100) not null unique
);

create table artigos (
id INT primary key auto_increment,
titulo VARCHAR(100) not null,
conteudo TEXT not null,
categoria_id Int,
foreign key (categoria_id) references categorias(id)
);

select *from categorias;
select *from usuarios;
select *from artigos;
