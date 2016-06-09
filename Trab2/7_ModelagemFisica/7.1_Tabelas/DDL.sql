DROP SCHEMA IF EXISTS Trab2Teste CASCADE;
CREATE SCHEMA Trab2Teste;
SET SCHEMA 'Trab2Teste';

CREATE TABLE TB_Contato_Pessoa (
	contato VARCHAR(14) NOT NULL,
	doc VARCHAR(9) NOT NULL,
	PRIMARY KEY (contato,doc)
);
COMMENT ON {COLUMN TB_Contato_Pessoa.contato} IS 'XXXXXXXXXXXXXX -> DDI DDD Numero';
COMMENT ON {COLUMN TB_Contato_Pessoa.doc} IS 'XXXXXXXXX (9) Sendo numérico ou alfanumerioco';

CREATE TABLE TB_Pessoa (
	doc VARCHAR(9) PRIMARY KEY,
	nome VARCHAR(40) NOT NULL UNIQUE,
	tipoDoc CHAR(2) NOT NULL,
	sexo CHAR(1) NOT NULL,
	nascimento DATE NOT NULL --Mudei idade para nascimento
);
COMMENT ON {COLUMN TB_Pessoa.doc} IS 'XXXXXXXXX (9) Sendo numérico ou alfanumerioco';
COMMENT ON {COLUMN TB_Pessoa.nome} IS 'Nome da pessoa com no max 40 caracteres';
COMMENT ON {COLUMN TB_Pessoa.tipoDoc} IS 'Tipo do documento da pessoa Eg:. 02';
COMMENT ON {COLUMN TB_Pessoa.sexo} IS 'Sexo da pessoa Eg:. M, F, O';
COMMENT ON {COLUMN TB_Pessoa.nascimento} IS 'Data de nascimento da pessoa AAAAMMDD';
ALTER TABLE TB_Pessoa
	ADD CONSTRAINT VerificaNascimentoNaoFuturo
		CHECK (nascimento < CURRENT_DATE);

CREATE TABLE TB_Funcionario (
	doc VARCHAR(9) PRIMARY KEY,
	ri INT NOT NULL
);
COMMENT ON {COLUMN TB_Funcionario.doc} IS 'XXXXXXXXX (9) Sendo numérico ou alfanumerioco';
COMMENT ON {COLUMN TB_Funcionario.ri} IS 'RI do funcionario';

CREATE TABLE TB_Partida (
	ID INT PRIMARY KEY,
	doc VARCHAR(9),
	numero INT NOT NULL,
	data TIMESTAMP NOT NULL
);
COMMENT ON {COLUMN TB_Partida.ID} IS 'Identificação da partida';
COMMENT ON {COLUMN TB_Partida.doc} IS 'XXXXXXXXX (9) Sendo numérico ou alfanumerioco';
COMMENT ON {COLUMN TB_Partida.numero} IS 'Numero da partida';
COMMENT ON {COLUMN TB_Partida.data} IS 'Timestamp da partida';

CREATE TABLE TB_Caixa (
	numero INT PRIMARY KEY,
	tin INT
);
COMMENT ON {COLUMN TB_Caixa.numero} IS 'Numero de identificação da caixa';
COMMENT ON {COLUMN TB_Caixa.tin} IS 'Numero do TIN';
