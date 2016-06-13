SET SCHEMA 'trab2teste';

-- Testa transacao_minima()
-- OK
INSERT INTO TB_Comprou VALUES( 3000 , 100000000 , 90000 , TO_DATE('19610120','YYYYMMDD') );
INSERT INTO TB_Vendeu VALUES( 3000 , 100000000 , 80000 , TO_DATE('19610120','YYYYMMDD') );
-- ERROR
INSERT INTO TB_Comprou VALUES( 3000 , 100000000 , 10000 , TO_DATE('19610120','YYYYMMDD') );
INSERT INTO TB_Vendeu VALUES( 3000 , 100000000 , 20000 , TO_DATE('19610120','YYYYMMDD') );


-- Testa comprimento do documento
-- OK
INSERT INTO TB_Pessoa VALUES ('123456789' , 'Pessoa Teste 1' , 'RG' , 'M' , '19720421' );
INSERT INTO TB_Pessoa VALUES ('12345678' , 'Pessoa Teste 2' , 'PP' , 'M' , '19720421' );
-- ERROR MENOR
INSERT INTO TB_Pessoa VALUES ('12345678' , 'Pessoa Teste 1' , 'RG' , 'M' , '19720421' );
INSERT INTO TB_Pessoa VALUES ('1234567' , 'Pessoa Teste 2' , 'PP' , 'M' , '19720421' );
-- ERROR MAIOR
INSERT INTO TB_Pessoa VALUES ('1234567890' , 'Pessoa Teste 1' , 'RG' , 'M' , '19720421' );
INSERT INTO TB_Pessoa VALUES ('123456789' , 'Pessoa Teste 2' , 'PP' , 'M' , '19720421' );


-- Testa integridade de uma partida
-- Preparativos
-- Partida 1
-- t_id TB_Partida.ID%TYPE;
-- INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 91008 , TO_DATE('19610120','YYYYMMDD') )
--  RETURNING ID INTO t_id;
-- INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 20000 );

