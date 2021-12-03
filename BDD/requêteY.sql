/*appuyer sur "sauveteurs"*/
SELECT nom,prenom FROM Sauveteur ORDER BY nom;

/*commencant par une lettre*/
SELECT nom,prenom FROM Sauveteur WHERE nom LIKE :lettre+'%' OR prenom LIKE :lettre+'%' ORDER BY nom; 
