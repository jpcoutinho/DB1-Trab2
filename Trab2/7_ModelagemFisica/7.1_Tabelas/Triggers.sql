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
		ON TB_Comprou TB_Comprou
			FOR EACH ROW
				EXECUTE PROCEDURE transacao_minima()
		
CREATE TRIGGER checa_transacao_minima
	BEFORE INSERT OR UPDATE
		ON TB_Comprou TB_Vendeu
			FOR EACH ROW
				EXECUTE PROCEDURE transacao_minima()
