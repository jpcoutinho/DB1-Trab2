
SET SCHEMA 'trab2teste';

-- Erro: Insert de contato para pessoa inexstente
INSERT INTO TB_ContatoPessoa VALUES ( '1' , '12345600000000' );

-- Erro: Insert de cliente para pessoa inexstente
INSERT INTO TB_Cliente VALUES ('1' , NULL );

-- Erro: Insert de funcionario para pessoa inexstente
INSERT INTO TB_Funcionario VALUES ('1' , 11111 );

-- Erro: Insert de jogo individual para jogo inexistente
INSERT INTO TB_JogoIndividual VALUES ( 'Campo Minado' );

-- Erro: Insert de jogo em grupo para jogo inexistente
INSERT INTO TB_JogoEmGrupo VALUES ( 'Twister' , 2 , 100 , 0 );

-- Erro: Insert de contato em franquia inexstente
INSERT INTO TB_ContatoFranquia VALUES ( '1' , '12345600001000' );

-- Erro: Insert de caixa em franquia inexstente
INSERT INTO TB_Caixa VALUES ( 1 , '1' );

-- Erro: Insert de caixa em franquia inexistente
INSERT INTO TB_Caixa VALUES ( 1 , '1' );

--Erro: Insert de maquina em franquia inexistente
INSERT INTO TB_Maquina VALUES ( 1 , '1' );

--Erro: Insert de registro de maquina que oferece jogo para jogo inexistente
INSERT INTO TB_Oferece VALUES ( 'Tetris' , 2000 );

--Erro: Insert de frequentou para franquia inexistente
INSERT INTO TB_Frequentou VALUES ('100000000' , '1' , TO_DATE('20010506' , 'YYYYMMDD') );

--Erro: Insert de frequentou para pessoa inexistente
INSERT INTO TB_Frequentou VALUES ('1' , '700600500' , TO_DATE('20010506' , 'YYYYMMDD') );

--Erro: Insert de comprou para caixa inexistente
INSERT INTO TB_Comprou ( numero_CAX , doc_CLI , valor , data )  VALUES ( 1 , '100000000' , 50000 , TO_DATE('20010501' , 'YYYYMMDD') );

--Erro: Insert de vendeu para caixa inexistente
INSERT INTO TB_Vendeu ( numero_CAX , doc_CLI , valor , data )  VALUES ( 1 , '100000000' , 50000 , TO_DATE('20010501' , 'YYYYMMDD') );

--Erro: Insert de Competiu para partida inexistente
INSERT INTO TB_Competiu VALUES ( 999999 , '100000000' , 10000 , 20000 );

--Erro: Insert de Ganhou para partida inexistente
INSERT INTO TB_Ganhou VALUES ( 999999 , '90000001' );
