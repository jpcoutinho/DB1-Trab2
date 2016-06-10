DROP SCHEMA IF EXISTS Trab2Teste CASCADE;
CREATE SCHEMA Trab2Teste;
SET SCHEMA 'Trab2Teste';

CREATE TABLE TB_Caixa (
	numero INT PRIMARY KEY,
	tin_FRA INT NOT NULL
);
COMMENT ON {COLUMN TB_Caixa.numero} IS 'Número de identificação do caixa';
COMMENT ON {COLUMN TB_Caixa.tin_FRA} IS 'Número do TIN da franquia';

CREATE TABLE TB_Cliente (
	doc_PES VARCHAR(9) PRIMARY KEY,
	pseudominio VARCHAR(20) UNIQUE NOT NULL
);
COMMENT ON {COLUMN TB_Cliente.doc_PES} IS 'Documento da pessoa sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON {COLUMN TB_Cliente.pseudominio} IS 'Nome fantasia utilizado pelo jogador, mantendo-se anônimo';

CREATE TABLE TB_Competiu (
	ID_PAR INT,
	doc_CLI VARCHAR(9),
	apostou NUMERIC NOT NULL,
	ganhou NUMERIC NOT NULL,
	PRIMARY KEY (ID_PAR,doc_CLI)
);
COMMENT ON {COLUMN TB_Competiu.ID_PAR} IS 'Número de identificação da partida';
COMMENT ON {COLUMN TB_Competiu.doc_CLI} IS 'Documento da cliente sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON {COLUMN TB_Competiu.apostou} IS 'Valor da aposta';
COMMENT ON {COLUMN TB_Competiu.ganhou} IS 'Quanto ganhou';

CREATE TABLE TB_Comprou (
	numero_CAX INT,
	doc_CLI VARCHAR(9),
	valor NUMERIC NOT NULL,
	data TIMESTAMP,
	PRIMARY KEY (numero_CAX,doc_CLI,data)
);
COMMENT ON {COLUMN TB_Comprou.numero_CAX} IS 'Número da identificação do caixa onde foi realizada a compra';
COMMENT ON {COLUMN TB_Comprou.doc_CLI} IS 'Documento da cliente sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON {COLUMN TB_Comprou.valor} IS 'Valor da compra';
COMMENT ON {COLUMN TB_Comprou.data} IS 'Data da compra';

CREATE TABLE TB_ContatoFranquia (
	tin_FRA VARCHAR(10),
	contato VARCHAR(14),
	PRIMARY KEY (tin_FRA,contato)
);
COMMENT ON {COLUMN TB_ContatoFranquia.tin_FRA} IS 'Número TIN da franquia sendo XX-XXXXXXX';
COMMENT ON {COLUMN TB_ContatoFranquia.contato} IS 'XXXXXXXXXXXXXX -> DDI DDD Numero';

CREATE TABLE TB_ContatoPessoa (
	doc_PES VARCHAR(9),
	contato VARCHAR(14),
	PRIMARY KEY (doc_PES,contato)
);
COMMENT ON {COLUMN TB_ContatoPessoa.doc_PES} IS 'Documento da pessoa sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON {COLUMN TB_ContatoPessoa.contato} IS 'XXXXXXXXXXXXXX -> DDI DDD Numero';

CREATE TABLE TB_Franquia (
	tin VARCHAR(10) PRIMARY KEY,
	nome VARCHAR(40) UNIQUE NOT NULL,
	endereco VARCHAR(100) NOT NULL
);
COMMENT ON {COLUMN TB_Franquia.tin} IS 'Número TIN da franquia sendo XX-XXXXXXX';
COMMENT ON {COLUMN TB_Franquia.nome} IS 'Nome da franquia';
COMMENT ON {COLUMN TB_Franquia.endereco} IS 'Endereço da franquia';

CREATE TABLE TB_Frequentou (
	doc_CLI VARCHAR(9),
	tin_FRA VARCHAR(10),
	data TIMESTAMP,
	PRIMARY KEY (doc_CLI,tin_FRA,data)
);
COMMENT ON {COLUMN TB_Frequentou.doc_CLI} IS 'Documento do cliente sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON {COLUMN TB_Frequentou.tin_FRA} IS 'Número TIN da franquia sendo XX-XXXXXXX';
COMMENT ON {COLUMN TB_Frequentou.data} IS 'Dia e hora que o cliente frequentou a franquia';

CREATE TABLE TB_Funcionario (
	doc_PES VARCHAR(9) PRIMARY KEY,
	ri INT UNIQUE NOT NULL
);
COMMENT ON {COLUMN TB_Funcionario.doc_PES} IS 'Documento da pessoa sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON {COLUMN TB_Funcionario.ri} IS 'Número RI do funcionario';

CREATE TABLE TB_Ganhou (
	ID_PAR INT,
	doc_CLI VARCHAR(9),
	PRIMARY KEY (ID_PAR,doc_CLI)
);
COMMENT ON {COLUMN TB_Ganhou.ID_PAR} IS 'Identificação da partida que foi ganhada';
COMMENT ON {COLUMN TB_Ganhou.doc_CLI} IS 'Documento da pessoa sendo XXXXXXXXX(9) numérico ou alfanumérico';

CREATE TABLE TB_Jogada (
	doc_CLI VARCHAR(9),
	snumber_MAQ INT,	-- Modificado serial->snumber ja que serial é um tipo do SQL
	nome_JGA VARCHAR(30),
	data TIMESTAMP,
	apostou NUMERIC NOT NULL,
	ganhou NUMERIC NOT NULL,
	PRIMARY KEY (doc_CLI,serial_MAQ,data)
);
COMMENT ON {COLUMN TB_Jogada.doc_CLI} IS 'Documento do cliente sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON {COLUMN TB_Jogada.snumber_MAQ} IS 'Numero serial da máquina';
COMMENT ON {COLUMN TB_Jogada.nome_JGO} IS 'Nome do jogo';
COMMENT ON {COLUMN TB_Jogada.data} IS 'Timestamp da jogada';
COMMENT ON {COLUMN TB_Jogada.apostou} IS 'Quanto foi apostado na jogada';
COMMENT ON {COLUMN TB_Jogada.ganhou} IS 'Quanto foi ganhado na partida';

CREATE TABLE TB_Jogo (
	nome VARCHAR(30) PRIMARY KEY,
	duracao NUMERIC NOT NULL
);
COMMENT ON {COLUMN TB_Jogo.nome} IS 'Nome do jogo';
COMMENT ON {COLUMN TB_Jogo.duracao} IS 'Duração do jogo em minutos';

CREATE TABLE TB_JogoEmGrupo (
	nome_JGO VARCHAR(30) PRIMARY KEY,
	jogadores_min INT NOT NULL,
	jogadores_max INT NOT NULL,
	equipes INT NOT NULL
);
COMMENT ON {COLUMN TB_JogoEmGrupo.nome_JGO} IS 'Nome do jogo';
COMMENT ON {COLUMN TB_JogoEmGrupo.jogadores_min} IS 'Quantidade minima de jogadores';
COMMENT ON {COLUMN TB_JogoEmGrupo.jogadores_max} IS 'Quantidade máxima de jogadores';
COMMENT ON {COLUMN TB_JogoEmGrupo.equipes} IS 'Número de equipes';

CREATE TABLE TB_JogoIndividual (
	nome_JGO VARCHAR(30) PRIMARY KEY,
);
COMMENT ON {COLUMN TB_JogoEmGrupo.nome_JGO} IS 'Nome do jogo';

CREATE TABLE TB_Maquina (
	snumber INT PRIMARY KEY,
	tin_FRA VARCHAR(10) NOT NULL
);
COMMENT ON {COLUMN TB_Maquina.snumber} IS 'Número serial da maquina';
COMMENT ON {COLUMN TB_Maquina.tin_FRA} IS 'Número TIN da franquia sendo XX-XXXXXXX'

CREATE TABLE TB_Mesa (
	numero INT PRIMARY KEY,
	nome_JGG VARCHAR(30) NOT NULL,
	tin_FRA VARCHAR(10) NOT NULL
);
COMMENT ON {COLUMN TB_Mesa.numero} IS 'Número da mesa';
COMMENT ON {COLUMN TB_Mesa.nome_JGG} IS 'Nome do jogo em grupo';
COMMENT ON {COLUMN TB_Mesa.tin_FRA} IS 'Número TIN da franquia sendo XX-XXXXXXX';

CREATE TABLE TB_Oferece (
	nome_JGI VARCHAR(30),
	snumber_MAQ INT,
	PRIMARY KEY (nome_JGI,snumber_MAQ)
);
COMMENT ON {COLUMN TB_Oferece.nome_JGI} IS 'Nome do jogo individual';
COMMENT ON {COLUMN TB_Oferece.snumber_MAQ} IS 'Número de série da maquina';

CREATE TABLE TB_Partida (
	ID SERIAL PRIMARY KEY,
	doc_FUC VARCHAR(9) NOT NULL,
	numero_MES INT NOT NULL,
	data TIMESTAMP,
);
COMMENT ON {COLUMN TB_Partida.ID} IS 'ID da partida AUTO-INCREMENT';
COMMENT ON {COLUMN TB_Partida.doc_FUC} IS 'Documento do funcionário sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON {COLUMN TB_Partida.numero_MES} IS 'Número da mesa';
COMMENT ON {COLUMN TB_Partida.data} IS 'Timestamp da partida';

CREATE TABLE TB_Pessoa (
	doc VARCHAR(9) PRIMARY KEY,
	nome VARCHAR(40) NOT NULL UNIQUE,
	tipoDoc CHAR(2) NOT NULL,
	sexo CHAR(1) NOT NULL,
	nascimento DATE NOT NULL --Mudei idade para nascimento
);
COMMENT ON {COLUMN TB_Pessoa.doc} IS 'XXXXXXXXX(9) Sendo numérico ou alfanumérico';
COMMENT ON {COLUMN TB_Pessoa.nome} IS 'Nome da pessoa com no max 40 caracteres';
COMMENT ON {COLUMN TB_Pessoa.tipoDoc} IS 'Tipo do documento da pessoa Eg:. 02';
COMMENT ON {COLUMN TB_Pessoa.sexo} IS 'Sexo da pessoa Eg:. M, F, O';
COMMENT ON {COLUMN TB_Pessoa.nascimento} IS 'Data de nascimento da pessoa sendo AAAAMMDD';
ALTER TABLE TB_Pessoa
	ADD CONSTRAINT VerificaNascimentoNaoFuturo
		CHECK (nascimento < CURRENT_DATE);

CREATE TABLE TB_Vendeu (
	doc_CLI VARCHAR(9),
	numero_CAX INT,
	valor NUMERIC,
	data TIMESTAMP NOT NULL,
	PRIMARY KEY (doc,numero,valor)
);
COMMENT ON {COLUMN TB_Vendeu.doc_CLI} IS 'Documento do cliente sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON {COLUMN TB_Vendeu.numero_CAX} IS 'Número da caixa em que a venda foi realizada';
COMMENT ON {COLUMN TB_Vendeu.valor} IS 'Valor da venda';
COMMENT ON {COLUMN TB_Vendeu.data} IS 'Timestamp da venda';

ALTER TABLE TB_Caixa ADD FOREIGN KEY (tin_FRA) REFERENCES TB_Franquia (tin);

ALTER TABLE TB_Cliente ADD FOREIGN KEY (doc_PES) REFERENCES TB_Pessoa (doc);

ALTER TABLE TB_Competiu ADD FOREIGN KEY (ID_PAR) REFERENCES TB_Partida (ID);
ALTER TABLE TB_Competiu ADD FOREIGN KEY (doc_CLI) REFERENCES TB_Cliente (doc_PES);

ALTER TABLE TB_Comprou ADD FOREIGN KEY (numero_CAX) REFERENCES TB_Caixa (numero);
ALTER TABLE TB_Comprou ADD FOREIGN KEY (doc_CLI) REFERENCES TB_Cliente (doc);
