CREATE TABLE usuario (
 id SERIAL CONSTRAINT pk_id_livro PRIMARY KEY,
 token varchar(100) unique,
 nome varchar(100) NOT NULL,
 cpf CHAR(14) UNIQUE NOT NULL,
 data_nasc date NOT NULL,
 usuario char(50) unique not null,
 senha varchar(100) not null,
 tipouser char(1) not null,
 status   char(1) not null	
);

INSERT INTO usuario(token, nome, cpf, data_nasc, usuario, senha, tipouser, status) 
values(UPPER(md5('ALEX SANDRO LIMA SOBRINHO','054.976.292-28')),'ALEX SANDRO LIMA SOBRINHO','054.976.292-28', now(),'alex.lima', md5('alex129as'), 'A', 'A');
