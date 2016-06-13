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
				
	
