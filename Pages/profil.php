<?php
session_start();

$bdd = new PDO('mysql:host=webinfo.iutmontp.univ-montp2.fr;dbname=martineze;charset=utf8', 'martineze', '7092021');

if (isset($_GET['pseudo']) AND !empty($_GET['pseudo'])){
	$getPseudo = $_GET['pseudo'];
	$reqUser = $bdd -> prepare("SELECT * FROM membre WHERE pseudo = ?");
	$reqUser -> execute(array($getPseudo));
	$userInfos = $reqUser -> fetch();

	$pseudoProfil = $userInfos['pseudo'];
	$mailProfil = $userInfos['mail'];
	$idProfil = $userInfos['id'];
?>
<html>
<?php
	include "nav.php"
?>
<body>
	<h2><?php echo $pseudoProfil; ?></h2>

	<ul>
		<li><img src=<?php echo "\"../membre/avatar/".$_SESSION['avatar']."\"";?>></li>
		<li>Mail : <?php echo $mailProfil; ?></li>
		<li>Id : <?php echo $idProfil; ?></li>
		<?php
		if (isset($_SESSION['pseudo']) AND $pseudoProfil == $_SESSION['pseudo']){ ?>
			<a href="editerProfil.php">Editer mon compte</a>
			<a href="deconnexion.php">Deconnexion</a>
		<?php	
		}
		?>
</body>
</html>
<?php } else {
	header("Location: connexion.php");
}
?>
