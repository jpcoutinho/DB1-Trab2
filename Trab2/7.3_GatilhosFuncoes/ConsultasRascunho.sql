SET SCHEMA 'trab2teste';

-- Total gasto e ganho pelos clientes em jogos em grupo
SELECT 
	CPU.doc_CLI AS Documento_Cliente ,
	sum(CPU.apostou) AS Total_Apostado ,
	sum(CPU.ganhou) AS Total_Ganho ,
	sum(CPU.ganhou - CPU.apostou) AS Saldo
FROM TB_Competiu CPU
GROUP BY CPU.doc_CLI
ORDER BY Saldo DESC;

-- Igual a anterior, porem exibindo os nomes ao inves do numero de documento
SELECT 
	PES.nome AS Cliente ,
	sum(CPU.apostou) AS Total_Apostado ,
	sum(CPU.ganhou) AS Total_Ganho ,
	sum(CPU.ganhou - CPU.apostou) AS Saldo
FROM TB_Competiu CPU , TB_Pessoa PES
WHERE CPU.doc_CLI = PES.doc
GROUP BY PES.nome
ORDER BY Saldo DESC;
