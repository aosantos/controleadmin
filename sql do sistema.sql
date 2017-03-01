create database controleadmin;
use controleadmin;
CREATE TABLE administrador (
  cod INTEGER NOT NULL AUTO_INCREMENT,
  login CHAR(20) NULL,
  senha CHAR(10) NULL,
  nome VARCHAR(255) NULL,
  email VARCHAR(30) UNIQUE,
  ativo CHAR(32) NULL,
  imagem VARCHAR(255) NULL,
  PRIMARY KEY(cod)
);


CREATE TABLE contas (
  cod INTEGER NOT NULL AUTO_INCREMENT,
  administrador_cod INTEGER NOT NULL,
  contas VARCHAR(255) NULL,
  dinheiro_ano DATE NULL,
  total DECIMAL(15,2) NULL,
  PRIMARY KEY(cod),
  CONSTRAINT `FK_contas_administrador_cod` 
FOREIGN KEY (`administrador_cod`) REFERENCES `administrador` (`cod`) ON UPDATE CASCADE
) ;


CREATE TABLE contas_categorias (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_contas VARCHAR(255) NULL,
  PRIMARY KEY(cod)
);


CREATE TABLE controle_dividas (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  administrador_cod INTEGER NOT NULL,
  data_dividas DATE NULL,
  entrada DECIMAL(15,2) NULL,
  novaentrada DECIMAL(15,2) NULL,
  saldo DECIMAL(15,2) NULL,
  observacao TEXT NULL,
  PRIMARY KEY(cod),
 KEY `FK_controle_dividas_administrador_cod` (`administrador_cod`),
  CONSTRAINT `FK_controle_dividas_administrador_cod` 
FOREIGN KEY (`administrador_cod`) REFERENCES `administrador` (`cod`) ON UPDATE CASCADE
) ;


CREATE TABLE dinheiro (
  cod INTEGER NOT NULL AUTO_INCREMENT,
  administrador_cod INTEGER NOT NULL,
  entrada DECIMAL(15,2) NULL,
  saida DECIMAL(15,2) NULL,
  saldo DECIMAL(15,2) NULL,
  relatorio VARCHAR(255) NULL,
  novasaida DECIMAL(15,2) NULL,
  ano DATE NULL,
  PRIMARY KEY(cod),
 KEY `FK_dinheiro_administrador_cod` (`administrador_cod`),
  CONSTRAINT `FK_dinheiro_administrador_cod` 
FOREIGN KEY (`administrador_cod`) REFERENCES `administrador` (`cod`) ON UPDATE CASCADE
) ;

