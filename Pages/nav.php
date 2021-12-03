 <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="Style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Home</title>
  </head>
 <?php if(isset($_SESSION['id'])){
    echo "<a class=\"light\" href=\"profil.php?pseudo=".$_SESSION['pseudo']."\">".$_SESSION['pseudo']."</a>";
  } else {
    echo "<a class=\"light\" href=\"connexion.php\">Connexion</a>
      <a class=\"light\" href=\"inscription.php\">Pas encore inscrit ? Clique ici</a>";
  }
  	echo "  <a class=\"light\" href=\"accueil.php\">Accueil</a>";
  ?>
  <header>
  	
    <a class="fr"><img src="../Images/Fr_flag.png" alt=""></a>
    <a class="en"><img src="../Images/En_flag.png" alt=""></a>
    <a class="es"><img src="../Images/Es_flag.png" alt=""></a>
    <a class="it"> <img src="../Images/It_flag.png" alt=""></a>
    <a class="dark_mode"><img src="../Images/Moon.png" alt=""></a>
    <a class="light_mode"><img src="../Images/Sun.png" alt=""></a>

</header>
	<script src="../Script/jquery-3.6.0.min.js"></script>
	<script src="../Script/JavaScript.js"></script>