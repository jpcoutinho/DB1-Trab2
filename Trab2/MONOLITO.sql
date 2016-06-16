-- CRIA BANCO DE DADOS BASE PARA TESTAR AS CONSULTAS ( CANDIDATO A FINAL )
-- Usa todo o sistema criado e testado até o dia 16-06-2016 as 20:35

CREATE SCHEMA trab2teste;
SET SCHEMA 'trab2teste';

CREATE TABLE TB_Franquia (
	tin VARCHAR(10) PRIMARY KEY,
	nome VARCHAR(40) UNIQUE NOT NULL,
	endereco VARCHAR(100) NOT NULL
);

CREATE TABLE TB_ContatoFranquia (
	tin_FRA VARCHAR(10),
	contato VARCHAR(14),
	PRIMARY KEY (tin_FRA,contato)
);

CREATE TABLE TB_Pessoa (
	doc VARCHAR(9) PRIMARY KEY,
	nome VARCHAR(40) NOT NULL UNIQUE,
	tipoDoc CHAR(2) NOT NULL,
	sexo CHAR(1) NOT NULL,
	nascimento DATE NOT NULL --Mudei idade para nascimento
);

CREATE TABLE TB_ContatoPessoa (
	doc_PES VARCHAR(9),
	contato VARCHAR(14),
	PRIMARY KEY (doc_PES,contato)
);

CREATE TABLE TB_Funcionario (
	doc_PES VARCHAR(9) PRIMARY KEY,
	ri SERIAL UNIQUE NOT NULL
);

CREATE TABLE TB_Cliente (
	doc_PES VARCHAR(9) PRIMARY KEY,
	pseudominio VARCHAR(20) UNIQUE NULL
);

CREATE TABLE TB_Comprou (
	numero_CAX INT,
	doc_CLI VARCHAR(9),
	valor NUMERIC NOT NULL,
	data TIMESTAMP,
	PRIMARY KEY (numero_CAX,doc_CLI,data)
);

CREATE TABLE TB_Vendeu (
	numero_CAX INT,
	doc_CLI VARCHAR(9),
	valor NUMERIC,
	data TIMESTAMP NOT NULL,
	PRIMARY KEY (numero_CAX,doc_CLI,data)
);

CREATE TABLE TB_Frequentou (
	doc_CLI VARCHAR(9),
	tin_FRA VARCHAR(10),
	data TIMESTAMP,
	PRIMARY KEY (doc_CLI,tin_FRA,data)
);

CREATE TABLE TB_Caixa (
	numero INT PRIMARY KEY,
	tin_FRA VARCHAR(10) NOT NULL
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

CREATE TABLE TB_Jogada (
	doc_CLI VARCHAR(9),
	snumber_MAQ INT,	-- Modificado serial->snumber ja que serial é um tipo do SQL
	nome_JGO VARCHAR(30),
	data TIMESTAMP,
	apostou NUMERIC NOT NULL,
	ganhou NUMERIC NOT NULL,
	PRIMARY KEY (doc_CLI,snumber_MAQ,data)
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

CREATE TABLE TB_Competiu (
	ID_PAR INT,
	doc_CLI VARCHAR(9),
	apostou NUMERIC NOT NULL,
	ganhou NUMERIC NOT NULL,
	PRIMARY KEY (ID_PAR,doc_CLI)
);

CREATE TABLE TB_Ganhou (
	ID_PAR INT,
	doc_CLI VARCHAR(9),
	PRIMARY KEY (ID_PAR,doc_CLI)
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
ALTER TABLE TB_ContatoPessoa ADD FOREIGN KEY (doc_PES) REFERENCES TB_Pessoa (doc);

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

		-- Valor minimo para transação de compra e venda
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
						EXECUTE PROCEDURE transacao_minima();

		CREATE TRIGGER checa_transacao_minima
			BEFORE INSERT OR UPDATE
				ON TB_Vendeu
					FOR EACH ROW
						EXECUTE PROCEDURE transacao_minima();

		-- Ao cadastrar um jogo em grupo, quantidade de jogadores minima nao pode ser maior do que a maxima
		DROP FUNCTION jogoEmGrupo_Min_Max() CASCADE;
		CREATE FUNCTION jogoEmGrupo_Min_Max()
			RETURNS trigger AS
				$BODY$
					DECLARE
					BEGIN
						IF NEW.jogadores_min > NEW.jogadores_max THEN
						RAISE EXCEPTION 'Transação não efetuada'
						      USING HINT = 'Qtd minima de jogadores não pode ser superior a máxima';
						END IF;

						RETURN NEW;
					END;
				$BODY$
			LANGUAGE plpgsql;

		CREATE TRIGGER checa_jogoEmGrupo_Min_Max
			BEFORE INSERT OR UPDATE
				ON TB_JogoEmGrupo
					FOR EACH ROW
						EXECUTE PROCEDURE jogoEmGrupo_Min_Max();

		-- Checa tipo do documento: SSN vs PP
		DROP FUNCTION tipo_documento() CASCADE;
		CREATE FUNCTION tipo_documento()
			RETURNS trigger AS
				$BODY$
					DECLARE
					BEGIN
						IF NEW.tipoDoc = 'RG' then
							IF char_length( NEW.doc ) != 9 THEN
								RAISE EXCEPTION 'Transação não efetuada'
								      USING HINT = 'SSN precisa ter 9 digitos';
							END IF;
						ELSE
							IF char_length( NEW.doc ) != 8 THEN
								RAISE EXCEPTION 'Transação não efetuada'
								      USING HINT = 'Numero de passaporte precisa ter 8 digitos';
							END IF;
						END IF;

						RETURN NEW;
					END;
				$BODY$
			LANGUAGE plpgsql;

		CREATE TRIGGER checa_transacao_minima
			BEFORE INSERT OR UPDATE
				ON TB_Pessoa
					FOR EACH ROW
						EXECUTE PROCEDURE tipo_documento();

		-- Checa se a quantidade de competidores de uma partida corresponde ao tipo de jogo
		DROP FUNCTION checa_competidores_qtd() CASCADE;
		CREATE FUNCTION checa_competidores_qtd()
			RETURNS trigger AS
				$BODY$
					DECLARE
						aux_competidores_qtd integer;
						aux_jogadores_max_qtd integer;
					BEGIN
						SELECT COUNT(*) INTO aux_competidores_qtd
						FROM TB_Competiu CPU
						WHERE CPU.ID_PAR = NEW.ID_PAR;

						SELECT 	JGG.jogadores_max
						INTO 	aux_jogadores_max_qtd
						FROM 	TB_JogoEmGrupo JGG , TB_Mesa MES , TB_Partida PAR
						WHERE 	PAR.ID = NEW.ID_PAR
						AND 	MES.numero = PAR.numero_MES
						AND	JGG.nome_JGO = MES.nome_JGG;

						IF aux_competidores_qtd >= aux_jogadores_max_qtd THEN
							RAISE EXCEPTION 'Transação não efetuada'
							      USING HINT = 'Numero de competidores alem do limite para o tipo de jogo.';
						END IF;

						RETURN NEW;
					END;
				$BODY$
			LANGUAGE plpgsql;

		CREATE TRIGGER checa_competidores_qtdMax
			BEFORE INSERT OR UPDATE
				ON TB_Competiu
					FOR EACH ROW
						EXECUTE PROCEDURE checa_competidores_qtd();




		-- Checa se a quantidade de ganhadores de uma partida corresponde ao tipo de jogo
		DROP FUNCTION checa_ganhadores() CASCADE;
		CREATE FUNCTION checa_ganhadores()
			RETURNS trigger AS
				$BODY$
					DECLARE
						aux_ganhadores_qtd integer;
						aux_competidores_qtd integer;
						aux_equipes_qtd integer;
					BEGIN
						SELECT COUNT(*) INTO aux_ganhadores_qtd
						FROM TB_Ganhou GAN
						WHERE GAN.ID_PAR = NEW.ID_PAR;

						SELECT COUNT(*) INTO aux_competidores_qtd
						FROM TB_Competiu CPU
						WHERE CPU.ID_PAR = NEW.ID_PAR;

						IF aux_ganhadores_qtd > aux_competidores_qtd THEN
							RAISE EXCEPTION 'Transação não efetuada'
							      USING HINT = 'Numero de ganhadores maior do que de participantes.';
						END IF;

						SELECT 	JGG.equipes
						INTO 	aux_equipes_qtd
						FROM 	TB_JogoEmGrupo JGG , TB_Mesa MES , TB_Partida PAR
						WHERE 	PAR.ID = NEW.ID_PAR
						AND 	MES.numero = PAR.numero_MES
						AND	JGG.nome_JGO = MES.nome_JGG;

						IF aux_equipes_qtd > 0 THEN
							IF aux_ganhadores_qtd > ( aux_competidores_qtd / aux_equipes_qtd ) THEN
								RAISE EXCEPTION 'Transação não efetuada'
								      USING HINT = 'Numero de ganhadores na equipe muito alto.';
							END IF;
						END IF;

						RETURN NEW;
					END;
				$BODY$
			LANGUAGE plpgsql;

		CREATE TRIGGER checa_transacao_minima
			BEFORE INSERT OR UPDATE
				ON TB_Ganhou
					FOR EACH ROW
						EXECUTE PROCEDURE checa_ganhadores();


						-- Pessoas
						INSERT INTO TB_Pessoa VALUES ('100000000' , 'Vito Corleone' , 'RG' , 'M' , '19720421' );
						INSERT INTO TB_Pessoa VALUES ('100000001' , 'Caesar Enrico' , 'RG' , 'M' , '19310812' );
						INSERT INTO TB_Pessoa VALUES ('100000002' , 'Johnny Strabler' , 'RG' , 'M' , '19530110' );
						INSERT INTO TB_Pessoa VALUES ('100000003' , 'Joe Krozac' , 'RG' , 'M' , '19370323' );
						INSERT INTO TB_Pessoa VALUES ('100000004' , 'Tony Montana' , 'RG' , 'M' , '19831121' );

						INSERT INTO TB_Pessoa VALUES ('90000001' , 'Al Capone' , 'PP' , 'M' , '19871217' );
						INSERT INTO TB_Pessoa VALUES ('90000002' , 'Tommy DeVito' , 'PP' , 'M' , '19901229' );
						INSERT INTO TB_Pessoa VALUES ('90000003' , 'Clemenza' , 'PP' , 'M' , '19930817' );
						INSERT INTO TB_Pessoa VALUES ('90000004' , 'Baby Face Nelson' , 'PP' , 'M' , '19980909' );
						INSERT INTO TB_Pessoa VALUES ('90000005' , 'Rocky Sullivan' , 'PP' , 'M' , '19980912' );

						INSERT INTO TB_Pessoa VALUES ('100000005' , 'Bonnie Parker' , 'RG' , 'F' , '19951021' );
						INSERT INTO TB_Pessoa VALUES ('100000006' , 'Elvira Hancock' , 'RG' , 'F' , '19920710' );
						INSERT INTO TB_Pessoa VALUES ('100000007' , 'Mia Wallace' , 'RG' , 'F' , '19960617' );
						INSERT INTO TB_Pessoa VALUES ('100000008' , 'Victoria' , 'RG' , 'F' , '19940307' );
						INSERT INTO TB_Pessoa VALUES ('100000009' , 'Grace Faraday' , 'RG' , 'F' , '19751127' );

						-- Contato Pessoas
						INSERT INTO TB_ContatoPessoa VALUES ( '100000000' , '12345600000000' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000000' , '12345600000001' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000001' , '12345600000002' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000002' , '12345600000003' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000002' , '12345600000004' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000003' , '12345600000005' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000004' , '12345600000006' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000005' , '12345600000007' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000005' , '12345600000008' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000006' , '12345600000009' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000007' , '12345600000010' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000008' , '12345600000011' );
						INSERT INTO TB_ContatoPessoa VALUES ( '100000009' , '12345600000012' );
						INSERT INTO TB_ContatoPessoa VALUES ( '90000001' , '12345600000100' );
						INSERT INTO TB_ContatoPessoa VALUES ( '90000002' , '12345600000101' );
						INSERT INTO TB_ContatoPessoa VALUES ( '90000002' , '12345600000102' );
						INSERT INTO TB_ContatoPessoa VALUES ( '90000003' , '12345600000103' );
						INSERT INTO TB_ContatoPessoa VALUES ( '90000004' , '12345600000104' );
						INSERT INTO TB_ContatoPessoa VALUES ( '90000005' , '12345600000105' );

						-- Funcionarios
						INSERT INTO TB_Funcionario ( doc_PES ) VALUES ('90000003');
						INSERT INTO TB_Funcionario ( doc_PES ) VALUES ('100000001');
						INSERT INTO TB_Funcionario ( doc_PES ) VALUES ('100000009');

						-- Clientes
						INSERT INTO TB_Cliente VALUES ('100000000' , 'Don Corleone' );
						INSERT INTO TB_Cliente VALUES ('100000002' , NULL );
						INSERT INTO TB_Cliente VALUES ('100000003' , NULL );
						INSERT INTO TB_Cliente VALUES ('100000004' , 'Tony Scarface' );
						INSERT INTO TB_Cliente VALUES ('90000001' , NULL );
						INSERT INTO TB_Cliente VALUES ('90000002' , NULL );
						INSERT INTO TB_Cliente VALUES ('90000004' , NULL );
						INSERT INTO TB_Cliente VALUES ('90000005' , NULL );
						INSERT INTO TB_Cliente VALUES ('100000005' , NULL );
						INSERT INTO TB_Cliente VALUES ('100000006' , NULL );
						INSERT INTO TB_Cliente VALUES ('100000007' , NULL );
						INSERT INTO TB_Cliente VALUES ('100000008' , NULL );

						-- Jogos
						INSERT INTO TB_Jogo VALUES ( 'Slot' , 1 );
						INSERT INTO TB_Jogo VALUES ( 'Keno' , 2 );
						INSERT INTO TB_Jogo VALUES ( 'Pai Gow Poker' , 10 );
						INSERT INTO TB_Jogo VALUES ( 'Black Jack' , 7 );
						INSERT INTO TB_Jogo VALUES ( 'Bingo' , 16 );
						INSERT INTO TB_Jogo VALUES ( 'Baccarat' , 7 );
						INSERT INTO TB_Jogo VALUES ( 'Wheel of Fortune' , 3 );
						INSERT INTO TB_Jogo VALUES ( 'Roulette' , 4 );
						INSERT INTO TB_Jogo VALUES ( 'Poker' , 20 );
						INSERT INTO TB_Jogo VALUES ( 'Buraco' , 15 );
						INSERT INTO TB_Jogo VALUES ( 'Truco' , 13 );
						INSERT INTO TB_Jogo VALUES ( 'Canasta' , 19 );
						INSERT INTO TB_Jogo VALUES ( 'Sueca' , 24 );
						INSERT INTO TB_Jogo VALUES ( 'Cerco' , 60 );

						-- Jogos individuais
						INSERT INTO TB_JogoIndividual VALUES ( 'Slot' );
						INSERT INTO TB_JogoIndividual VALUES ( 'Keno' );
						INSERT INTO TB_JogoIndividual VALUES ( 'Pai Gow Poker' );
						INSERT INTO TB_JogoIndividual VALUES ( 'Black Jack' );

						-- Jogos em grupo
						INSERT INTO TB_JogoEmGrupo VALUES ( 'Bingo' , 2 , 100 , 0 );
						INSERT INTO TB_JogoEmGrupo VALUES ( 'Baccarat' , 2 , 2 , 2 );
						INSERT INTO TB_JogoEmGrupo VALUES ( 'Wheel of Fortune' , 4 , 10 , 0 );
						INSERT INTO TB_JogoEmGrupo VALUES ( 'Roulette' , 2 , 6 , 0 );
						INSERT INTO TB_JogoEmGrupo VALUES ( 'Poker' , 2 , 10 , 0 );
						INSERT INTO TB_JogoEmGrupo VALUES ( 'Buraco' , 4 , 4 , 2 );
						INSERT INTO TB_JogoEmGrupo VALUES ( 'Truco' , 4 , 8 , 2 );
						INSERT INTO TB_JogoEmGrupo VALUES ( 'Canasta' , 2 , 6 , 2 );
						INSERT INTO TB_JogoEmGrupo VALUES ( 'Sueca' , 4 , 4 , 2 );
						INSERT INTO TB_JogoEmGrupo VALUES ( 'Cerco' , 2 , 12 , 4 );

						-- Franquias
						INSERT INTO TB_Franquia VALUES ('700600500' , 'Magnatas' , 'Rua X, Numero 10' );
						INSERT INTO TB_Franquia VALUES ('700600501' , 'Tangiers' , 'Rua X, Numero 97' );
						INSERT INTO TB_Franquia VALUES ('700600502' , 'The Cooler' , 'Rua Y, Numero 1023' );

						-- Contato Franquina
						INSERT INTO TB_ContatoFranquia VALUES ( '700600500' , '12345600001000' );
						INSERT INTO TB_ContatoFranquia VALUES ( '700600500' , '12345600001001' );
						INSERT INTO TB_ContatoFranquia VALUES ( '700600500' , '12345600001002' );
						INSERT INTO TB_ContatoFranquia VALUES ( '700600500' , '12345600001003' );
						INSERT INTO TB_ContatoFranquia VALUES ( '700600500' , '12345600001004' );
						INSERT INTO TB_ContatoFranquia VALUES ( '700600500' , '12345600001005' );

						INSERT INTO TB_ContatoFranquia VALUES ( '700600501' , '12345607001055' );
						INSERT INTO TB_ContatoFranquia VALUES ( '700600501' , '12345607001056' );
						INSERT INTO TB_ContatoFranquia VALUES ( '700600501' , '12345607001057' );
						INSERT INTO TB_ContatoFranquia VALUES ( '700600501' , '12345607001058' );

						INSERT INTO TB_ContatoFranquia VALUES ( '700600502' , '12345609001075' );
						INSERT INTO TB_ContatoFranquia VALUES ( '700600502' , '12345609001095' );

						-- Patrimonio - Caixa
						INSERT INTO TB_Caixa VALUES ( 3000 , '700600500' );
						INSERT INTO TB_Caixa VALUES ( 3001 , '700600500' );
						INSERT INTO TB_Caixa VALUES ( 3002 , '700600500' );
						INSERT INTO TB_Caixa VALUES ( 3003 , '700600500' );
						INSERT INTO TB_Caixa VALUES ( 3004 , '700600500' );
						INSERT INTO TB_Caixa VALUES ( 3005 , '700600500' );
						INSERT INTO TB_Caixa VALUES ( 3006 , '700600501' );
						INSERT INTO TB_Caixa VALUES ( 3007 , '700600501' );
						INSERT INTO TB_Caixa VALUES ( 3008 , '700600501' );
						INSERT INTO TB_Caixa VALUES ( 3009 , '700600501' );
						INSERT INTO TB_Caixa VALUES ( 3010 , '700600502' );

						--  Mesa
						INSERT INTO TB_Mesa VALUES ( 90000 , 'Roulette' , '700600500' );
						INSERT INTO TB_Mesa VALUES ( 90001 , 'Roulette' , '700600500' );
						INSERT INTO TB_Mesa VALUES ( 90002 , 'Roulette' , '700600500' );
						INSERT INTO TB_Mesa VALUES ( 90003 , 'Poker' , '700600500' );
						INSERT INTO TB_Mesa VALUES ( 90004 , 'Poker' , '700600500' );
						INSERT INTO TB_Mesa VALUES ( 90005 , 'Poker' , '700600500' );
						INSERT INTO TB_Mesa VALUES ( 90006 , 'Poker' , '700600500' );
						INSERT INTO TB_Mesa VALUES ( 90007 , 'Poker' , '700600500' );
						INSERT INTO TB_Mesa VALUES ( 90008 , 'Poker' , '700600500' );
						INSERT INTO TB_Mesa VALUES ( 90009 , 'Poker' , '700600500' );
						INSERT INTO TB_Mesa VALUES ( 90010 , 'Poker' , '700600500' );
						INSERT INTO TB_Mesa VALUES ( 90011 , 'Poker' , '700600500' );

						INSERT INTO TB_Mesa VALUES ( 91000 , 'Bingo' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91001 , 'Bingo' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91002 , 'Baccarat' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91003 , 'Baccarat' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91004 , 'Wheel of Fortune' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91005 , 'Wheel of Fortune' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91006 , 'Roulette' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91007 , 'Roulette' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91008 , 'Poker' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91009 , 'Poker' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91010 , 'Buraco' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91011 , 'Buraco' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91012 , 'Truco' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91013 , 'Truco' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91014 , 'Canasta' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91015 , 'Canasta' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91016 , 'Sueca' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91017 , 'Sueca' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91018 , 'Sueca' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91019 , 'Cerco' , '700600501' );
						INSERT INTO TB_Mesa VALUES ( 91020 , 'Cerco' , '700600501' );

						INSERT INTO TB_Mesa VALUES ( 92000 , 'Bingo' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92001 , 'Bingo' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92002 , 'Bingo' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92003 , 'Bingo' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92004 , 'Wheel of Fortune' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92005 , 'Roulette' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92006 , 'Roulette' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92007 , 'Roulette' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92008 , 'Roulette' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92009 , 'Roulette' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92010 , 'Poker' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92011 , 'Poker' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92012 , 'Poker' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92013 , 'Poker' , '700600502' );
						INSERT INTO TB_Mesa VALUES ( 92014 , 'Poker' , '700600502' );

						--  Maquinas
						INSERT INTO TB_Maquina VALUES ( 2000 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2001 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2002 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2003 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2004 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2005 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2006 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2007 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2008 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2009 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2010 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2011 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2012 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2013 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2014 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2015 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2016 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2017 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2018 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2019 , '700600500' );
						INSERT INTO TB_Maquina VALUES ( 2020 , '700600500' );

						INSERT INTO TB_Maquina VALUES ( 2100 , '700600501' );
						INSERT INTO TB_Maquina VALUES ( 2101 , '700600501' );
						INSERT INTO TB_Maquina VALUES ( 2102 , '700600501' );
						INSERT INTO TB_Maquina VALUES ( 2103 , '700600501' );
						INSERT INTO TB_Maquina VALUES ( 2104 , '700600501' );
						INSERT INTO TB_Maquina VALUES ( 2105 , '700600501' );
						INSERT INTO TB_Maquina VALUES ( 2106 , '700600501' );
						INSERT INTO TB_Maquina VALUES ( 2107 , '700600501' );
						INSERT INTO TB_Maquina VALUES ( 2108 , '700600501' );
						INSERT INTO TB_Maquina VALUES ( 2109 , '700600501' );
						INSERT INTO TB_Maquina VALUES ( 2110 , '700600501' );

						-- Jogos que as maquinas oferecem
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2000 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2001 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2002 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2003 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2004 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2005 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2006 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2007 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2008 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2009 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2010 );
						INSERT INTO TB_Oferece VALUES ( 'Keno' , 2011 );
						INSERT INTO TB_Oferece VALUES ( 'Pai Gow Poker' , 2011 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2011 );
						INSERT INTO TB_Oferece VALUES ( 'Keno' , 2012 );
						INSERT INTO TB_Oferece VALUES ( 'Pai Gow Poker' , 2012 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2012 );
						INSERT INTO TB_Oferece VALUES ( 'Keno' , 2013 );
						INSERT INTO TB_Oferece VALUES ( 'Pai Gow Poker' , 2013 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2013 );
						INSERT INTO TB_Oferece VALUES ( 'Keno' , 2014 );
						INSERT INTO TB_Oferece VALUES ( 'Pai Gow Poker' , 2014 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2014 );
						INSERT INTO TB_Oferece VALUES ( 'Keno' , 2015 );
						INSERT INTO TB_Oferece VALUES ( 'Pai Gow Poker' , 2015 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2015 );
						INSERT INTO TB_Oferece VALUES ( 'Keno' , 2016 );
						INSERT INTO TB_Oferece VALUES ( 'Pai Gow Poker' , 2016 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2016 );
						INSERT INTO TB_Oferece VALUES ( 'Keno' , 2017 );
						INSERT INTO TB_Oferece VALUES ( 'Pai Gow Poker' , 2017 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2017 );
						INSERT INTO TB_Oferece VALUES ( 'Keno' , 2018 );
						INSERT INTO TB_Oferece VALUES ( 'Pai Gow Poker' , 2018 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2018 );
						INSERT INTO TB_Oferece VALUES ( 'Keno' , 2019 );
						INSERT INTO TB_Oferece VALUES ( 'Pai Gow Poker' , 2019 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2019 );
						INSERT INTO TB_Oferece VALUES ( 'Keno' , 2020 );
						INSERT INTO TB_Oferece VALUES ( 'Pai Gow Poker' , 2020 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2020 );

						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2100 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2101 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2102 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2103 );
						INSERT INTO TB_Oferece VALUES ( 'Slot' , 2104 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2105 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2106 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2107 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2108 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2109 );
						INSERT INTO TB_Oferece VALUES ( 'Black Jack' , 2110 );

						-- Trocas, partidas, vendas, compras...

						-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
						-- FREQUENCIAS
						-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20010506' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600501' , TO_DATE('20021102' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600501' , TO_DATE('20010502' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600501' , TO_DATE('20021104' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600502' , TO_DATE('20010503' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20010504' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600501' , TO_DATE('20021101' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20010505' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600501' , TO_DATE('20021102' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600500' , TO_DATE('20010504' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600501' , TO_DATE('20010502' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600500' , TO_DATE('20010505' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600502' , TO_DATE('20010510' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600502' , TO_DATE('20010511' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600501' , TO_DATE('20021104' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600502' , TO_DATE('20010503' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600501' , TO_DATE('20021101' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600500' , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600502' , TO_DATE('20010510' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600502' , TO_DATE('20010511' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600501' , TO_DATE('20010502' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600500' , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600501' , TO_DATE('20021104' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600502' , TO_DATE('20010503' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600501' , TO_DATE('20021102' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600500' , TO_DATE('20010504' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600500' , TO_DATE('20010505' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600501' , TO_DATE('20021101' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600500' , TO_DATE('20010504' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600500' , TO_DATE('20010505' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600500' , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600502' , TO_DATE('20010512' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600502' , TO_DATE('20010503' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600501' , TO_DATE('20010502' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600502' , TO_DATE('20010511' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600501' , TO_DATE('20021101' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600500' , TO_DATE('20010506' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600502' , TO_DATE('20010510' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600501' , TO_DATE('20010602' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600501' , TO_DATE('20010507' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600500' , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600500' , TO_DATE('20010601' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600502' , TO_DATE('20010603' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600502' , TO_DATE('20010508' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600500' , TO_DATE('20010505' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600502' , TO_DATE('20010513' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600501' , TO_DATE('20021101' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600502' , TO_DATE('20010503' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600500' , TO_DATE('20010504' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600501' , TO_DATE('20010502' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600502' , TO_DATE('20010509' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600502' , TO_DATE('20010513' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600500' , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600501' , TO_DATE('20010502' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600502' , TO_DATE('20010503' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600500' , TO_DATE('20010504' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600500' , TO_DATE('20010505' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600500' , TO_DATE('20010506' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600501' , TO_DATE('20010507' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600502' , TO_DATE('20010508' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600502' , TO_DATE('20010509' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600502' , TO_DATE('20010510' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600502' , TO_DATE('20010511' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600502' , TO_DATE('20010512' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600500' , TO_DATE('20010601' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600501' , TO_DATE('20010602' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600501' , TO_DATE('20021102' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600501' , TO_DATE('20021104' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600502' , TO_DATE('20010512' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600501' , TO_DATE('20021102' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600500' , TO_DATE('20010504' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600502' , TO_DATE('20010508' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600501' , TO_DATE('20010507' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600502' , TO_DATE('20010513' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600500' , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600501' , TO_DATE('20010502' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600501' , TO_DATE('20021104' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600500' , TO_DATE('20010506' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600500' , TO_DATE('20010601' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600502' , TO_DATE('20010503' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600500' , TO_DATE('20010505' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600502' , TO_DATE('20010509' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600501' , TO_DATE('20021101' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600500' , TO_DATE('20010504' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600501' , TO_DATE('20010502' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600501' , TO_DATE('20021102' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600501' , TO_DATE('20010507' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600502' , TO_DATE('20010512' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600502' , TO_DATE('20010509' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600500' , TO_DATE('20010505' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600502' , TO_DATE('20010508' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600500' , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600501' , TO_DATE('20021104' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600502' , TO_DATE('20010503' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600502' , TO_DATE('20010513' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600501' , TO_DATE('20010602' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600502' , TO_DATE('20010603' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600500' , TO_DATE('20010601' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600500' , TO_DATE('20010506' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600500' , TO_DATE('20010505' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600500' , TO_DATE('20010504' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600501' , TO_DATE('20021101' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600502' , TO_DATE('20010503' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600501' , TO_DATE('20010502' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600500' , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000001' , '700600502' , TO_DATE('20010513' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000002' , '700600500' , TO_DATE('20010601' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000002' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000002' , '700600502' , TO_DATE('20010513' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000002' , '700600500' , TO_DATE('20010505' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000002' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000002' , '700600500' , TO_DATE('20010504' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000002' , '700600500' , TO_DATE('20010506' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000002' , '700600502' , TO_DATE('20010503' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000002' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000002' , '700600501' , TO_DATE('20010502' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000002' , '700600500' , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000004' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000004' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000004' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000004' , '700600502' , TO_DATE('20010513' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000005' , '700600502' , TO_DATE('20010513' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000005' , '700600501' , TO_DATE('20010701' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000005' , '700600502' , TO_DATE('20010702' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000005' , '700600501' , TO_DATE('20010602' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000005' , '700600501' , TO_DATE('20021103' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('90000005' , '700600500' , TO_DATE('20010601' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20021003' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20021004' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20021005' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20021006' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20021007' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20021002' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20021008' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000000' , '700600500' , TO_DATE('20021001' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600500' , TO_DATE('20021002' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600500' , TO_DATE('20021008' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600501' , TO_DATE('20021003' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600501' , TO_DATE('20021001' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600500' , TO_DATE('20021005' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000002' , '700600500' , TO_DATE('20021001' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600500' , TO_DATE('20021002' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600500' , TO_DATE('20021004' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600500' , TO_DATE('20021001' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600500' , TO_DATE('20021003' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600500' , TO_DATE('20021008' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000003' , '700600501' , TO_DATE('20021008' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600500' , TO_DATE('20021001' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600501' , TO_DATE('20021008' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600500' , TO_DATE('20021003' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600500' , TO_DATE('20021004' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000004' , '700600500' , TO_DATE('20021008' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600500' , TO_DATE('20021005' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600500' , TO_DATE('20021004' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600500' , TO_DATE('20021002' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000005' , '700600500' , TO_DATE('20021009' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600501' , TO_DATE('20021004' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600500' , TO_DATE('20021003' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600501' , TO_DATE('20021006' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000006' , '700600500' , TO_DATE('20021008' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600500' , TO_DATE('20021002' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600501' , TO_DATE('20021002' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600500' , TO_DATE('20021003' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600500' , TO_DATE('20021008' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600500' , TO_DATE('20021005' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000007' , '700600501' , TO_DATE('20021003' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600500' , TO_DATE('20021005' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600500' , TO_DATE('20021008' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600500' , TO_DATE('20021003' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600500' , TO_DATE('20021007' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600500' , TO_DATE('20021001' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600501' , TO_DATE('20021002' , 'YYYYMMDD') );
						INSERT INTO TB_Frequentou VALUES ('100000008' , '700600501' , TO_DATE('20021008' , 'YYYYMMDD') );


						-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
						-- COMPRAS E VENDAS
						-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3000 , '100000000' , 50000 , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3001 , '100000002' , 60000 , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3002 , '100000003' , 5537000 , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3003 , '100000004' , 55000 , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3004 , '100000005' , 72000 , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3005 , '100000006' , 901000 , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3002 , '100000007' , 19864500 , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3003 , '100000008' , 13873500 , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3004 , '90000001' , 15937000 , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3001 , '90000002' , 14100500 , TO_DATE('20010501' , 'YYYYMMDD') );
						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3010 , '90000004' , 4182000 , TO_DATE('20010513' , 'YYYYMMDD') );
						INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3010 , '90000005' , 6273000 , TO_DATE('20010513' , 'YYYYMMDD') );

						INSERT INTO TB_Vendeu ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3004 , '100000004' , 10000000 , TO_DATE('20021008' , 'YYYYMMDD') );
						INSERT INTO TB_Vendeu ( numero_CAX , doc_CLI , valor , data )  VALUES ( 3007 , '100000005' , 4581000 , TO_DATE('20021103' , 'YYYYMMDD') );


						-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
						-- PARTIDAS
						-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

						-- POKER 01
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 90008 , TO_DATE('20010501','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000004' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000005' );
						END$$;

						-- POKER 02
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 91008 , TO_DATE('20010502','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 30000 , 60000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 30000 , 60000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 30000 , 60000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000004' , 30000 , 60000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 30000 , 60000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 30000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 30000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 30000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 30000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 30000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000004' );
						END$$;


						-- POKER 03
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 92011 , TO_DATE('20010503','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 30000 , 60000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 30000 , 60000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 30000 , 60000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000004' , 30000 , 60000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 30000 , 60000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 30000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 30000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 30000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 30000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 30000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000004' );
						END$$;


						-- POKER 04
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 90007 , TO_DATE('20010504','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000004' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000002' );
						END$$;


						-- POKER 05
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 90011  , TO_DATE('20010505','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000004' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000004' );
						END$$;

						-- POKER 06
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 90010   , TO_DATE('20010506','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000005' );
						END$$;

						-- POKER 07
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 91009 , TO_DATE('20010507','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000006' );
						END$$;

						-- POKER 08
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 92010 , TO_DATE('20010508','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000006' );
						END$$;

						-- POKER 09
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 92011 , TO_DATE('20010509','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000005' );
						END$$;

						-- POKER 10
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 92012 , TO_DATE('20010510','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000006' );
						END$$;

						-- POKER 11
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 92012 , TO_DATE('20010511','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000004' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000004' );
						END$$;

						-- POKER 12
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 92013 , TO_DATE('20010512','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000004' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000008' );
						END$$;

						-- POKER 13
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 92014 , TO_DATE('20010513','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000005' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000004' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000007' );
						END$$;

						-- Roulette 01
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 90000  , TO_DATE('20010601','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000005' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000005' );
						END$$;

						-- Roulette 02
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 91007 , TO_DATE('20010602','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000005' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000006' );
						END$$;

						-- Roulette 03
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 92007 , TO_DATE('20010603','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000005' );
						END$$;

						-- Bingo 01
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 91000 , TO_DATE('20010701','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000004' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 120000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000004' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000005' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000006' );
						END$$;

						-- Bingo 02
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 92002 , TO_DATE('20010702','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000004' , 10000 , 120000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000004' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000005' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000004' );
						END$$;

						-- Wheel of Fortune
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 91004 , TO_DATE('20021101','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 70000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000004' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000003' );
						END$$;

						-- Buraco
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 91010 , TO_DATE('20021102','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000000' );
							INSERT INTO TB_Ganhou VALUES ( t_id , '100000008' );
						END$$;

						-- Truco
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 91012 , TO_DATE('20021102','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 20000 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000000' );
							INSERT INTO TB_Ganhou VALUES ( t_id , '100000008' );
							INSERT INTO TB_Ganhou VALUES ( t_id , '100000006' );
						END$$;

						-- Canasta
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 91014 , TO_DATE('20021104','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 20000 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000000' );
							INSERT INTO TB_Ganhou VALUES ( t_id , '100000008' );
							INSERT INTO TB_Ganhou VALUES ( t_id , '100000006' );
						END$$;

						-- Sueca
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 91016 , TO_DATE('20021104','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 20000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 20000 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000000' );
							INSERT INTO TB_Ganhou VALUES ( t_id , '100000006' );
						END$$;

						-- Cerco
						DO $$
						DECLARE
							t_id TB_Partida.ID%TYPE;
						BEGIN
							INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000009' , 91019 , TO_DATE('20021103','YYYYMMDD') )
							  RETURNING TB_Partida.ID INTO t_id;

							INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000003' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000004' , 10000 , 40000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000005' , 10000 , 40000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000006' , 10000 , 40000 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000007' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '100000008' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000004' , 10000 , 0 );
							INSERT INTO TB_Competiu VALUES ( t_id , '90000005' , 10000 , 0 );

							INSERT INTO TB_Ganhou VALUES ( t_id , '100000004' );
							INSERT INTO TB_Ganhou VALUES ( t_id , '100000005' );
							INSERT INTO TB_Ganhou VALUES ( t_id , '100000006' );
						END$$;

						-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

						-- JOGOS INDIVIDUAIS

						-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

						-- Slot 01
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000000' , 2000  , 'Slot' , TO_DATE('20021001','YYYYMMDD') , 10000 , 0 );

						-- Slot 02
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000000' , 2000  , 'Slot' , TO_DATE('20021002','YYYYMMDD') , 10000 , 0 );

						-- Slot 03
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000000' , 2000  , 'Slot' , TO_DATE('20021003','YYYYMMDD') , 10000 , 0 );

						-- Slot 04
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000000' , 2000  , 'Slot' , TO_DATE('20021004','YYYYMMDD') , 10000 , 0 );

						-- Slot 05
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000000' , 2000  , 'Slot' , TO_DATE('20021005','YYYYMMDD') , 10000 , 0 );

						-- Slot 06
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000000' , 2000  , 'Slot' , TO_DATE('20021006','YYYYMMDD') , 10000 , 0 );

						-- Slot 07
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000000' , 2000  , 'Slot' , TO_DATE('20021007','YYYYMMDD') , 10000 , 0 );

						-- Slot 08
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000000' , 2000  , 'Slot' , TO_DATE('20021008','YYYYMMDD') , 90000 , 80000 );

						-- Slot 09
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000002' , 2000  , 'Slot' , TO_DATE('20021008','YYYYMMDD') , 15000 , 1000 );

						-- Slot 10
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000004' , 2000  , 'Slot' , TO_DATE('20021008','YYYYMMDD') , 14000 , 5000 );

						-- Slot 11
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000006' , 2000  , 'Slot' , TO_DATE('20021008','YYYYMMDD') , 17000 , 3000 );

						-- Slot 12
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000007' , 2000  , 'Slot' , TO_DATE('20021008','YYYYMMDD') , 19000 , 50000 );

						-- Slot 13
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000008' , 2000 , 'Slot' , TO_DATE('20021008','YYYYMMDD') , 19000 , 20000 );

						-- Slot 14
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000002' , 2001 , 'Slot' , TO_DATE('20021001','YYYYMMDD') , 11000 , 100 );

						-- Slot 15
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2002 , 'Slot' , TO_DATE('20021002','YYYYMMDD') , 19000 , 13300 );

						-- Slot 16
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000004' , 2002 , 'Slot' , TO_DATE('20021001','YYYYMMDD') , 30000 , 7000 );

						-- Slot 17
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000004' , 2003 , 'Slot' , TO_DATE('20021001','YYYYMMDD') , 30000 , 7000 );

						-- Slot 18
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000007' , 2004 , 'Slot' , TO_DATE('20021002','YYYYMMDD') , 10000 , 30000 );

						-- Slot 19
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000008' , 2005 , 'Slot' , TO_DATE('20021001','YYYYMMDD') , 30000 , 10000 );

						-- Slot 20
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000006' , 2006 , 'Slot' , TO_DATE('20021003','YYYYMMDD') , 60000 , 10000 );

						-- Slot 21
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000005' , 2007 , 'Slot' , TO_DATE('20021002','YYYYMMDD') , 60000 , 10000 );

						-- Slot 22
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000004' , 2007 , 'Slot' , TO_DATE('20021004','YYYYMMDD') , 10000 , 10000 );

						-- Slot 23
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2008 , 'Slot' , TO_DATE('20021004','YYYYMMDD') , 30000 , 90000 );

						-- Slot 24
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2009 , 'Slot' , TO_DATE('20021004','YYYYMMDD') , 30000 , 90000 );

						-- Slot 25
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2010 , 'Slot' , TO_DATE('20021002','YYYYMMDD') , 30000 , 20000 );

						-- Maq Generica
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000008' , 2011 , 'Keno' , TO_DATE('20021003','YYYYMMDD') , 10000 , 40000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000004' , 2011 , 'Pai Gow Poker' , TO_DATE('20021003','YYYYMMDD') , 70000 , 40000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000002' , 2011 , 'Black Jack' , TO_DATE('20021005','YYYYMMDD') , 20000 , 30000 );

						-- Maq Generica
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2012 , 'Keno' , TO_DATE('20021001','YYYYMMDD') , 10000 , 30000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000005' , 2012 , 'Pai Gow Poker' , TO_DATE('20021004','YYYYMMDD') , 10000 , 20000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000007' , 2012 , 'Black Jack' , TO_DATE('20021002','YYYYMMDD') , 70000 , 40000 );

						-- Maq Generica
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000002' , 2013 , 'Keno' , TO_DATE('20021002','YYYYMMDD') , 20000 , 10000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2013 , 'Pai Gow Poker' , TO_DATE('20021003','YYYYMMDD') , 70000 , 90000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000008' , 2013 , 'Black Jack' , TO_DATE('20021007','YYYYMMDD') , 30000 , 20000 );

						-- Maq Generica
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2014 , 'Keno' , TO_DATE('20021004','YYYYMMDD') , 50000 , 10000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000007' , 2014 , 'Pai Gow Poker' , TO_DATE('20021002','YYYYMMDD') , 20000 , 30000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000005' , 2014 , 'Black Jack' , TO_DATE('20021009','YYYYMMDD') , 35000 , 30000 );

						-- Maq Generica
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000000' , 2015 , 'Keno' , TO_DATE('20021001','YYYYMMDD') , 70000 , 20000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000002' , 2015 , 'Pai Gow Poker' , TO_DATE('20021005','YYYYMMDD') , 50000 , 10000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2015 , 'Black Jack' , TO_DATE('20021003','YYYYMMDD') , 15000 , 60000 );

						-- Maq Generica
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000004' , 2016 , 'Keno' , TO_DATE('20021001','YYYYMMDD') , 30000 , 70000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000005' , 2016 , 'Pai Gow Poker' , TO_DATE('20021005','YYYYMMDD') , 80000 , 40000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000006' , 2016 , 'Black Jack' , TO_DATE('20021003','YYYYMMDD') , 35000 , 50000 );

						-- Maq Generica
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000007' , 2017 , 'Keno' , TO_DATE('20021002','YYYYMMDD') , 50000 , 30000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000008' , 2017 , 'Pai Gow Poker' , TO_DATE('20021003','YYYYMMDD') , 60000 , 40000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000004' , 2017 , 'Black Jack' , TO_DATE('20021001','YYYYMMDD') , 35000 , 90000 );

						-- Maq Generica
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2018 , 'Keno' , TO_DATE('20021008','YYYYMMDD') , 51000 , 60000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000002' , 2018 , 'Pai Gow Poker' , TO_DATE('20021005','YYYYMMDD') , 50000 , 30000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000007' , 2018 , 'Black Jack' , TO_DATE('20021003','YYYYMMDD') , 75000 , 20000 );

						-- Maq Generica
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000002' , 2019 , 'Keno' , TO_DATE('20021008','YYYYMMDD') , 83000 , 40000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000008' , 2019 , 'Pai Gow Poker' , TO_DATE('20021005','YYYYMMDD') , 57000 , 20000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000006' , 2019 , 'Black Jack' , TO_DATE('20021003','YYYYMMDD') , 45000 , 10000 );

						-- Maq Generica
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2020 , 'Keno' , TO_DATE('20021008','YYYYMMDD') , 23000 , 30000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000007' , 2020 , 'Pai Gow Poker' , TO_DATE('20021005','YYYYMMDD') , 37000 , 50000 );

						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2020 , 'Black Jack' , TO_DATE('20021003','YYYYMMDD') , 25000 , 20000 );

						-- Slot P2 01
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000004' , 2100  , 'Slot' , TO_DATE('20021008','YYYYMMDD') , 14000 , 5000 );

						-- Slot P2 02
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000006' , 2101  , 'Slot' , TO_DATE('20021004','YYYYMMDD') , 27000 , 3000 );

						-- Slot P2 03
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000007' , 2102  , 'Slot' , TO_DATE('20021003','YYYYMMDD') , 19000 , 10000 );

						-- Slot P2 04
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000008' , 2103 , 'Slot' , TO_DATE('20021002','YYYYMMDD') , 49000 , 20000 );

						-- Slot P2 05
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000002' , 2104 , 'Slot' , TO_DATE('20021001','YYYYMMDD') , 31000 , 1100 );

						-- Black Jack P2 01
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000006' , 2105  , 'Black Jack' , TO_DATE('20021006','YYYYMMDD') , 14000 , 41000 );

						-- Black Jack P2 02
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000007' , 2105  , 'Black Jack' , TO_DATE('20021002','YYYYMMDD') , 14000 , 71000 );

						-- Black Jack P2 03
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000002' , 2105  , 'Black Jack' , TO_DATE('20021003','YYYYMMDD') , 41000 , 4000 );

						-- Black Jack P2 04
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000003' , 2105  , 'Black Jack' , TO_DATE('20021008','YYYYMMDD') , 62000 , 71000 );

						-- Black Jack P2 05
						INSERT INTO TB_Jogada ( doc_CLI , snumber_MAQ , nome_JGO , data , apostou , ganhou )
						VALUES ('100000008' , 2105  , 'Black Jack' , TO_DATE('20021008','YYYYMMDD') , 12000 , 5000 );
