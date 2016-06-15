SET SCHEMA 'trab2teste';

-- Documento do Cliente, total apostado, total ganho, saldo
SELECT 
	CPU.doc_CLI AS Documento_Cliente ,
	sum(CPU.apostou) AS Total_Apostado ,
	sum(CPU.ganhou) AS Total_Ganho ,
	sum(CPU.ganhou - CPU.apostou) AS Saldo
FROM TB_Competiu CPU
GROUP BY CPU.doc_CLI
ORDER BY Saldo DESC;

-- Nome do Cliente, total apostado, total ganho, saldo
SELECT 
	PES.nome AS Cliente ,
	sum(CPU.apostou) AS Total_Apostado ,
	sum(CPU.ganhou) AS Total_Ganho ,
	sum(CPU.ganhou - CPU.apostou) AS Saldo
FROM TB_Competiu CPU , TB_Pessoa PES
WHERE CPU.doc_CLI = PES.doc
GROUP BY PES.nome
ORDER BY Saldo DESC;

-- Nome do Cliente, total apostado, total ganho, saldo ; PARA CLIENTES QUE SO PERDERAM DINHEIRO
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
