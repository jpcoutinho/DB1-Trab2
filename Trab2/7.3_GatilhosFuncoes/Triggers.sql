-- Functions And Triggers
SET SCHEMA 'trab2teste';

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
