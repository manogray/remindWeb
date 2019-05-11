-- CRIAÇÃO DA BASE DE DADOS
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-04:00";

CREATE DATABASE psychsystem;

USE psychsystem;

-- CLASSE USUARIOS
CREATE TABLE Usuarios (
    cpf varchar(30) NOT NULL,
    nome varchar(300) NOT NULL,
    senha varchar(300),
    email varchar(500) NOT NULL,
    telefone varchar(30),
    PRIMARY KEY (cpf)
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
    prioridade int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CLASSE TERAPEUTA
CREATE TABLE Terapeutas (
    cpf varchar(30) NOT NULL,
    disponibilidade json NOT NULL,
    crp varchar(30) DEFAULT NULL,
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
    codigo int(11) NOT NULL,
    idTerapeuta int(11) NOT NULL,
    idProfessor int(11) NOT NULL,
    nome varchar(200) NOT NULL,
    PRIMARY KEY (codigo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CLASSE SESSAO
CREATE TABLE Sessao (
    id int(11) AUTO_INCREMENT NOT NULL,
    descricao longtext NOT NULL,
    horaData datetime NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CLASSE TERAPIA
CREATE TABLE Terapias (
    id int(11) AUTO_INCREMENT NOT NULL,
    idTerapeuta int(11) NOT NULL,
    idPaciente int(11) NOT NULL,
    idSessao int(11) DEFAULT NULL,
    sala varchar(50) NOT NULL,
    status varchar(100) NOT NULL,
    dia varchar(50) NOT NULL, 
    hora time NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

