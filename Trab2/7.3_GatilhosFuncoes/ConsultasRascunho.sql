SET SCHEMA 'trab2teste';

-- Total gasto e ganho pelos clientes em jogos em grupo
SELECT 
	CPU.doc_CLI AS Documento_Cliente ,
	sum(CPU.apostou) AS Total_Apostado ,
	sum(CPU.ganhou) AS Total_Ganho
FROM TB_Competiu CPU
GROUP BY CPU.doc_CLI
ORDER BY CPU.doc_CLI;
