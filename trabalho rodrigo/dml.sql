-- Data Manipulation Language

-- Adicionando marcas
INSERT INTO marcas (nome) VALUES 
('Toyota'),
('Ford'),
('BMW'),
('Mercedes-Benz'),
('Chevrolet'),
('Hyundai'),
('Kia'),
('Fiat'),
('Peugeot'),
('Jeep'),
('Volkswagen'),
('Renault'),
('Honda'),
('Nissan'),
('Volvo'),
('Audi'),
('Citroën'),
('Chery'),
('Mitsubishi'),
('Land Rover');


-- Adicionando carros
INSERT INTO carros (placa, marca_id, modelo, ano) VALUES
('7894ABC', 1, 'Corolla', 2020),          -- Toyota
('5678DEF', 2, 'Fusion', 2018),           -- Ford
('9101GHI', 3, 'X5', 2021),               -- BMW
('1122JKL', 4, 'A4', 2022),               -- Mercedes-Benz
('3344MNO', 5, 'Onix', 2023),             -- Chevrolet
('5566PQR', 6, 'Tucson', 2020),           -- Hyundai
('7788STU', 7, 'Sportage', 2021),         -- Kia
('9900VWX', 8, 'Argo', 2020),             -- Fiat
('2233YZA', 9, '308', 2019),              -- Peugeot
('4455BCD', 10, 'Renegade', 2022),        -- Jeep
('1234XYZ', 11, 'Gol', 2019),             -- Volkswagen
('2345QWE', 11, 'Polo', 2021),            -- Volkswagen
('3456RTY', 12, 'Kwid', 2020),            -- Renault
('4567UIO', 12, 'Sandero', 2022),         -- Renault
('5678PAS', 13, 'Civic', 2021),           -- Honda
('6789DFG', 13, 'HR-V', 2022),            -- Honda
('7890HJK', 14, 'Kicks', 2021),           -- Nissan
('8901LZX', 14, 'Versa', 2020),           -- Nissan
('9012CVB', 15, 'XC40', 2023),            -- Volvo
('0123NMQ', 16, 'A3', 2022),              -- Audi
('1122QAZ', 17, 'C4 Cactus', 2021),       -- Citroën
('2234WSX', 18, 'Tiggo 5X', 2022),        -- Chery
('3345EDC', 19, 'ASX', 2020),             -- Mitsubishi
('4456RFV', 20, 'Discovery Sport', 2023); -- Land Rover

-- Adicionando pessoas
INSERT INTO pessoas (nome, cpf, data_nascimento) VALUES
('Abraham', '12345678901', '1999-01-01'),
('Isaac', '23456789012', '1998-02-02'),
('Jacob', '34567890123', '1997-03-03'),
('Moises', '45678901234', '1996-04-04'),
('David', '56789012345', '1995-05-05'),
('Solomon', '67890123456', '1994-06-06'),
('Samuel', '78901234567', '1993-07-07'),
('Elijah', '89012345678', '1992-08-08'),
('Peter', '90123456789', '2001-09-09'),
('Mary', '01234567890', '2002-10-10'),
('José', '11122233344', '1985-05-15'),       -- José, filho de Jacó
('Rute', '22233344455', '1990-08-25'),       -- Rute, personagem do livro de Rute
('Davi', '33344455566', '1988-03-10'),       -- Davi, rei de Israel
('Ester', '44455566677', '1995-11-30'),      -- Ester, rainha da Pérsia
('Salomão', '55566677788', '1980-07-20'),    -- Salomão, filho de Davi
('Raquel', '66677788899', '1992-09-12'),     -- Raquel, esposa de Jacó
('Jonas', '77788899900', '1987-04-05'),      -- Jonas, profeta
('Lídia', '88899900011', '1998-12-18'),      -- Lídia, vendedora de púrpura
('Timóteo', '99900011122', '2000-02-22'),    -- Timóteo, discípulo de Paulo
('Débora', '00011122233', '1993-06-14');     -- Débora, juíza de Israel

-- Relacionando pessoas aos carros
INSERT INTO carros_pessoas (placa, pessoa_id) VALUES
('7894ABC', 1),  -- Abraham tem um Corolla
('5678DEF', 2),  -- Isaac tem um Fusion
('9101GHI', 3),  -- Jacob tem um X5
('1122JKL', 4),  -- Moises tem um A4
('3344MNO', 5),  -- David tem um Onix
('5566PQR', 6),  -- Solomon tem um Tucson
('7788STU', 7),  -- Samuel tem um Sportage
('9900VWX', 8),  -- Elijah tem um Argo
('2233YZA', 9),  -- Peter tem um 308
('4455BCD', 10), -- Mary tem um Renegade
('1234XYZ', 11), -- José tem um Gol
('2345QWE', 12), -- Rute tem um Polo
('3456RTY', 13), -- Davi tem um Kwid
('4567UIO', 14), -- Ester tem um Sandero
('5678PAS', 15), -- Salomão tem um Civic
('6789DFG', 16), -- Raquel tem um HR-V
('7890HJK', 17), -- Jonas tem um Kicks
('8901LZX', 18), -- Lídia tem um Versa
('9012CVB', 19), -- Timóteo tem um XC40
('0123NMQ', 20); -- Débora tem um A3

-- 1-Selecione todos os registros da tabela marcas

select * from marcas;


-- 2-Liste Todas as placas e anos dos carros cadastrados;

select placa, ano from carros;


-- 3-Mostre o nome e a data de nascimento de todas as pessoas;

select nome, data_nascimento from pessoas;


-- 4-Liste todos os carros do ano 2020 ou mais recentes;

select * from carros where ano >= 2020;



-- 5-Encontre todas as pessoas nascidas antes do ano 2000.
-- uma solução
select * from pessoas where data_nascimento < '2000-01-01';
-- outra solução
select * from pessoas where year(data_nascimento) < '2000';

-- 6-Selecione os carros de uma marca específica (exemplo: "Toyota").
-- solucao professor
select *from marcas where nome = 'Toyota';


select c.placa, c.modelo, c.ano, m.nome as marca
from carros c
join marcas m on c.marca_id = m.id 
where m.nome = 'BMW';

-- 7-Exiba todas as pessoas cujo nome comece com a letra "A".

select *from pessoas where nome like 'a%';

-- 8-Liste todas as placas dos carros e o nome da respectiva marca.

select c.placa, m.nome as marca
from carros c
join marcas m on c.marca_id = m.id;
 

-- 9-Mostre o nome das pessoas e os carros que elas possuem.

-- pessoa nome carros modelo
select p.nome as pessoa, c.modelo
from pessoas p
join carros_pessoas cp on p.id = cp.pessoa_id
join carros c on cp.placa = c.placa;

-- 10- Exiba o nome das pessaos que possuem carros de determinada marca (exemplo:"Ford").
select p.nome AS pessoa, m.nome AS marca
from pessoas p
join carros_pessoas cp on p.id = cp.pessoa_id
join carros c on cp.placa = c.placa
join marcas m on c.marca_id = m.id
where m.nome = 'Fiat';

-- 11-Conte quantas marcas de carros esão cadastradas.
-- aqui vai aparecer so a quantidade 1-solucao 
select count(*) as total_marcas from marcas;


-- aqui vai listar em sequencia 2-solucao
select nome from marcas;


-- 12-Descubra quantos carros existem no banco de dados.
select count(*) as total_carros from carros;

-- 13-Calcule a idade média das pessoas cadastradas.
select avg(year(curdate()) - year(data_nascimento)) as idade_media
from pessoas;

-- 14-Encontre o ano do carro mais antigo e do mais novo.
select min(ano) as ano_mais_antigo, max(ano) as ano_mais_novo
from carros;

-- 15-Conte quantas pessoas possuem pelo menos um carro.

select count(distinct pessoa_id) as total_pessoas_com_carro
from carros_pessoas;


-- 16-Liste todas as pessoas que possuem carros cadastrados.
-- solucao que usei o distinct para nao repetir pessoas que tem mais de um carro no nome 
select	distinct p.nome as pessoa
from pessoas p
join carros_pessoas cp on p.id = cp.pessoa_id;
-- solucao que lista varias vezes a  mesma pessoa
select p.nome 
from pessoas p
join carros_pessoas cp ON p.id = cp.pessoa_id;

-- 17-Encontre as marcas de carros que não possuem nenhum veículo registrado. 
select m.nome as marca
from marcas m
left join carros c on m.id = c.marca_id
where c.placa is null;

-- tem que sair Ferrari inseri OK funcionou


-- 18-Liste os 5 carros mais novos cadastrados.

select placa, modelo, ano, nome
from carros c
join marcas m ON c.marca_id = m.id
order by ano desc
limit 5;   -- funcionou lol

-- 19-Liste as pessoas pelo nome em ordem alfabética.

select nome  
from pessoas
order by nome;

-- 20-Liste as três marcas com mais carros cadastrados.

select m.nome, count(c.placa) AS total_carros
from marcas m
left join carros c on m.id = c.marca_id
group by m.id
order by total_carros desc
limit 3;


-- 21-Exclua uma marca que possui carros cadastrados. O que acontece? Explique.


delete from marcas  -- creio que nao seja permito devido chave estrangeira 
where id = <id_da_marca>;

-- 22-Exclua uma pessoa que possui carros associados. O que acontece? Explique.

delete from pessoas
where id = <id_da_pessoa>;  -- falha devido a achave e relacionemnto

-- 23-Atualize o nome de uma marca e verifique se isso afeta os carros associados.Explique.

update marcas
set nome = 'rodrigo'
where id = 2; 

-- voltei pra ford
update marcas
set nome = 'ford'
where id = 2; 





-- aparentemente nao terei grandes problemas pois como apenas alterei o nome nas demais tabelas vira com o novo nome da marca
