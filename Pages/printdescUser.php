<?php
try
{
    include "nav.php";
	echo "Liste des participants :";
    //je crée une connection à la base
    $db = new PDO('mysql:host=webinfo.iutmontp.univ-montp2.fr;dbname=martineze;charset=utf8', 'martineze', '7092021');
    //je prépare une requete
    $req = $db->prepare('SELECT * FROM Sauveteur ORDER BY nom DESC');
    //je l'execute
    $req->execute();
    //la variable tuples récupère toutes les lignes
    $tuples = $req->fetchAll();
}
catch (Exception $e)
{
        //S'il y a une erreur , on l'affiche
        die('Erreur : ' . $e->getMessage());
}

//j'itère sur les tuples résultats
foreach ($tuples as $t) {
    //j'affiche l'attribut login du tuple
    echo '<p>'.$t['nom'];
    //je génère un lien vers la page de détail
    echo '    <a href="getUser.php?nom='.$t['nom'].'">Detail</a>   </p>' ;

}
?>