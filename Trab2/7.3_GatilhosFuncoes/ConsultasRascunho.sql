SET SCHEMA 'trab2teste';

-- Documento do Cliente, total apostado, total ganho, saldo ( Apenas jogos em Grupo )
SELECT 
	CPU.doc_CLI AS Documento_Cliente ,
	sum(CPU.apostou) AS Total_Apostado ,
	sum(CPU.ganhou) AS Total_Ganho ,
	sum(CPU.ganhou - CPU.apostou) AS Saldo
FROM TB_Competiu CPU
GROUP BY CPU.doc_CLI
ORDER BY Saldo DESC;

-- Nome do Cliente, total apostado, total ganho, saldo ( Apenas jogos em Grupo )
SELECT 
	PES.nome AS Cliente ,
	sum(CPU.apostou) AS Total_Apostado ,
	sum(CPU.ganhou) AS Total_Ganho ,
	sum(CPU.ganhou - CPU.apostou) AS Saldo
FROM TB_Competiu CPU , TB_Pessoa PES
WHERE CPU.doc_CLI = PES.doc
GROUP BY PES.nome
ORDER BY Saldo DESC;

-- Nome do Cliente, total apostado, total ganho, saldo ; PARA CLIENTES QUE SO PERDERAM DINHEIRO ( Apenas jogos em Grupo )
SELECT 
	PES.nome AS Cliente ,
	sum(CPU.apostou) AS Total_Apostado ,
	sum(CPU.ganhou) AS Total_Ganho ,
	sum(CPU.ganhou - CPU.apostou) AS Saldo
FROM TB_Competiu CPU , TB_Pessoa PES
WHERE CPU.doc_CLI = PES.doc
GROUP BY PES.nome
HAVING sum(CPU.ganhou - CPU.apostou) < 0
ORDER BY Saldo;

-- Documento do Cliente, total apostado, total ganho, saldo ( Apenas jogos Individuais )
SELECT 
	JOG.doc_CLI AS Documento_Cliente ,
	sum(JOG.apostou) AS Total_Apostado ,
	sum(JOG.ganhou) AS Total_Ganho ,
	sum(JOG.ganhou - JOG.apostou) AS Saldo
FROM TB_Jogada JOG
GROUP BY JOG.doc_CLI
ORDER BY Saldo DESC;

-- Nome do Cliente, total apostado, total ganho, saldo ( Apenas jogos Individuais )
SELECT 
	PES.nome AS Cliente ,
	sum(JOG.apostou) AS Total_Apostado ,
	sum(JOG.ganhou) AS Total_Ganho ,
	sum(JOG.ganhou - JOG.apostou) AS Saldo
FROM TB_Jogada JOG , TB_Pessoa PES
WHERE JOG.doc_CLI = PES.doc
GROUP BY PES.nome
ORDER BY Saldo DESC;

-- Documento do Cliente, total apostado, total ganho, saldo ( Todos os Jogos )
SELECT 
	CPU.doc_CLI AS Documento_Cliente ,
	sum(CPU.apostou + JOG.apostou) AS Total_Apostado ,
	sum(CPU.ganhou + JOG.ganhou) AS Total_Ganho ,
	sum( CPU.ganhou + JOG.apostou - CPU.apostou - JOG.ganhou) AS Saldo
FROM TB_Competiu CPU , TB_Jogada JOG
GROUP BY CPU.doc_CLI
ORDER BY Saldo DESC;

-- Nome do Cliente, total apostado, total ganho, saldo ( Todos os Jogos )
SELECT 
	PES.nome AS Cliente ,
	sum(CPU.apostou + JOG.apostou) AS Total_Apostado ,
	sum(CPU.ganhou + JOG.ganhou) AS Total_Ganho ,
	sum( CPU.ganhou + JOG.apostou - CPU.apostou - JOG.ganhou) AS Saldo
FROM TB_Competiu CPU , TB_Pessoa PES , TB_Jogada JOG
WHERE CPU.doc_CLI = PES.doc
AND JOG.doc_CLI = PES.doc
GROUP BY PES.nome
ORDER BY Saldo DESC;

-- Nome do Cliente, total apostado, total ganho, saldo ; PARA CLIENTES QUE SO PERDERAM DINHEIRO ( Todos os Jogos )
SELECT 
	PES.nome AS Cliente ,
	sum(CPU.apostou + JOG.apostou) AS Total_Apostado ,
	sum(CPU.ganhou + JOG.ganhou) AS Total_Ganho ,
	sum( CPU.ganhou + JOG.apostou - CPU.apostou - JOG.ganhou) AS Saldo
FROM TB_Competiu CPU , TB_Pessoa PES , TB_Jogada JOG
WHERE CPU.doc_CLI = PES.doc
AND JOG.doc_CLI = PES.doc
GROUP BY PES.nome
HAVING sum(CPU.ganhou + JOG.apostou - CPU.apostou - JOG.ganhou) < 0
ORDER BY Saldo;
