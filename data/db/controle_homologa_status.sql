/*
   segunda-feira, 12 de setembro de 2016
   User: root
   Server: localhost
   Database: controle-homologa
   Application: Controle-homologa
*/

/* To prevent any potential data loss issues, you should review this script in detail before running it outside the context of the database designer.*/
CREATE DATABASE controle_homologa;
use controle_homologa;

CREATE TABLE programas (
    id_programa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NomePrograma VARCHAR(50) NOT NULL
);

CREATE TABLE skins (
    id_skin INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NomeSkin VARCHAR(50) NOT NULL,
    prg_cod INT NOT NULL
);


CREATE TABLE status_chamados (
    id_status INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NomeStatus VARCHAR(50) NOT NULL
);

CREATE TABLE prioridades (
    id_prioridade INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NomePrioridade VARCHAR(50) NOT NULL
);

CREATE TABLE chamados (
    id_chamado INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NumeroChamado INT(4) NOT NULL,
    id_status INT NOT NULL,
    id_prioridade INT NOT NULL,

    FOREIGN KEY (id_status)
        REFERENCES status_chamados (id_status),

    FOREIGN KEY (id_prioridade)
        REFERENCES prioridades (id_prioridade)
);

CREATE TABLE status_homologa (
    id_status INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NomeStatus VARCHAR(50) NOT NULL
);


CREATE TABLE usuarios (
    id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NomeUsuario VARCHAR(50) NOT NULL,
    SobrenomeUsuario VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Login VARCHAR(50) NOT NULL,
    Senha VARCHAR(50) NOT NULL
);


CREATE TABLE historicos (
    id_historico INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_chamado INT NOT NULL,
    data INT NOT NULL,


	FOREIGN KEY (id_usuario)
        REFERENCES usuarios (id_usuario),

    FOREIGN KEY (id_chamado)
        REFERENCES chamados (id_chamado)
);

CREATE TABLE homologa (
    id_homologa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NomeHomologa VARCHAR(50) NOT NULL,
    LinkHomologa VARCHAR(100) NOT NULL,
    id_status INT NOT NULL,
    id_chamado INT NOT NULL,
    id_programa INT NOT NULL,
    id_skin INT NOT NULL,
    id_historico INT NOT NULL,

    FOREIGN KEY (id_status)
        REFERENCES status_homologa (id_status),

    FOREIGN KEY (id_chamado)
        REFERENCES chamados (id_chamado),

    FOREIGN KEY (id_programa)
        REFERENCES programas (id_programa),

    FOREIGN KEY (id_skin)
        REFERENCES skins (id_skin),

    FOREIGN KEY (id_historico)
        REFERENCES historicos (id_historico)
);
