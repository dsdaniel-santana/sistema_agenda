--Criando o banco de dados
CREATE DATABASE IF NOT EXISTS senac_reservaSalas;

--informando que trabalhar no banco de dados banco de dados
USE senac_reservaSalas;


--criando a tabela sub_area
CREATE TABLE IF NOT EXISTS sub_area(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome_sub_area VARCHAR(150) NOT NULL,
	cor VARCHAR(50) NOT NULL
);

--criando a tabela sala
CREATE TABLE IF NOT EXISTS docente(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome_docente VARCHAR(50) NOT NULL
	email VARCHAR(50) NOT NULL
);

--criando a tabela sala
CREATE TABLE IF NOT EXISTS informacoes_curso (
	id_curso INT AUTO_INCREMENT PRIMARY KEY,
    nome_curso VARCHAR(150) NOT NULL, 
    sigla_curso VARCHAR(15) NOT NULL, 
    codigo_turma VARCHAR(50) NOT NULL, 
    oferta VARCHAR(50) NOT NULL, 
    periodo VARCHAR(20) NOT NULL,
    cor VARCHAR(20) NOT NULL,
    sub_area_id INT,
    docente_id INT,
    CONSTRAINT fk_sub_area FOREIGN KEY (sub_area_id) REFERENCES sub_area(id),
    CONSTRAINT fk_docente FOREIGN KEY (docente_id) REFERENCES docente(id)
);

--criando a tabela sala
CREATE TABLE IF NOT EXISTS sala(
id_sala INT AUTO_INCREMENT PRIMARY KEY,
sala_lab VARCHAR(50) NOT NULL, 
capacidade VARCHAR(20) NOT NULL
);

--criando a tabela reserva
CREATE TABLE IF NOT EXISTS reserva(
data_incial DATETIME DEFAULT CURRENT_TIMESTAMP,
data_final DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
hora_inicio TIME NOT NULL,
hora_finaliza TIME NOT NULL,
curso_id INT,
sala_id INT,
CONSTRAINT fk_informacoes_curso FOREIGN KEY (curso_id) REFERENCES Informacoes_curso(id_curso),
CONSTRAINT fk_sala FOREIGN KEY (sala_id) REFERENCES sala(id_sala)
);

