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
