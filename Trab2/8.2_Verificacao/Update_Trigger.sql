SET SCHEMA 'trab2teste';

-- ERROR: Altera um valor de compra para um não aceitavel ( menor do que 50000 na franquia "Magnatas" )
UPDATE TB_Comprou CMP
SET valor = 1
WHERE CMP.numero_CAX = 3000
AND CMP.doc_CLI = '100000000'
AND CMP.data = TO_DATE('20010501' , 'YYYYMMDD');

-- ERROR: Altera um valor de venda para um não aceitavel ( menor do que 50000 na franquia "Magnatas" )
UPDATE TB_Vendeu VEN
SET valor = 1
WHERE VEN.numero_CAX = 3004
AND VEN.doc_CLI = '100000004'
AND VEN.data = TO_DATE('20021008' , 'YYYYMMDD');

-- OK: Altera um valor de compra para um aceitavel ( acima 50000 na franquia "Magnatas" )
UPDATE TB_Comprou CMP
SET valor = valor + 1
WHERE CMP.numero_CAX = 3000
AND CMP.doc_CLI = '100000000'
AND CMP.data = TO_DATE('20010501' , 'YYYYMMDD');

-- OK: Altera um valor de compra para um aceitavel ( qualquer valor sem ser na franquia "Magnatas" )
UPDATE TB_Vendeu VEN
SET valor = 1
WHERE VEN.numero_CAX = 3007
AND VEN.doc_CLI = '100000005'
AND VEN.data = TO_DATE('20021103' , 'YYYYMMDD');
