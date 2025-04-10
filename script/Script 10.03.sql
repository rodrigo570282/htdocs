create database if not exists aula_db ;

use aula_db;

drop table carros;
drop table marcas;

--placa, marca, modelo, ano
-- umm carro possui uma marca
create table carros (
placa varchar (7) not null unique primary key, 

modelo varchar (50),
ano int,

marca_id int not null,

foreign key (marca_id) references marcas (id)+
);

create table pessoas (
id int primary key auto_increment,
nome varchar (255) not null,
cpf varchar (11) not null unique,
data_nascimento date null
);
select * from carros;
select * from pessoas;
select * from motorista;
select * from carros;


insert into pessoas (nome,cpf,data_nascimento) values
('João Silva', '12345678901', '1990-05-15'),
('Maria Oliveira', '98765432100', '1985-09-20'),
('Carlos Souza', '11223344556', '2000-01-30'),
('Ana Costa', '99887766544', '1992-07-10'),
('Felipe Pereira', '55667788999', '1988-11-05');

--relacionamentos
--um para um 1-1
--um (marca) para muitos (Carros) 1-n
--muitos (carros) para muitos (pessoas) n-n

create table carros_pessoas (
placa varchar(7) not null,
pessoa_id int not null

primary key (placa, pessoa_id)
foreign key (placa) carros(placa)
foreign key (pessoa_id) references pessoas(id)
);


insert into marcas (nome) values

('GM'),
('VW'),
('NISSAN'),
('AUDI'),
('HONDA');

insert into carros(placa, marca_id, modelo, ano) values
('ABC1234', 1, 'Fusca', 1972),
('XYZ5678', 2, 'Civic', 2020),
('LMN9101', 3, 'Gol', 2015),
('PQR3456', 1, 'Onix', 2022),
('JKL7890', 4, 'Fiesta', 2018);

drop table carros;
insert into carros (placa , marca, modelo, ano)
values ('MZP8187', 'CHEVROLET', 'CELTA' 1999);
insert into carros (placa , marca, modelo, ano)
values ('JON6690', 'CHEVROLET', 'CELTA' 1999);


create table marcas ( 
id int not null auto_increment primary key,
nome varchar (50) not null
);
insert into marcas (nome) values ('Chevrolet');
insert into marcas (nome) values ('Toyota');
select * from marcas;

-- 1 - fazer os comandos para inserir, atualizar, excluir e visualizar registros de todas as tabelas;
-- 2 - criar tabela para representar uma pessoa; 
-- 3 - representar a relação de motorista e carro conduzido.


-- 1 Selecione todos os registros da tabela marcas;
-- 2 Liste Todas as placas e anos dos carros cadastrados;
-- 3 Mostre o nome e a data de nascimento de todas as pessoas;
-- 4 Liste todos os carros do ano 2020 ou mais recentes;
-- 5 Encontre todas as pessoas nascidas antes do ano 2000.
-- 6 Selecione os carros de uma marca específica (exemplo: "Toyota").
-- 7 Exiba todas as pessoas cujo nome comece com a letra "A".


-- 8 Liste todas as placas dos carros e o nome da respectiva marca;
-- 9 Mostre o nome das pessoas e os carros que elas possuem;
-- 10 mostre o nome das pessoas que possuem carros de determinada marca (exemplo: "Ford");
-- 11 conte quantas marcas de carros estão cadastradas;
-- 12 descubra quantos carros existem no banco de dados;
-- 13 calcule a idade média das pessoas cadastradas;
-- 14 encontre o ano do carro mais antigo e do mais novo;
-- 15 conte quantas pessoas possuem pelo menos um carro;
-- 16 liste todas as pessoas que possuem carros cadastrados;
-- 17 encontre as marcas de carros que não possuem nenhum veículo registrado.