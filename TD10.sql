--Q1

SELECT COUNT(np) AS nbLigne FROM produit;

--Q2

SELECT COUNT(DISCTINCT np) AS nbProduit FROM achat WHERE np = 103;

--Q3

SELECT ncli, COUNT(DISTINCT np) AS nbProduit 
	FROM achat GROUP BY ncli ;

--Q4
SELECT ncli FROM (
	SELECT ncli, COUNT(DISTINCT np) AS nbProduit
		FROM achat 
		GROUP BY ncli)
	WHERE nbProduit >= 3;

--Q5
SELECT ncli FROM (
	SELECT ncli, COUNT(DISTINCT np) AS nbProduit
		FROM achat
		GROUP BY ncli)
	WHERE nbProduit = (SELECT COUNT(np) FROM produit);

--Q6
SELECT nom FROM client WHERE ncli = (
	SELECT ncli FROM (
	SELECT ncli, COUNT(DISTINCT np) AS nbProduit
		FROM achat
		GROUP BY ncli)
	WHERE nbProduit = (SELECT COUNT(np) FROM produit)
);

--Q7
SELECT lib, MAX(qa) AS MAXQA, MIN(qa) AS MINQA 
	FROM achat a 
	JOIN produit p ON a.np = p.np
	GROUP BY lib; 

--Q8
SELECT MAX(qr) FROM reap;

--Q9
SELECT lib FROM produit p 
	JOIN reap r ON p.np = r.np 
	WHERE qr = (SELECT MAX(qr) FROM reap);

--Q10
SELECT lib, MAX(qr) AS maxQr FROM produit p 
	JOIN reap r ON p.np = r.np 
	GROUP BY lib
	ORDER BY lib;
 

--Q11
SELECT np FROM(
	SELECT np, COUNT(DISTINCT date_reap) AS nbReap 
		FROM reap GROUP BY np)
	WHERE nbReap >= 2;

--Q12
SELECT np FROM (
	SELECT np, COUNT(DISTINCT nf) AS nbFourn, 
		COUNT(DISTINCT date_reap) AS nbReap
		FROM reap
		WHERE qr>50
		GROUP BY np)
	WHERE nbFourn >=2 AND nbReap >=2; 

--Q13
SELECT nf FROM( 
	SELECT nf, COUNT(np) AS nbProduit 
	FROM reap
	GROUP BY nf)
	WHERE nbProduit = (SELECT COUNT(np) FROM produit);

--Q14
SELECT nf FROM( 
	SELECT nf, COUNT(np) AS nbProduit 
	FROM reap
	WHERE np IN (SELECT np FROM produit WHERE lib ='Lampe')
	GROUP BY nf)
	WHERE nbProduit = (SELECT COUNT(np) FROM produit WHERE lib ='Lampe');

--V2
SELECT nf FROM( 
	SELECT nf, COUNT(DISTINCT r.np) AS nbProduit 
	FROM reap r JOIN produit p ON r.np = p.np
	WHERE lib = 'Lampe'
	GROUP BY nf)
	WHERE nbProduit = (SELECT COUNT(np) FROM produit WHERE lib ='Lampe');

--Q15
SELECT numis, COUNT(DISTINCT nomorg) AS nb FROM visite GROUP BY numis;

--Q16
SELECT AVG(nb) FROM 
	(SELECT numis, COUNT(DISTINCT nomorg) AS nb 
	FROM visite GROUP BY numis);

--Q17
SELECT nomorg FROM(
	SELECT nomorg, COUNT(DISTINCT numis) AS nVisite 
	FROM visite GROUP BY nomorg)
	WHERE nVisite >= 2;

--Q18
SELECT nomorg FROM(
	SELECT nomorg, COUNT(DISTINCT numis) AS nVisite, 
	COUNT(DISTINCT datevisite) as nDateVis
	FROM visite GROUP BY nomorg)
	WHERE nVisite >= 2 AND nDateVis >= 2;


--Q19
SELECT nom, COUNT(DISTINCT nomorg) AS nVisite
	FROM mission m 
	JOIN chercheur c ON m.numc = c.numc
	JOIN visite v ON m.numis = v.numis
	GROUP BY nom;

--Q20
SELECT nom FROM(
	SELECT nom, COUNT(DISTINCT nomorg) AS nVisite
		FROM mission m 
		JOIN chercheur c ON m.numc = c.numc
		JOIN visite v ON m.numis = v.numis
		GROUP BY nom)
	WHERE nVisite = (SELECT COUNT(DISTINCT nomorg) FROM organisme);

--Q21
SELECT nom FROM(
	SELECT nom, COUNT(DISTINCT v.nomorg) AS nVisite
		FROM mission m 
		JOIN chercheur c ON m.numc = c.numc
		JOIN visite v ON m.numis = v.numis
		JOIN organisme o ON o.nomorg = v.nomorg
			WHERE o.pays = 'France' 
		GROUP BY nom)
	WHERE nVisite = (SELECT COUNT(nomorg) FROM organisme WHERE pays = 'France');

--Q22
SELECT np FROM( 
	SELECT np, COUNT(np) AS nbReap
	FROM reap 
	GROUP BY np)
	WHERE nbReap = (SELECT MAX(nbReap) FROM (SELECT np, COUNT(np) AS nbReap
	FROM reap 
	GROUP BY np));