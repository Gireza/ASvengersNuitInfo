<?php
session_start();

$bdd = new PDO('mysql:host=webinfo.iutmontp.univ-montp2.fr;dbname=martineze;charset=utf8', 'martineze', '7092021');

if (isset($_SESSION['id'])){

		$reqUser = $bdd->prepare("SELECT * FROM membre WHERE id = ?");
		$reqUser->execute(array($_SESSION['id']));
		$userInfos = $reqUser -> fetch();

	if (isset($_POST['newPseudo']) AND !empty($_POST['newPseudo'])) {
		$newPseudo = htmlspecialchars($_POST['newPseudo']);
		$reqPseudo = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ?");
		$reqPseudo -> execute(array($newPseudo));
		if ($reqPseudo -> rowCount() == 0){
			$modifyPseudo = $bdd->prepare("UPDATE membre SET pseudo = ? WHERE id = ?");
			$modifyPseudo -> execute(array($newPseudo, $_SESSION['id']));
			$reqUser->execute(array($_SESSION['id']));
			$userInfos = $reqUser->fetch();
			$_SESSION['pseudo'] = $userInfos['pseudo'];
			header("Location: profil.php?pseudo=".$_SESSION['pseudo']);
		} else {
			$erreur = "Le pseudo est déjà utilisé.";
		}
	}

	if (isset($_POST['newMail']) AND isset($_POST['newMail2']) AND !empty($_POST['newMail']) AND !empty($_POST['newMail2'])){
		if($_POST['newMail'] == $_POST['newMail2']){
			if(filter_var($_POST['newMail'], FILTER_VALIDATE_EMAIL)){
				$newMail = htmlspecialchars($_POST['newMail']);
				$reqMail = $bdd->prepare("SELECT * FROM membre WHERE mail = ?");
				$reqMail -> execute(array($newMail));
				if($reqMail -> rowCount() == 0){
					$modifyMail = $bdd -> prepare("UPDATE membre SET mail = ? WHERE id = ?");
					$modifyMail->execute(array($newMail, $_SESSION['id']));
					$reqUser->execute(array($_SESSION['id']));
					$userInfos = $reqUser->fetch();
					$_SESSION['mail'] = $userInfos['mail'];
					header("Location: profil.php?pseudo=".$_SESSION['pseudo']);
				} else {
					$erreur = "Cette adresse mail est déjà utilisée.";
				}
			} else {
				$erreur = "Veuillez entrer un mail.";
			}
		} else {
			$erreur = "Vos mails doivent être identiques.";
		}
	}

	if (isset($_POST['newMdp']) AND isset($_POST['newMdp2']) AND !empty($_POST['newMdp']) AND !empty($_POST['newMdp2'])){
		if($_POST['newMdp'] == $_POST['newMdp2']){
			$newMdp = sha1($_POST['newMdp']);
			$modifyMdp = $bdd -> prepare("UPDATE membre SET motdepasse = ? WHERE id = ?");
			$modifyMdp->execute(array($newMdp, $_SESSION['id']));
			$erreur = "Votre mot de passe a été modifié.";
			header("Location: profil.php?pseudo=".$_SESSION['pseudo']);
		} else {
			$erreur = "Vos mots de passes doivent être identiques.";
		}
	}

	if(isset($_POST["boutonEditer"]) AND empty($_POST['newPseudo']) AND empty($_POST['newMail']) AND empty($_POST['newMail2']) AND empty($_POST['newMdp']) AND empty($_POST['newMdp2'])){
		header("Location: profil.php?pseudo=".$_SESSION['pseudo']);
	}

	if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
		$tailleMax = 6500000;
		$extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

		if($_FILES['avatar']['size'] <= $tailleMax){
			$extensionUpload = strtolower((substr(strrchr($_FILES['avatar']['name'], '.'), 1)));
			if(in_array($extensionUpload, $extensionsValides)){
				$chemin = "../membre/avatar/".$_SESSION['id'].".".$extensionUpload;
				$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
				if($resultat){
					$updateavatar = $bdd->prepare('UPDATE membre SET avatar = :avatar WHERE id = :id');
					$updateavatar->execute(array(
					'avatar'=>$_SESSION['id'].".".$extensionUpload,
					'id' => $_SESSION['id']
					));
					$reqUser->execute(array($_SESSION['id']));
					$userInfos = $reqUser -> fetch();
					$_SESSION['avatar'] = $userInfos['avatar'];
					header('Location: profil.php?pseudo='.$_SESSION['pseudo']);
				} else {
					$erreur = "Erreur durant l'importation de votre photo de profil.";
				}
			} else {
				$erreur = "Votre photo de profil doit être au format image : gif, png, jpg, jpeg.";
			}
		} else {
			$erreur = "Votre photo de profil ne doit pas dépasser 6Mo.";
		}
	}
}
if(isset($_POST['supprimerCompte'])){
	$reqSup = $bdd->prepare("DELETE FROM membre WHERE id = ?");
	$reqSup->execute(array($_SESSION['id']));
	session_destroy();
	header("Location: supprimerCompte.php");
}
?>
<html>
<?php
	include "nav.php";
?>
<body>
	<h2><?php echo $_SESSION['pseudo']; ?></h2>

	<table>
		<caption>Editer mon profil</caption>
		<form method="POST" action="" enctype="multipart/form-data">
			<tr>
				<td>
					<label for="newPseudo">Nouveau pseudo : </label>
				</td>
				<td>
					<input type="text" name="newPseudo" id="newPseudo" placeholder="Nouveau pseudo" value="<?php echo $userInfos['pseudo']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="newMail">Nouveau mail : </label>
				</td>
				<td>
					<input type="email" name="newMail" id="newMail" placeholder="Nouveau mail" value="<?php echo $userInfos['mail']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="newMail2">Confirmer mail : </label>
				</td>
				<td>
					<input type="text" name="newMail2" id="newMail2" placeholder="Confirmer le mail">
				</td>
			</tr>
			<tr>
				<td>
					<label for="newMdp">Nouveau mot de passe : </label>
				</td>
				<td>
					<input type="password" name="newMdp" id="newMdp" placeholder="Nouveau mdp">
				</td>
			</tr>
			<tr>
				<td>
					<label for="newMdp2">Confirmer mot de passe : </label>
				</td>
				<td>
					<input type="password" name="newMdp2" id="newMdp2" placeholder="Confirmer mdp">
				</td>
			</tr>
			<tr>
				<td>
					<label>Avatar : </label>
				</td>
				<td>
					<input type="file" name="avatar" id="avatar">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="boutonEditer" value="Mettre à jour">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="supprimerCompte" value="Suprimer mon compte">
				</td>
			</tr>
		</form>
	</table>
	<?php
		if (isset($erreur)){
			echo $erreur;
		}
		?>

</body>
</html>