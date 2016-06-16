SET SCHEMA 'trab2teste';

-- ERROR: Altera contato para referenciar uma pessoa inexistente na tabela de pessoas
UPDATE TB_ContatoPessoa COP
SET COP.doc_PES = '1'
WHERE COP.doc_PES = '100000000';

-- ERROR: Altera contato para referenciar uma franquia inexistente na tabela de franquias
UPDATE TB_Franquia FRQ
SET FRQ.tin = '1'
WHERE FRQ.tin = '700600500';

-- ERROR: Altera funcionaro para referenciar uma pessoa inexistente
UPDATE TB_Funcionario FUC
SET FUC.doc_PES  = '1'
WHERE FUC.doc_PES  = '100000001';

-- ERROR: Altera cliente para referenciar uma pessoa inexistente
UPDATE TB_Cliente CLI
SET CLI.doc_PES  = '1'
WHERE CLI.doc_PES  = '100000000';

-- ERROR: Altera jogo individual para referenciar um jogo inexistente
UPDATE TB_JogoIndividual JGI
SET JGI.nome_JGO  = 'Tazo'
WHERE JGI.nome_JGO  = 'Slot';

-- ERROR: Altera jogo em grupo para referenciar um jogo inexistente
UPDATE TB_JogoEmGrupo JGG
SET JGG.nome_JGO  = 'Pique Pega'
WHERE JGG.nome_JGO  = 'Poker';

-- ERROR: Altera caixa para referenciar uma franquia inexistente
UPDATE TB_Caixa CAX
SET CAX.tin_FRA = '1'
WHERE CAX.numero = 3000;

-- ERROR: Altera mesa para referenciar uma franquia inexistente
UPDATE TB_Mesa MES
SET MES.tin_FRA = '1'
WHERE MES.numero = 91000;

-- ERROR: Altera maquina para referenciar uma franquia inexistente
UPDATE TB_Maquina MAQ
SET MAQ.tin_FRA = '1'
WHERE MAQ.snumber = 2000;

-- ERROR: Altera tb_oferece para referenciar uma maquina inexistente
UPDATE TB_Oferece OFE
SET OFE.snumber_MAQ = 1
WHERE OFE.snumber_MAQ  = 2000;
AND OFE.nome_JGI  = 'Slot';

-- ERROR: Altera tb_oferece para referenciar um jogo inexistente
UPDATE TB_Oferece OFE
SET OFE.nome_JGI = 'Minecraft'
WHERE OFE.snumber_MAQ  = 2000;
AND OFE.nome_JGI  = 'Slot';
