<?php
session_start();
?>
<html>
    <body>

<?php
include 'nav.php';
$motif = '%'.$_GET['motif'].'%';

try
{
    //je crée une connection à la base
   $db = new PDO('mysql:host=webinfo.iutmontp.univ-montp2.fr;dbname=martineze;charset=utf8', 'martineze', '7092021');
    //je prépare une requete
    $req = $db->prepare('SELECT * FROM Sauveteur WHERE nom LIKE :motif OR prenom LIKE :motif' );
    //je l'execute
    $req->execute(['motif' => $motif]);
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
    echo '<div class="light">'.$t['nom'].'  '. $t['prenom'].'  '. $t['dateN'] .' '. $t['dateD'] .' '. $t['descriptif'] .'</div>' ;

}
?>
    </body>
</html>
