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
