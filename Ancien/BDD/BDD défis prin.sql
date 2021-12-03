CREATE TABLE Sauveteur(
   idSauveteur INT,
   nom VARCHAR(50) NOT NULL DEFAULT 'inconnu',
   prenom VARCHAR(50),
   dateN DATE,
   dateD DATE,
   descriptif VARCHAR(8000),
   PRIMARY KEY(idSauveteur)
);

CREATE TABLE Sauvetage(
   idSauvetage INT,
   dateS DATE NOT NULL,
   bateau VARCHAR(50),
   nbSauve INT,
   nbMort INT,
   descriptif VARCHAR(8000),
   PRIMARY KEY(idSauvetage)
);

CREATE TABLE Equipage(
   idSauvetage INT,
   idSauveteur INT,
   role ENUM('Patron','Sous-patron','Canotier','Coordinateur radio','Mecanicien','Plongeur','Sauveteur') DEFAULT 'Sauveteur',
   PRIMARY KEY(idSauveteur, idSauvetage),
   FOREIGN KEY(idSauveteur) REFERENCES Sauveteur(idSauveteur),
   FOREIGN KEY(idSauvetage) REFERENCES Sauvetage(idSauvetage)
);


/*DROP TABLE Equipage;
DROP TABLE Sauvetage;
DROP TABLE Sauveteur;
*/

INSERT INTO Sauvetage VALUES 
(1, '2021-11-09', 'canot', 33, 0, 
    '<div>Le canot tous temps (CTT) Jean Bart a été déclenché par le Cross Gris-Nez à 01h17, suite à de nombreux départs de « small boats ».</div>
<div>Un pneumatique est réparé par l’équipage du CTT.</div>
<div>Les 33 personnes à bord, dont 2 femmes et une fillette de 5 ans sont prises en charge et ramenés au Port Du Grand Large peu après 03h00.</div>
<img src="./img/migrants-idSauvetage-1.jpg" alt="migrants à bord du pneumatique">');

INSERT INTO Sauvetage VALUES 
(2, '1931-04-21', 'Helene', 3, 0, 
    '<h2>Dunkerque</h2>
<div>
<p>Vers 5 heures 30, hier matin, le petit bateau de pêche HELENE D610 immobilisé par une panne de moteur s’est trouvé drossé par la lame vers l’empierrement de la jetée Est  où il risquait de se briser.</p>
<p>Le remorqueur RABLE de la société Dunkerquoise de Remorquage arriva en hâte au secours du bateau en perdition.</p>
<p>Le capitaine Neuquelman fit descendre ses marins sur l’estacade d’où ils purent lancer des amarres et  établir un va-et-vient.</p>
<p>Ainsi ont été sauvés le patron Henri Vanhille et les matelots Théophile Vanhille et Victor Popieul, tous trois de Bray-Dunes.</p>
<p>Quant au bateau de pêche, il est resté échoué sur des rocailles d’où on espère le retirer.</p>
<cite>Sources
Le Grand Echo du Nord de la France 22 avril 1931</cite>
</div>');

INSERT INTO Sauvetage VALUES 
(3,'1899-01-03','trois-mâts Friede',17,0,
'<h2>rapport du comité</h2>
<div>Dans la nuit du 2 au 3 janvier dernier, on apprit qu’un grand navire faisait des signaux de détresse à un mille au large et Jannekeyn, pilote de service de la Chambre de Commerce, reçut l’ordre d’armer le canot de sauvetage qui sortit des jetées vers 1 heure du malin remorqué par le Dunkerquois. 
Le vent faisait rage, la mer était démontée, le navire, échoué était constamment couvert par les lames qui déferlaient sur lui avec une violence extrême. C’était le trois-mâts allemand FRIEDE. Arrivé près du trois-mâts, le canot de sauvetage largue la remorque et fait force de rames, mais l’équipage n’a pu être complété qu’à 9 hommes au lieu de 12 et plusieurs avirons ont été brisés et enlevés par la mer. Malgré les efforts de ceux qui le montent, le canot de sauvetage tombe en dérive et disparaît dans la nuit. Il va se perdre dans les brisants lorsque Jannekeyn fait mouiller l’ancre qui heureusement tient bon et fait avec des feux de bengale des signaux au remorqueur qui, grâce à l’habileté du capitaine Lavallée, s’approche et réussit à lui jeter une remorque. On revient vers le trois-mâts. A sept reprises différentes on tente de l’accoster, sept fois ces généreuses tentatives demeurent infructueuses. Les canotiers sont exténués et à bout de forces sinon à bout de courage. Jannekeyn se décide à rentrer au port, mais pour en sortir une demi-heure après avec un nouvel armement complété à 12 hommes, on a eu besoin de n’en prendre que dix, car Lauwick, le patron que vous avez applaudi tout à l’heure et un canotier nommé Bernard, inaccessibles tous deux à la fatigue quand il s’agit de sauver leurs semblables, réembarquent pour cette deuxième sortie toujours dirigée par Jannekeyn. Cette fois l’énergie admirable des sauveteurs est couronnée de succès. Il était temps car la mer couvrait le pont du trois-mâts et menaçait à chaque instant d’enlever l’équipage qui fut sauvé en entier. Le sauvetage avait duré sept longues heures, il était huit heures du matin quand Jannekeyn déposa sains et saufs, sur le quai des Pécheurs, les 12 matelots naufragés, le pilote, le capitaine et sa femme.</div>');

INSERT INTO Sauvetage VALUES 
(4, '1900-03-23', 'Enigheden', 8, 0, 
    '<h2>Dunkerque</h2>
<div><p>Je soussigné, Jacques Jannekeyn, patron pilote, patron du canot de sauvetage, déclare qu’informé par M. Charles Collet, Président du Comité local, que l’équipage du brick norvégien naufragé ENIGHEDEN, ayant talonné sur les bancs du Snow, se trouvait à bord du feu flottant SNOW.</p>
<p>Suivant les ordres reçus, je fis armer le canot de sauvetage AMICIA et à neuf heures trente, je pris la mer sous remorque du remorqueur DUNKERQUOIS de la Société dunkerquoise de remorquage. Les vents étaient de la partie est-nord-est et la mer très houleuse.</p>
<p>La traversée qui dura environ une heure s’effectua dans de bonnes conditions et vers dix heures et demie, je me trouvai le long du feu flottant SNOW. II fallut prendre des précautions infinies pour accoster car la mer qui était démontée avec des lames très courtes, menaçait à chaque instant de briser le canot de sauvetage sur le feu flottant.</p>
<p>Tout le monde y mit la meilleure volonté et aussi bien l’équipage du SNOW que dirigeait le capitaine Benoît que le personnel du canot de sauvetage, chacun fit son devoir pour transborder, homme par homme, tout le personnel qui formait l’équipage du brick norvégien ENIGHEDEN composé de sept hommes et un mousse.</p>
<p>Lorsque cette opération, qui demanda une demi-heure, fut terminée, le capitaine Benoît me donna avis que deux naufragés avaient été recueillis le matin vers 2 heures par la corvette des pilotes N°2.</p>
<p>Je me fis remorquer aussitôt dans la direction de cette corvette et, arrivé le long du bord, je m’offris au patron Sourcroy de ramener à terre les deux naufragés qu’il avait recueillis le matin. Il me répondit que ces deux hommes n’étant pas dans l’état d’être transbordés, il était dans l’obligation de les conserver à bord de sa corvette. Les deux naufragés dont il s’agit appartenaient à l’équipage du trois-mâts norvégien TRITON qui a disparu (10 hommes noyés).</p>
<p>Je fis route pour le port vers midi et m’y trouvai de retour vers une heure. Le canot de sauvetage AMICIA, dont c’est la première sortie, se comporte très bien et a de très bonnes qualités. Malgré l’état de la mer qui était très agitée, il s’est toujours très bien tenu quoique nous ayons eu constamment la lame par le travers tant à l’aller qu’au retour.</p>
<p>Je crois en raison de cette expérience pouvoir sans crainte déclarer que l’AMICIA est appelé à rendre de grands services à l’humanité. Le remorqueur DUNKERQUOIS qui a conduit le canot de sauvetage a été bien manœuvré par le capitaine et l’équipage.</p></div>
<h2>Fort-Mardyck</h2>
<div><p>Je soussigné patron du canot de sauvetage de la station de Fort Mardyck, déclare que le 23 mars 1900 on vint me prévenir vers quatre heures quarante-cinq du soir qu’un navire démâté venait de faire côte à environ 5 kilomètres de la station à l’Est.</p>
<p>Je m’empressai de faire armer le canot et de chercher des chevaux pour nous remorquer. Vers cinq heures et demie, nous étions en route pour l’épave, et bien armés, nous conduisîmes les chevaux avec la plus grande vitesse possible. La brise était forte de N.E la mer très grosse, c’est-à-dire qu’il faisait dur à refouler et avec ça, le temps était fort brumeux.</p>
<p>Arrivés en face de l’épave, nous reconnûmes un navire n’ayant personne à bord. Nous nous sommes approchés le plus près possible et après avoir bien constaté que nous n’avions qu’une épave sur laquelle ne restait plus personne à sauver et que notre présence était inutile, nous sommes retournés mettre le canot à l’abri. Il était huit heures et demie quand nous sommes arrivés et dans la manœuvre tout le monde a fait son devoir.</p>
<p>Note : L’épave de l’Enigheden va s’échouer à l’ouest des jetées où elle est démolie par les vagues.</p>
</div>
<cite>Source
Annales de la Société Centrale de Sauvetage des Naufragés
La belle époque à Dunkerque tome 2 par Jean Denise</cite>');

INSERT INTO Sauvetage VALUES 
(5,'1878-01-08','bateau de pêche Charles-Amelie',0,0,
'<h2>déroulé</h2>
<div><p>A huit heures du matin le bureau du port à Dunkerque reçoit du sémaphore un avis télégraphique signalant le bateau de pêche CHARLES-AMELIE de Calais capitaine Fourre échoué à quelques mille du bout de l’estacade ouest.</p><p>Sur l’ordre de M Guillain secrétaire adjoint du Comité le canot de sauvetage est lancé à huit heures trente avec son équipage au complet.</p><p>Le CHARLES-AMELIE était à sec et l’équipage débarqué quand le canot fut prêt à sortir du port.</p><p>Celui-ci fut alors amarré à l’estacade prêt à l’assister dans le cas où il demanderait du secours à la marée montante mais à deux heures quarante-cinq le bateau échoué n’ayant fait aucun signal le canot est rentré et remisé à trois heures.</p><p>En donnant l’ordre de la mise à l’eau du canot le secrétaire du Comité était à peu près certain que l’équipage du bateau échoué ne courait aucun danger et qu’il pourrait atteindre la plage à marée basse, c’est donc plutôt comme exercice et pour l’exemple qu’il a prescrit la réunion rapide du personnel de l’embarcation.</p><p>L’empressement de nos marins à se rendre à cet appel mérite d’être signalé et c’est à ce titre que nous citons leurs noms .</p><cite>cite: Société Centrale de Sauvetage des Naufragés</cite></div>');


INSERT INTO Sauveteur VALUES (1,'Jannekeyn','Jacques François','1850-09-13','1914-05-26',
'<h2>Pilote lamaneur patron du canot de sauvetage</h2>
<div>Il appartient à une famille de braves gens et de gens braves. On raconte que sa grand’mère navigua sous l’habit masculin et assista à plusieurs combats contre l’Anglais.</div>
<div>Le père de Jannekeyn était, lui aussi, capitaine d’une corvette de pilotes, et sa poitrine était, comme celle de son fils, constellée de médailles de sauvetage. Il avait aussi la croix d’Espagne.</div>
<div>Un des frères du décoré d’hier est actuellement lieutenant-archiviste à la place de Lille, et notre héros dunkerquois est le beau-frère de M. Pichon, industriel à Lille et chevalier de la Légion d’Honneur.</div>
<div>Il est également parent par alliance avec Charles Lauwick, ils  habitent porte à porte.</div><div>Aussi modeste que brave, Jacques Jannekeyn a toujours négligé de faire ressortir ses actes de courage et s’effaçait chaque fois qu’il avait accompli ce qu’il appelle son devoir.</div>
<h2>Légion d’Honneur</h2>
<img src="./img/Jannekeyn-LH.png" alt="certificat de légion d’Honneur">');
INSERT INTO Sauveteur VALUES (2,'Lauwick','Charles Adolphe','1853-03-15','1915-03-20',
'<h2>Parcours</h2>
<div> Maitre tonnelier après avoir officié dans les compagnes de pêche en Islande, Charles Lauwick est le patron de  canot le plus décoré et un des plus emblématiques des sauveteurs dunkerquois de par le nombre de sorties et de personnes sauvées. Une carte postale le montre comme patron du canot de sauvetage AMICIA. Cette carte ne reflète pas la réalité. En effet Charles Lauwick n’a, dans l’état actuel des connaissances, réalisé qu’une sortie, en qualité de sous-patron sur ce canot avant de partir en retraite.</div>
<img src="./img/Canot-Amicia-Lauwick.png" alt="Lauwick sur le canot Amicia"><h2>Vie professionelle</h2><div>Marine Nationale 1 an et 6 mois</div><div>Marine de commerce 3 ans et 2 mois</div><div>Tonnelier sur les bateaux de pêche en Islande</div><div>nommé sous-patron du canot de sauvetage en 1890</div>');
INSERT INTO Sauveteur(idSauveteur, nom, prenom) VALUES (3, 'Pelletier', 'E.');
INSERT INTO Sauveteur(idSauveteur, nom) VALUES (4, 'Muller');
INSERT INTO Sauveteur(idSauveteur, nom) VALUES (5, 'Debroucker');
INSERT INTO Sauveteur(idSauveteur, nom) VALUES (6, 'Neuquelman');
INSERT INTO Sauveteur VALUES (7,'Bossu','Eugène Jules','1839-07-08','1909-12-03',
'<h2>Parcours</h2><div>M. Charet est un enfant de Dunkerque, comme Jean-Bart, mais il ne s’est pas signalé, comme son illustre compatriote, en combattant les Anglais.
 S’il a couru sus à leurs navires, c’était pour les secourir et les conduire au port.</div>
 <div>Chaque époque a ses exigences et son genre d’héroïsme. Il n’avait pas dix-neuf ans, lorsqu’il opéra son premier sauvetage, en se jetant à la mer sur la côte d’Irlande pour « sauver une femme qui se noyait au milieu des glaçons ».
 Deux de ses fils seront élevés à la dignité de  Grand Officier de la Légion d’Honneur</div>');
INSERT INTO Sauveteur(idSauveteur,nom,prenom) VALUES (8,'Moses','Laurent');

INSERT INTO Equipage(idSauvetage, idSauveteur) VALUES ( 1, 3);
INSERT INTO Equipage(idSauvetage, idSauveteur) VALUES ( 1, 4);
INSERT INTO Equipage(idSauvetage, idSauveteur) VALUES ( 1, 5);
INSERT INTO Equipage VALUES (2, 6, 'Patron');
INSERT INTO Equipage VALUES (3,1,'Patron');
INSERT INTO Equipage VALUES (3,2,'Sous-patron');
INSERT INTO Equipage(idSauvetage,idSauveteur) VALUES (3,7);
INSERT INTO Equipage(idSauvetage, idSauveteur) VALUES (4, 2);
INSERT INTO Equipage VALUES (4, 1, 'Patron');
INSERT INTO Equipage VALUES (5,1,'Patron');
INSERT INTO Equipage(idSauvetage,idSauveteur) VALUES (5,8);