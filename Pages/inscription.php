<?php

$bdd = new PDO('mysql:host=webinfo.iutmontp.univ-montp2.fr;dbname=martineze;charset=utf8', 'martineze', '7092021');

if (isset($_POST['formInscription'])) {
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);
	$mail2 = htmlspecialchars($_POST['mail2']);
	$motDePasse = ($_POST['mdp']);
	$motDePasse2 = ($_POST['mdp2']);


	if (!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])){
		if (strlen($_POST['pseudo']) <= 10){
			$reqPseudo = $bdd -> prepare("SELECT * FROM membre WHERE pseudo = ?");
			$reqPseudo -> execute(array($pseudo));

			if (($reqPseudo -> rowCount()) == 0){
				if ($_POST['mail'] == $_POST['mail2']) {
					if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
						$reqMail = $bdd -> prepare("SELECT * FROM membre WHERE mail = ?");
						$reqMail -> execute(array($mail));
						if (($reqMail -> rowCount()) == 0) {
							if (strlen($_POST['mdp']) < 7) {
								$erreur = "Le mot de passe doit faire au minimum 7 caractères";
							} elseif ($_POST['mdp'] != $_POST['mdp2']) {
								$erreur = "Les mots de passes doivent être similaires";
							} else {
								$motDePasse = sha1($motDePasse);
								$insertMembre = $bdd->prepare("INSERT INTO membre(pseudo, mail, motdepasse) VALUES(:pseudo , :mail , :motDePasse)");
								$insertMembre->execute(array(
									'pseudo' => $pseudo,
									'mail' => $mail,
									'motDePasse' => $motDePasse));
								var_dump($insertMembre);
								$erreur = "Votre compte a bien été créé";
								header('Location: connexion.php');
							}
						} else {
							$erreur = "Votre adresse mail a déjà été utilisée.";
						}
					} else {
						$erreur = "Veuillez bien rentrer un mail.";
					}
				} else {
					$erreur = "Veuillez confirmer correctement votre mail.";
				}
			} else {
				$erreur = "Votre pseudo a déjà été utilisé.";
			}
		} else {
			$erreur = "La taille du pseudo ne doit pas excéder 10 caractères.";
		}
	} else {
		$erreur = "Veuillez rentrer tous les éléments.";
	}
}
?>
<html>
<head>
	<title>Espace Membre</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="inscription.css"/>
</head>
<body>
	<div class="inscription">
		<div class="imageFond"></div>
		<div class="tableauInscription">
			<table>
				<caption>Inscription</caption>
				<form method="POST" action="">
				<tr>
					<td>
						<label for="pseudo">Pseudo : </label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" placeholder="Inserez votre pseudo" id="pseudo" class ="inputFocusOut" name="pseudo" value="<?php if (isset($pseudo)){echo $pseudo;}?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="mail">Mail : </label>
					</td>
					<td>
						<label for="mail2">Confirmez votre adresse mail : </label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="email" placeholder="Inserez votre mail" id="mail" class ="inputFocusOut" name="mail" value="<?php if (isset($mail)){echo $mail;}?>">
					</td>
					<td>
						<input type="email" placeholder="Confirmez votre mail" id="mail2" class ="inputFocusOut" name="mail2" value="<?php if (isset($mail2)){echo $mail2;}?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="mdp">Mot de passe : </label>
					</td>
					<td>
						<label for="mdp2">Confirmez votre mot de passe : </label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="password" placeholder="Inserez votre mdp" id="mdp" class ="inputFocusOut" name="mdp" value="<?php if (isset($mdp)){echo $mdp;}?>">
					</td>
					<td>
						<input type="password" placeholder="Confirmez votre mdp" id="mdp2" class ="inputFocusOut" name="mdp2" value="<?php if (isset($mdp2)){echo $mdp2;}?>">
					</td>
				</tr>
				<!--<tr>
					<td>
						<label for="avatar">Photo de profil</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="file" name="avatar" id="avatar">
					</td>
				</tr>-->
				<tr>
					<td>
						<input type="submit" name="formInscription" class="boutonInscription" value="Envoyer">
					</td>
				</tr>
				</form>
				<tr>
					<td>
						<?php
							if (isset($erreur)) {
								echo '<font color="red">' . $erreur . "  <a href=\"accueil.php\">Retourner à l'accueil</a></font>";
							}
						?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<script src="Script/inscription.js"></script>
</body>
</html>