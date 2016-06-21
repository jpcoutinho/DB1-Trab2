--CONSULTA 1
forma 1:
SET SCHEMA 'trab2teste';

SELECT DISTINCT PES.nome, PES.sexo
FROM TB_Pessoa PES
EXCEPT
	SELECT pes.nome, pes.sexo
	FROM TB_Pessoa PES, TB_Jogo JGO, TB_JogoEmGrupo JGG, TB_Mesa MES, TB_Partida PAR, TB_Competiu CPU 
	WHERE JGG.jogadores_max <=4
	AND JGG.nome_JGO = MES.nome_JGG
	AND MES.numero = PAR.numero_MES
	AND PAR.id = CPU.id_PAR
	AND CPU.doc_CLI = PES.doc

forma 2:
SELECT DISTINCT PES.nome, PES.sexo
FROM TB_Pessoa PES
WHERE PES.doc NOT IN (
	SELECT CPU.doc_CLI
FROM TB_Pessoa PES, TB_Jogo JGO, TB_JogoEmGrupo JGG, TB_Mesa MES, TB_Partida PAR, TB_Competiu CPU 
	WHERE JGG.jogadores_max <=4
	AND JGG.nome_JGO = MES.nome_JGG
	AND MES.numero = PAR.numero_MES
	AND PAR.id = CPU.id_PAR
)

-- CONSULTA 2

SELECT CLI1.pseudominio, CLI2.pseudominio
FROM TB_Cliente CLI1, TB_Cliente CLI2
WHERE CLI1.doc_PES IN 
(
  SELECT doc
  FROM TB_Pessoa PES1
  WHERE PES1.sexo = 'F'
  AND date_part('year',age(PES1.nascimento)) > 45
)

AND CLI2.doc_PES IN 
(
  SELECT doc
  FROM TB_Pessoa PES2
  WHERE date_part('year',age(PES2.nascimento)) < 25
)

-- CONSULTA 3

SET SCHEMA 'trab2teste';

SELECT PES.nome, COP.contato
FROM TB_Pessoa PES, TB_Cliente CLI, TB_ContatoPessoa COP, TB_Jogada JOG
WHERE JOG.nome_JGO = 'Slot'
AND JOG.doc_CLI = CLI.doc_PES
AND PES.doc = CLI.doc_PES
AND COP.doc_PES = PES.doc

INTERSECT

SELECT PES.nome, COP.contato
FROM TB_Pessoa PES, TB_Cliente CLI, TB_ContatoPessoa COP, TB_Mesa MES, TB_Partida PAR, TB_Competiu CPU
WHERE MES.nome_JGG = 'Poker'
AND MES.numero = PAR.numero_MES
AND CPU.id_PAR = PAR.id
AND CPU.doc_CLI = CLI.doc_PES
AND PES.doc = CLI.doc_PES
AND COP.doc_PES = PES.doc





-- CONSULTA 4

SET SCHEMA 'trab2teste';

SELECT PES.nome
FROM TB_Pessoa PES
	JOIN TB_Cliente CLI
	ON PES.doc = CLI.doc_PES
	JOIN TB_Jogada JOG
	ON CLI.doc_PES = JOG.doc_CLI
	AND JOG.ganhou > JOG.apostou
	AND JOG.ganhou > 10000
INTERSECT

SELECT PES.nome
FROM TB_Pessoa PES
	JOIN TB_Cliente CLI
	ON PES.doc = CLI.doc_PES
	JOIN TB_Competiu CPU
	ON CLI.doc_PES = CPU.doc_CLI
	AND CPU.ganhou > CPU.apostou
	AND CPU.ganhou > 10000



-- CONSULTA 5

SET SCHEMA 'trab2teste';

SELECT DISTINCT CLI.pseudominio, PES.nascimento
FROM TB_Cliente CLI, TB_Pessoa PES, TB_Jogo JGO, TB_JogoIndividual JGI, TB_Jogada JOG
  WHERE PES.doc = CLI.doc_PES
  AND JOG.doc_CLI = CLI.doc_PES
  AND JOG.nome_JGO = JGI.nome_JGO
  AND JGI.nome_JGO = JGO.nome
  GROUP BY CLI.pseudominio, PES.nascimento
  HAVING COUNT(JOG.nome_JGO) = (SELECT COUNT(JGO.duracao) FROM TB_Jogo JGO WHERE JGO.duracao < 1);





