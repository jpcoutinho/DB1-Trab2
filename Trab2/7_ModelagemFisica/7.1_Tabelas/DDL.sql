CREATE SCHEMA trab2teste;
SET SCHEMA 'trab2teste';

CREATE TABLE TB_Caixa (
	numero INT PRIMARY KEY,
	tin_FRA VARCHAR(10) NOT NULL
);

CREATE TABLE TB_Cliente (
	doc_PES VARCHAR(9) PRIMARY KEY,
	pseudominio VARCHAR(20) UNIQUE NOT NULL
);

CREATE TABLE TB_Competiu (
	ID_PAR INT,
	doc_CLI VARCHAR(9),
	apostou NUMERIC NOT NULL,
	ganhou NUMERIC NOT NULL,
	PRIMARY KEY (ID_PAR,doc_CLI)
);

CREATE TABLE TB_Comprou (
	numero_CAX INT,
	doc_CLI VARCHAR(9),
	valor NUMERIC NOT NULL,
	data TIMESTAMP,
	PRIMARY KEY (numero_CAX,doc_CLI,data)
);

CREATE TABLE TB_ContatoFranquia (
	tin_FRA VARCHAR(10),
	contato VARCHAR(14),
	PRIMARY KEY (tin_FRA,contato)
);

CREATE TABLE TB_ContatoPessoa (
	doc_PES VARCHAR(9),
	contato VARCHAR(14),
	PRIMARY KEY (doc_PES,contato)
);

CREATE TABLE TB_Franquia (
	tin VARCHAR(10) PRIMARY KEY,
	nome VARCHAR(40) UNIQUE NOT NULL,
	endereco VARCHAR(100) NOT NULL
);

CREATE TABLE TB_Frequentou (
	doc_CLI VARCHAR(9),
	tin_FRA VARCHAR(10),
	data TIMESTAMP,
	PRIMARY KEY (doc_CLI,tin_FRA,data)
);

CREATE TABLE TB_Funcionario (
	doc_PES VARCHAR(9) PRIMARY KEY,
	ri INT UNIQUE NOT NULL
);

CREATE TABLE TB_Ganhou (
	ID_PAR INT,
	doc_CLI VARCHAR(9),
	PRIMARY KEY (ID_PAR,doc_CLI)
);

CREATE TABLE TB_Jogada (
	doc_CLI VARCHAR(9),
	snumber_MAQ INT,	-- Modificado serial->snumber ja que serial é um tipo do SQL
	nome_JGO VARCHAR(30),
	data TIMESTAMP,
	apostou NUMERIC NOT NULL,
	ganhou NUMERIC NOT NULL,
	PRIMARY KEY (doc_CLI,snumber_MAQ,data)
);

CREATE TABLE TB_Jogo (
	nome VARCHAR(30) PRIMARY KEY,
	duracao NUMERIC NOT NULL
);

CREATE TABLE TB_JogoEmGrupo (
	nome_JGO VARCHAR(30) PRIMARY KEY,
	jogadores_min INT NOT NULL,
	jogadores_max INT NOT NULL,
	equipes INT NOT NULL
);

CREATE TABLE TB_JogoIndividual (
	nome_JGO VARCHAR(30) PRIMARY KEY
);

CREATE TABLE TB_Maquina (
	snumber INT PRIMARY KEY,
	tin_FRA VARCHAR(10) NOT NULL
);

CREATE TABLE TB_Mesa (
	numero INT PRIMARY KEY,
	nome_JGG VARCHAR(30) NOT NULL,
	tin_FRA VARCHAR(10) NOT NULL
);

CREATE TABLE TB_Oferece (
	nome_JGI VARCHAR(30),
	snumber_MAQ INT,
	PRIMARY KEY (nome_JGI,snumber_MAQ)
);

CREATE TABLE TB_Partida (
	ID SERIAL PRIMARY KEY,
	doc_FUC VARCHAR(9) NOT NULL,
	numero_MES INT NOT NULL,
	data TIMESTAMP
);

CREATE TABLE TB_Pessoa (
	doc VARCHAR(9) PRIMARY KEY,
	nome VARCHAR(40) NOT NULL UNIQUE,
	tipoDoc CHAR(2) NOT NULL,
	sexo CHAR(1) NOT NULL,
	nascimento DATE NOT NULL --Mudei idade para nascimento
);

CREATE TABLE TB_Vendeu (
	doc_CLI VARCHAR(9),
	numero_CAX INT,
	valor NUMERIC,
	data TIMESTAMP NOT NULL,
	PRIMARY KEY (doc_CLI,numero_CAX,valor)
);

-- COMENTÁRIOS

-- Tabelas
COMMENT ON TABLE TB_Caixa IS 'Registro dos caixas de compra e venda';
COMMENT ON TABLE TB_Cliente IS 'Registro dos clientes';
COMMENT ON TABLE TB_Competiu IS 'TB_Cliente competiu em X TB_Partida';
COMMENT ON TABLE TB_Comprou IS 'TB_Cliente comprou de X TB_Caixa';
COMMENT ON TABLE TB_ContatoFranquia IS 'Contato da TB_Franquia';
COMMENT ON TABLE TB_ContatoPessoa IS 'Contato da TB_Pessoa';
COMMENT ON TABLE TB_Franquia IS 'Registro da franquia';
COMMENT ON TABLE TB_Frequentou IS 'TB_Cliente frequentou X TB_Franquia';
COMMENT ON TABLE TB_Funcionario IS 'Registro dos funcionários';
COMMENT ON TABLE TB_Ganhou IS 'TB_Cliente ganhou X TB_Partida';
COMMENT ON TABLE TB_Jogada IS 'TB_Cliente realizou uma jogada de um TB_JogoIndividual em X TB_Maquina';
COMMENT ON TABLE TB_Jogo IS 'Registro dos jogos';
COMMENT ON TABLE TB_JogoEmGrupo IS 'Registro dos jogos em grupo';
COMMENT ON TABLE TB_JogoIndividual IS 'Registro dos jogos individuais';
COMMENT ON TABLE TB_Maquina IS 'Registro das máquinas';
COMMENT ON TABLE TB_Mesa IS 'Registro das mesas';
COMMENT ON TABLE TB_Oferece IS 'TB_Maquina oferece um X TB_JogoIndividual';
COMMENT ON TABLE TB_Partida IS 'Registro das partidas';
COMMENT ON TABLE TB_Pessoa IS 'Registro das pessoas';
COMMENT ON TABLE TB_Vendeu IS 'TB_Caixa vendeu para X TB_Cliente';

-- Colunas
COMMENT ON COLUMN TB_Caixa.numero IS 'Número de identificação do caixa';
COMMENT ON COLUMN TB_Caixa.tin_FRA IS 'Número do TIN da franquia';

COMMENT ON COLUMN TB_Cliente.doc_PES IS 'Documento da pessoa sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON COLUMN TB_Cliente.pseudominio IS 'Nome fantasia utilizado pelo jogador, mantendo-se anônimo';

COMMENT ON COLUMN TB_Competiu.ID_PAR IS 'Número de identificação da partida';
COMMENT ON COLUMN TB_Competiu.doc_CLI IS 'Documento da cliente sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON COLUMN TB_Competiu.apostou IS 'Valor da aposta';
COMMENT ON COLUMN TB_Competiu.ganhou IS 'Quanto ganhou';

COMMENT ON COLUMN TB_Comprou.numero_CAX IS 'Número da identificação do caixa onde foi realizada a compra';
COMMENT ON COLUMN TB_Comprou.doc_CLI IS 'Documento da cliente sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON COLUMN TB_Comprou.valor IS 'Valor da compra';
COMMENT ON COLUMN TB_Comprou.data IS 'Data da compra';

COMMENT ON COLUMN TB_ContatoFranquia.tin_FRA IS 'Número TIN da franquia sendo XX-XXXXXXX';
COMMENT ON COLUMN TB_ContatoFranquia.contato IS 'XXXXXXXXXXXXXX -> DDI DDD Numero';

COMMENT ON COLUMN TB_ContatoPessoa.doc_PES IS 'Documento da pessoa sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON COLUMN TB_ContatoPessoa.contato IS 'XXXXXXXXXXXXXX -> DDI DDD Numero';

COMMENT ON COLUMN TB_Franquia.tin IS 'Número TIN da franquia sendo XX-XXXXXXX';
COMMENT ON COLUMN TB_Franquia.nome IS 'Nome da franquia';
COMMENT ON COLUMN TB_Franquia.endereco IS 'Endereço da franquia';

COMMENT ON COLUMN TB_Frequentou.doc_CLI IS 'Documento do cliente sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON COLUMN TB_Frequentou.tin_FRA IS 'Número TIN da franquia sendo XX-XXXXXXX';
COMMENT ON COLUMN TB_Frequentou.data IS 'Dia e hora que o cliente frequentou a franquia';

COMMENT ON COLUMN TB_Funcionario.doc_PES IS 'Documento da pessoa sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON COLUMN TB_Funcionario.ri IS 'Número RI do funcionario';

COMMENT ON COLUMN TB_Ganhou.ID_PAR IS 'Identificação da partida que foi ganhada';
COMMENT ON COLUMN TB_Ganhou.doc_CLI IS 'Documento da pessoa sendo XXXXXXXXX(9) numérico ou alfanumérico';

COMMENT ON COLUMN TB_Jogada.doc_CLI IS 'Documento do cliente sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON COLUMN TB_Jogada.snumber_MAQ IS 'Numero serial da máquina';
COMMENT ON COLUMN TB_Jogada.nome_JGO IS 'Nome do jogo';
COMMENT ON COLUMN TB_Jogada.data IS 'Timestamp da jogada';
COMMENT ON COLUMN TB_Jogada.apostou IS 'Quanto foi apostado na jogada';
COMMENT ON COLUMN TB_Jogada.ganhou IS 'Quanto foi ganhado na partida';

COMMENT ON COLUMN TB_Jogo.nome IS 'Nome do jogo';
COMMENT ON COLUMN TB_Jogo.duracao IS 'Duração do jogo em minutos';

COMMENT ON COLUMN TB_JogoEmGrupo.nome_JGO IS 'Nome do jogo';
COMMENT ON COLUMN TB_JogoEmGrupo.jogadores_min IS 'Quantidade minima de jogadores';
COMMENT ON COLUMN TB_JogoEmGrupo.jogadores_max IS 'Quantidade máxima de jogadores';
COMMENT ON COLUMN TB_JogoEmGrupo.equipes IS 'Número de equipes';

COMMENT ON COLUMN TB_JogoEmGrupo.nome_JGO IS 'Nome do jogo';

COMMENT ON COLUMN TB_Maquina.snumber IS 'Número serial da maquina';
COMMENT ON COLUMN TB_Maquina.tin_FRA IS 'Número TIN da franquia sendo XX-XXXXXXX';

COMMENT ON COLUMN TB_Mesa.numero IS 'Número da mesa';
COMMENT ON COLUMN TB_Mesa.nome_JGG IS 'Nome do jogo em grupo';
COMMENT ON COLUMN TB_Mesa.tin_FRA IS 'Número TIN da franquia sendo XX-XXXXXXX';

COMMENT ON COLUMN TB_Oferece.nome_JGI IS 'Nome do jogo individual';
COMMENT ON COLUMN TB_Oferece.snumber_MAQ IS 'Número de série da maquina';

COMMENT ON COLUMN TB_Partida.ID IS 'ID da partida AUTO-INCREMENT';
COMMENT ON COLUMN TB_Partida.doc_FUC IS 'Documento do funcionário sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON COLUMN TB_Partida.numero_MES IS 'Número da mesa';
COMMENT ON COLUMN TB_Partida.data IS 'Timestamp da partida';

COMMENT ON COLUMN TB_Pessoa.doc IS 'XXXXXXXXX(9) Sendo numérico ou alfanumérico';
COMMENT ON COLUMN TB_Pessoa.nome IS 'Nome da pessoa com no max 40 caracteres';
COMMENT ON COLUMN TB_Pessoa.tipoDoc IS 'Tipo do documento da pessoa Eg:. 02';
COMMENT ON COLUMN TB_Pessoa.sexo IS 'Sexo da pessoa Eg:. M, F, O';
COMMENT ON COLUMN TB_Pessoa.nascimento IS 'Data de nascimento da pessoa sendo AAAAMMDD';

COMMENT ON COLUMN TB_Vendeu.doc_CLI IS 'Documento do cliente sendo XXXXXXXXX(9) numérico ou alfanumérico';
COMMENT ON COLUMN TB_Vendeu.numero_CAX IS 'Número da caixa em que a venda foi realizada';
COMMENT ON COLUMN TB_Vendeu.valor IS 'Valor da venda';
COMMENT ON COLUMN TB_Vendeu.data IS 'Timestamp da venda';

-- FOREIGN KEY's

ALTER TABLE TB_Caixa ADD FOREIGN KEY (tin_FRA) REFERENCES TB_Franquia (tin);

ALTER TABLE TB_Cliente ADD FOREIGN KEY (doc_PES) REFERENCES TB_Pessoa (doc);

ALTER TABLE TB_Competiu ADD FOREIGN KEY (ID_PAR) REFERENCES TB_Partida (ID);
ALTER TABLE TB_Competiu ADD FOREIGN KEY (doc_CLI) REFERENCES TB_Cliente (doc_PES);

ALTER TABLE TB_Comprou ADD FOREIGN KEY (numero_CAX) REFERENCES TB_Caixa (numero);
ALTER TABLE TB_Comprou ADD FOREIGN KEY (doc_CLI) REFERENCES TB_Cliente (doc_PES);

ALTER TABLE TB_ContatoFranquia ADD FOREIGN KEY (tin_FRA) REFERENCES TB_Franquia (tin);

ALTER TABLE TB_Frequentou ADD FOREIGN KEY (doc_CLI) REFERENCES TB_Cliente (doc_PES);
ALTER TABLE TB_Frequentou ADD FOREIGN KEY (tin_FRA) REFERENCES TB_Franquia (tin);

ALTER TABLE TB_Funcionario ADD FOREIGN KEY (doc_PES) REFERENCES TB_Pessoa (doc);

ALTER TABLE TB_Ganhou ADD FOREIGN KEY (doc_CLI) REFERENCES TB_Cliente (doc_PES);
ALTER TABLE TB_Ganhou ADD FOREIGN KEY (ID_PAR) REFERENCES TB_Partida (ID);

ALTER TABLE TB_Jogada ADD FOREIGN KEY (doc_CLI) REFERENCES TB_Cliente (doc_PES);
ALTER TABLE TB_Jogada ADD FOREIGN KEY (snumber_MAQ) REFERENCES TB_Maquina (snumber);
ALTER TABLE TB_Jogada ADD FOREIGN KEY (nome_JGO) REFERENCES TB_Jogo (nome);

ALTER TABLE TB_JogoEmGrupo ADD FOREIGN KEY (nome_JGO) REFERENCES TB_Jogo (nome);
ALTER TABLE TB_JogoIndividual ADD FOREIGN KEY (nome_JGO) REFERENCES TB_Jogo (nome);

ALTER TABLE TB_Maquina ADD FOREIGN KEY (tin_FRA) REFERENCES TB_Franquia (tin);

ALTER TABLE TB_Mesa ADD FOREIGN KEY (nome_JGG) REFERENCES TB_JogoEmGrupo (nome_JGO);
ALTER TABLE TB_Mesa ADD FOREIGN KEY (tin_FRA) REFERENCES TB_Franquia (tin);

ALTER TABLE TB_Oferece ADD FOREIGN KEY (nome_JGI) REFERENCES TB_JogoIndividual (nome_JGO);
ALTER TABLE TB_Oferece ADD FOREIGN KEY (snumber_MAQ) REFERENCES TB_Maquina (snumber);

ALTER TABLE TB_Partida ADD FOREIGN KEY (doc_FUC) REFERENCES TB_Funcionario (doc_PES);
ALTER TABLE TB_Partida ADD FOREIGN KEY (numero_MES) REFERENCES TB_Mesa (numero);

ALTER TABLE TB_Vendeu ADD FOREIGN KEY (doc_CLI) REFERENCES TB_Cliente (doc_PES);
ALTER TABLE TB_Vendeu ADD FOREIGN KEY (numero_CAX) REFERENCES TB_Caixa (numero);

-- Constraint's

ALTER TABLE TB_Pessoa
	ADD CONSTRAINT VerificaNascimentoNaoFuturo
		CHECK (nascimento < CURRENT_DATE);


-- Functions And Triggers

DROP FUNCTION transacao_minima() CASCADE;
CREATE FUNCTION transacao_minima()
	RETURNS trigger AS
		$BODY$
			DECLARE
			BEGIN
				IF NEW.valor < 50000 THEN
				RAISE EXCEPTION 'Transação não efetuada'
				      USING HINT = 'Valor abaixo do minimo';
				END IF;
				
				RETURN NEW;
			END;
		$BODY$
	LANGUAGE plpgsql;
	
CREATE TRIGGER checa_transacao_minima
	BEFORE INSERT OR UPDATE
		ON TB_Comprou
			FOR EACH ROW
				EXECUTE PROCEDURE transacao_minima()
		
	


