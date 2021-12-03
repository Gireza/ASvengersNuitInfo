<?php
session_start();

$bdd = new PDO('mysql:host=webinfo.iutmontp.univ-montp2.fr;dbname=martineze;charset=utf8', 'martineze', '7092021');

if (isset($_POST["formConnexion"])) {
	$pseudoConnect = htmlspecialchars($_POST["pseudoConnect"]);
	$motDePasseConnect = sha1($_POST["mdpConnect"]);

	if (!empty($pseudoConnect) AND !empty($motDePasseConnect)){
		if (filter_var($pseudoConnect, FILTER_VALIDATE_EMAIL)){
			$reqUser = $bdd -> prepare("SELECT * FROM membre WHERE mail = ? AND motdepasse = ?");
		} else {
			$reqUser = $bdd -> prepare("SELECT * FROM membre WHERE pseudo = ? AND motdepasse = ?");
		}
		$reqUser -> execute(array($pseudoConnect, $motDePasseConnect));
		if ($reqUser -> rowCount() != 0){
			$userInfos = $reqUser -> fetch();
			$_SESSION['pseudo'] = $userInfos['pseudo'];
			$_SESSION['mail'] = $userInfos['mail'];
			$_SESSION['id'] = $userInfos['id'];
			$_SESSION['avatar'] = $userInfos['avatar'];
			$erreur = "Vous êtes connectés " . $_SESSION['pseudo'];
			header("Location: captcha.php");
		} else {
			$erreur = "Le login ou le mot de passe est incorrect";
		}
	} else {
		$erreur = "Tous les champs doivent être complétés.";
	}

}
?>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="inscription.css">
	<title>Connexion</title>
</head>
<body>
	<div class="inscription">
		<div class="tableauInscription">
			<table>
				<caption>Connexion</caption>
				<form method="POST" action="">
					<tr>
						<td>
							<label for="pseudoConnect">Pseudo : </label>
						</td>
						<td>
							<label for="mdpConnect">Mot de passe : </label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="pseudoConnect" id="pseudoConnect" class="inputFocusOut" placeholder="Login"/>
						</td>
						<td>
							<input type="password" name="mdpConnect" id="mdpConnect" class="inputFocusOut" placeholder="Mot de passe"/>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="formConnexion" class="boutonInscription" value="Envoyer"/>
						</td>
					</tr>
					<tr>
						<td>
							<a href="inscription.php">Pas de compte? Inscris toi!</a>
						</td>
					</tr>
					<tr>
						<td>
							<?php
								if (isset($erreur)) {
									echo "<font color='red'>" .$erreur. "</font>";
								}
							?>
						</td>
					</tr>
				</form>
			</table>
		</div>
		<div class="imageFond"></div>
	</div>
	<script src="inscription.js"></script>
</body>
</html>