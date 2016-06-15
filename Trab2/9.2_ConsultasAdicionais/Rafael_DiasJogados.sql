-- Sobre os dias que os clientes jogaram
SET SCHEMA 'trab2teste';

-- Documento do Cliente , Nome do Cliente , Data da Partida EM GRUPO
SELECT 
	PES.doc AS Documento ,
	PES.nome AS Cliente , 
	PAR.data AS Data_PartidaEmGrupo
FROM TB_Partida PAR , TB_Competiu CPU , TB_Pessoa PES
WHERE CPU.doc_CLI = PES.doc
AND PAR.ID = CPU.ID_PAR
ORDER BY PES.doc;

-- Documento do Cliente , Nome do Cliente , Data da Partida INDIVIDUAL
SELECT 
	PES.doc AS Documento ,
	PES.nome AS Cliente , 
	JOG.data AS Data_PartidaIndividual
FROM TB_Jogada JOG , TB_Pessoa PES
WHERE JOG.doc_CLI = PES.doc
ORDER BY PES.doc;

-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

-- PESSOAL - APENAS PARA AJUDAR A CRIAR AS OUTRAS CONEXOES
-- Documento do Cliente , Nome do Cliente , Data da Partida EM GRUPO
SELECT 
	CPU.doc_CLI AS Documento ,
	MES.tin_FRA AS Franquia ,
	to_char( PAR.data , 'YYYYMMDD' ) AS Data_PartidaEmGrupo
FROM TB_Partida PAR , TB_Mesa MES , TB_Competiu CPU 
WHERE CPU.doc_CLI = CPU.doc_CLI
AND PAR.ID = CPU.ID_PAR
AND MES.numero = PAR.numero_MES
ORDER BY CPU.doc_CLI;

-- Documento do Cliente , Nome do Cliente , Data da Partida INDIVIDUAL
SELECT 
	JOG.doc_CLI AS Documento ,
	MAQ.tin_FRA AS Franquia , 
	to_char( JOG.data , 'YYYYMMDD' ) AS Data_PartidaIndividual
FROM TB_Jogada JOG , TB_Maquina MAQ
WHERE JOG.doc_CLI = JOG.doc_CLI
AND JOG.snumber_MAQ = MAQ.snumber
ORDER BY JOG.doc_CLI;
