<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>

<?php

$login = $_GET['login'];
$prenom = $_GET['prenom'];
$nom = $_GET['nom'];

echo 'nom: '.$nom.' prenom  '.$prenom.'   login '.$login;

try
{
    //je crée une connection à la base
   $db = new PDO('mysql:host=webinfo.iutmontp.univ-montp2.fr;dbname=martineze;charset=utf8', 'martineze', '7092021');
    //je prépare une requete
    $req = $db->prepare('INSERT INTO users (login, nom, prenom) VALUES (:login, :nom, :prenom)');
    //je l'execute
    $req->execute(['login' => $login, 'nom' => $nom, 'prenom' => $prenom]);
    //la variable tuples récupère toutes les lignes
    $tuples = $req->fetch();
}
catch (Exception $e)
{
        //S'il y a une erreur , on l'affiche
        die('Erreur : ' . $e->getMessage());
}

?>
    </body>
</html>
