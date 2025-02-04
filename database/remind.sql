-- SCRIP PARA CRIAÇÃO DA BASE DE DADOS
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-04:00";

CREATE DATABASE remind;

USE remind;

-- CLASSE USUARIOS
CREATE TABLE Usuarios (
    cpf varchar(30) NOT NULL,
    nome varchar(300) NOT NULL,
    senha varchar(300),
    email varchar(500) NOT NULL,
    telefone varchar(30),
    PRIMARY KEY (cpf)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- DEVS
CREATE TABLE Devs (
    id int(11) AUTO_INCREMENT NOT NULL,
    nick varchar(300) NOT NULL,
    apiKey varchar(5000) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CLASSE PACIENTE
CREATE TABLE Pacientes (
    cpf varchar(30) NOT NULL,
    endereco varchar(500),
    disponibilidade json NOT NULL,
    sexo varchar(20) NOT NULL,
    nascimento date NOT NULL,
    vinculoResidencial varchar(100) NOT NULL,
    fezTerapia tinyint(1) NOT NULL,
    localTerapia varchar(100),
    demanda longtext NOT NULL,
    gravidade varchar(100),
    estado varchar(100) NOT NULL,
    prioridade int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CLASSE TERAPEUTA
CREATE TABLE Terapeutas (
    cpf varchar(30) NOT NULL,
    disponibilidade json NOT NULL,
    crp varchar(30) DEFAULT NULL,
    situacao varchar(100) DEFAULT NULL,
    registroMatricula varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CLASSE PROFESSOR
CREATE TABLE Professores (
    cpf varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CLASSE PSICOLOGORT
CREATE TABLE PsicologosRT (
    cpf varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CLASSE ADMINISTRATIVO
CREATE TABLE Administradores (
    cpf varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CLASSE DISCIPLINA
CREATE TABLE Disciplinas (
    codigo varchar(30) NOT NULL,
    idProfessor varchar(30) NOT NULL,
    nome varchar(200) NOT NULL,
    periodo varchar(30) NOT NULL,
    PRIMARY KEY (codigo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CLASSE SESSAO
CREATE TABLE Sessoes (
    id int(11) AUTO_INCREMENT NOT NULL,
    idTerapia int(11) NOT NULL,
    descricao longtext NOT NULL,
    categoria varchar(100) NOT NULL,
    horaData datetime NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CLASSE TERAPIA
CREATE TABLE Terapias (
    id int(11) AUTO_INCREMENT NOT NULL,
    idTerapeuta varchar(30) NOT NULL,
    idPaciente varchar(30) NOT NULL,
    sala varchar(50),
    estado varchar(100) NOT NULL,
    dia varchar(50), 
    hora time,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE Matriculas (
    id int(11) AUTO_INCREMENT NOT NULL,
    idTerapeuta varchar(30) NOT NULL,
    idDisciplina varchar(30) NOT NULL,
    situacao varchar(100) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE Notificacoes (
    id int(11) AUTO_INCREMENT NOT NULL,
    tipo varchar(100) NOT NULL,
    emissor varchar(30) NOT NULL,
    receptor varchar(30) NOT NULL,
    dia varchar(100),
    horario varchar(100),
    horaData datetime NOT NULL,
    mensagem varchar(5000),
    estado varchar(300) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE Pacientes ADD CONSTRAINT fk_user FOREIGN KEY (cpf) REFERENCES Usuarios (cpf);
ALTER TABLE Terapeutas ADD CONSTRAINT fk_user2 FOREIGN KEY (cpf) REFERENCES Usuarios (cpf);
ALTER TABLE Professores ADD CONSTRAINT fk_user3 FOREIGN KEY (cpf) REFERENCES Usuarios (cpf);
ALTER TABLE PsicologosRT ADD CONSTRAINT fk_user4 FOREIGN KEY (cpf) REFERENCES Usuarios(cpf);
ALTER TABLE Administradores ADD CONSTRAINT fk_user5 FOREIGN KEY (cpf) REFERENCES Usuarios(cpf);
ALTER TABLE Disciplinas ADD CONSTRAINT fk_prof FOREIGN KEY (idProfessor) REFERENCES Professores (cpf);
ALTER TABLE Matriculas ADD CONSTRAINT fk_aluno FOREIGN KEY (idTerapeuta) REFERENCES Terapeutas (cpf);
ALTER TABLE Matriculas ADD CONSTRAINT fk_disciplina FOREIGN KEY (idDisciplina) REFERENCES Disciplinas (codigo);
ALTER TABLE Terapias ADD CONSTRAINT fk_tera FOREIGN KEY (idTerapeuta) REFERENCES Terapeutas (cpf);
ALTER TABLE Terapias ADD CONSTRAINT fk_paciente FOREIGN KEY (idPaciente) REFERENCES Pacientes (cpf);
ALTER TABLE Sessoes ADD CONSTRAINT fk_terapia FOREIGN KEY (idTerapia) REFERENCES Terapias (id);