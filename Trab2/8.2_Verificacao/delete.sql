SET SCHEMA 'trab2teste';

-- Erro, deletar pessoa: toda pessoa ou é referenciada como Funcionario ou Cliente
DELETE FROM TB_Pessoa PES
WHERE PES.doc = '100000000';

-- Erro, deletar funcionario: funcionarios podem ser juizes de partidas em grupo
DELETE FROM TB_Funcionario FUC
WHERE FUC.doc_PES = '100000001';

-- Erro, deletar partidas: partidas normalmente são referenciadas por competidores e ganhadores
DELETE FROM TB_Partida PAR
WHERE PAR.id  = 1;

-- Erro, deletar mesa: mesa é referenciada por partidas dos jogos
DELETE FROM TB_Mesa MES
WHERE MES.numero  = 90000;

-- Erro, deletar jogo: jogo é referenciado por jogos individuais ou em grupo
DELETE FROM TB_Jogo JGO
WHERE JGO.nome = 'Poker';

-- Erro, deletar jogo individual: jogo indivual é referenciado oferecem ( maquinas que oferecem os jogos )
DELETE FROM TB_JogoIndividual JGI
WHERE JGI.nome_JGO  = 'Slot';

-- Erro, deletar jogo grupo: jogo em grupo é referenciado por mesas
DELETE FROM TB_JogoEmGrupo JGG
WHERE JGG.nome_JGO  = 'Poker';

-- Erro, deletar maquina: Maquina é referenciada pelos jogos que ela oferece ( TB_Oferece )
DELETE FROM TB_Maquina MAQ
WHERE MAQ.snumber = 2000;

-- Erro, deletar caixa: Caixa é referenciado pelo registro de compra e venda de fichas
DELETE FROM TB_Caixa CAX
WHERE CAX.numero = 3000;




