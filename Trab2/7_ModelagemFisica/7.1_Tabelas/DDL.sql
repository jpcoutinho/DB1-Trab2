DROP SCHEMA IF EXISTS Trab2Teste CASCADE;
CREATE SCHEMA Trab2Teste;
SET SCHEMA 'Trab2Teste';

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
	ri INT NOT NULL UNIQUE
);
COMMENT ON {COLUMN TB_Funcionario.doc} IS 'XXXXXXXXX (9) Sendo numérico ou alfanumerioco';
COMMENT ON {COLUMN TB_Funcionario.ri} IS 'RI do funcionario';

CREATE TABLE TB_Partida (
	ID INT PRIMARY KEY,
	doc VARCHAR(9),
	numero INT NOT NULL UNIQUE,
	data TIMESTAMP NOT NULL
);
COMMENT ON {COLUMN TB_Partida.ID} IS 'Identificação da partida';
COMMENT ON {COLUMN TB_Partida.doc} IS 'XXXXXXXXX (9) Sendo numérico ou alfanumerioco';
COMMENT ON {COLUMN TB_Partida.numero} IS 'Numero da partida';
COMMENT ON {COLUMN TB_Partida.data} IS 'Timestamp da partida';

CREATE TABLE TB_Caixa (
	numero INT PRIMARY KEY,
	tin INT NOT NULL
);
COMMENT ON {COLUMN TB_Caixa.numero} IS 'Numero de identificação da caixa';
COMMENT ON {COLUMN TB_Caixa.tin} IS 'Numero do TIN';

CREATE TABLE TB_Cliente (
	doc VARCHAR(9) PRIMARY KEY,
	pseudominio VARCHAR(10) UNIQUE NOT NULL
);
COMMENT ON {COLUMN TB_Cliente.doc} IS 'XXXXXXXXX (9) Sendo numérico ou alfanumerioco';
COMMENT ON {COLUMN TB_Cliente.pseudominio} IS '???';

CREATE TABLE TB_Competiu (
	ID INT,
	doc VARCHAR(9),
	apostou NUMERIC NOT NULL,
	ganhou NUMERIC NOT NULL,
	PRIMARY KEY (ID,doc)
);
COMMENT ON {COLUMN TB_Competiu.ID} IS 'Numero de identificação';
COMMENT ON {COLUMN TB_Competiu.doc} IS 'XXXXXXXXX (9) Sendo numérico ou alfanumerioco';
COMMENT ON {COLUMN TB_Competiu.apostou} IS 'Valor da aposta';
COMMENT ON {COLUMN TB_Competiu.ganhou} IS 'Quanto ganhou';

CREATE TABLE TB_Comprou (
	numero INT,
	doc VARCHAR(9),
	valor NUMERIC NOT NULL,
	data TIMESTAMP,
	PRIMARY KEY (numero,doc,data)
);
COMMENT ON {COLUMN TB_Comprou.numero} IS 'Numero da identificação da compra';
COMMENT ON {COLUMN TB_Comprou.doc} IS 'XXXXXXXXX (9) Sendo numérico ou alfanumerioco';
COMMENT ON {COLUMN TB_Comprou.valor} IS 'Valor da compra';
COMMENT ON {COLUMN TB_Comprou.data} IS 'Data da compra';

CREATE TABLE TB_ContatoFranquia (
	tin INT,
	contato VARCHAR(14),
	PRIMARY KEY (tin,contato)
);
COMMENT ON {COLUMN TB_ContatoFranquia.tin} IS 'Numero TIN da franquia';
COMMENT ON {COLUMN TB_ContatoFranquia.contato} IS 'XXXXXXXXXXXXXX -> DDI DDD Numero';

CREATE TABLE TB_ContatoPessoa (
	contato VARCHAR(14),
	doc VARCHAR(9),
	PRIMARY KEY (contato,doc)
);
COMMENT ON {COLUMN TB_Contato_Pessoa.contato} IS 'XXXXXXXXXXXXXX -> DDI DDD Numero';
COMMENT ON {COLUMN TB_Contato_Pessoa.doc} IS 'XXXXXXXXX (9) Sendo numérico ou alfanumerioco';

CREATE TABLE TB_Franquia (
	tin INT PRIMARY KEY,
	nome VARCHAR(40) UNIQUE NOT NULL,
	endereco VARCHAR(100) NOT NULL
);
COMMENT ON {COLUMN TB_Franquia.tin} IS 'Numero TIN da franquia';
COMMENT ON {COLUMN TB_Franquia.nome} IS 'Nome da franquia';
COMMENT ON {COLUMN TB_Franquia.endereco} IS 'Endereco da franquia';

CREATE TABLE TB_Frequentou (
	doc VARCHAR(9),
	tin INT,
	data TIMESTAMP,
	PRIMARY KEY (doc,tin,data)
);
COMMENT ON {COLUMN TB_Frequentou.doc} IS 'XXXXXXXXXXXXXX -> DDI DDD Numero';
COMMENT ON {COLUMN TB_Frequentou.tin} IS 'Numero TIN da franquia';
COMMENT ON {COLUMN TB_Frequentou.data} IS 'Dia e hora que o cliente frequentou a franquia';

CREATE TABLE TB_Funcionario (
	doc VARCHAR(9) PRIMARY KEY,
	ri INT UNIQUE NOT NULL
);
COMMENT ON {COLUMN TB_Funcionario.doc} IS 'XXXXXXXXXXXXXX -> DDI DDD Numero';
COMMENT ON {COLUMN TB_Funcionario.ri} IS 'Numero RI do funcionario';

CREATE TABLE TB_Ganhou (
	ID INT,
	doc VARCHAR(9),
	PRIMARY KEY (ID,doc)
);
COMMENT ON {COLUMN TB_Ganhou.ID} IS 'Identificação da partida que foi ganhada';
COMMENT ON {COLUMN TB_Ganhou.doc} IS 'XXXXXXXXXXXXXX -> DDI DDD Numero';

CREATE TABLE TB_Jogada (
	doc VARCHAR(9),
	snumber INT, -- Serial mudado para snumber ja que SERIAL é do SQL
	nome VARCHAR(30),
);
