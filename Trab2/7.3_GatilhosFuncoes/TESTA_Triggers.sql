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


-- Testa quantidade de competidores ( partida de poker )
-- OK, quantidade de competidores dentro do limite maximo do poker
DO $$
DECLARE 
	t_id TB_Partida.ID%TYPE;
BEGIN
	INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 91008 , TO_DATE('19610120','YYYYMMDD') )
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
END$$;

-- ERRO, quantidade de competidores ACIMA do limite maximo do poker
DO $$
DECLARE 
	t_id TB_Partida.ID%TYPE;
BEGIN
	INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 91008 , TO_DATE('19610121','YYYYMMDD') )
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
	INSERT INTO TB_Competiu VALUES ( t_id , '90000004' , 10000 , 0 );
END$$;



-- Testa quantidade de ganhadores ( partida de buraco )
-- OK, quantidade de ganhadores dentro do limite maximo do buraco ( 2 )
DO $$
DECLARE 
	t_id TB_Partida.ID%TYPE;
BEGIN
	INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 91010 , TO_DATE('19610120','YYYYMMDD') )
	  RETURNING TB_Partida.ID INTO t_id;
	  
	INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 20000 );
	INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 20000 );
	INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );
	INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 10000 , 0 );
	
	INSERT INTO TB_Ganhou VALUES ( t_id , '90000001' );
	INSERT INTO TB_Ganhou VALUES ( t_id , '90000002' );
END$$;

-- ERRO, quantidade de ganhadores ACIMA do limite maximo do buraco
DO $$
DECLARE 
	t_id TB_Partida.ID%TYPE;
BEGIN
	INSERT INTO TB_Partida( doc_FUC , numero_MES , data ) VALUES ('100000001' , 91010 , TO_DATE('19610120','YYYYMMDD') )
	  RETURNING TB_Partida.ID INTO t_id;
	  
	INSERT INTO TB_Competiu VALUES ( t_id , '100000000' , 10000 , 20000 );
	INSERT INTO TB_Competiu VALUES ( t_id , '100000002' , 10000 , 20000 );
	INSERT INTO TB_Competiu VALUES ( t_id , '90000001' , 10000 , 0 );
	INSERT INTO TB_Competiu VALUES ( t_id , '90000002' , 10000 , 0 );
	
	INSERT INTO TB_Ganhou VALUES ( t_id , '90000001' );
	INSERT INTO TB_Ganhou VALUES ( t_id , '90000002' );
	INSERT INTO TB_Ganhou VALUES ( t_id , '100000002' );
END$$;

