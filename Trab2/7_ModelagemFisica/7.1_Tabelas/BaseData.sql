-- Apenas dados, sem registro de ações

SET SCHEMA 'trab2teste';

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
INSERT INTO TB_Jogo VALUES ( 'Cerco' , 60 )

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

INSERT INTO TB_Franquia VALUES ('700600500' , 'Magnatas' );
INSERT INTO TB_Franquia VALUES ('700600501' , 'Tangiers' );
INSERT INTO TB_Franquia VALUES ('700600502' , 'The Cooler' );

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

--  

