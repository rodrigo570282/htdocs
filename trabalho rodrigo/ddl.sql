-- ddl - Data Definition Language
create database if not  exists aula_db;

use aula_db;
-- aqui da maneira do professor thiago
create table marcas (
	id int  auto_increment primary key,
	nome varchar(50) not null	
);


-- placa, marca, modelo , ano
CREATE TABLE carros (      
    placa varchar(7) not null unique primary key,
    modelo varchar(50),
    ano int,
    marca_id int not null, 
    foreign key(marca_id) references marcas (id)
);

-- id, nome , cpf, data nascimento
create table pessoas(
	id int primary key auto_increment,
	nome varchar (255) not null,
	cpf varchar(11) not null unique,
	data_nascimento date not null
);


create table carros_pessoas(
	placa varchar(7) not null,
	pessoa_id int not null,
	
	primary key (placa,pessoa_id),
	foreign key (placa) references carros (placa),
	foreign key (pessoa_id) references pessoas(id)
	

);
-- ----------------------------------------------