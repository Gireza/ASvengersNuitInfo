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
  	echo "<a class=\"light\" href=\"accueil.php\">Accueil</a>";
  ?>
  <header>
  	<label>Rechercher par siècle : </label>
    <select name="date" id="requin">
        <option value="21">21° siècle</option>
        <option value="20">20° siècle</option>
        <option value="19">19° siècle</option>
        <option value="18">18° siècle</option>
        <option value="17">17° siècle</option>
        <option value="16">16° siècle</option>
    </select>
    <label>Première lettre du Nom ou Prénom recherché:</label>
    <select name="alpha" id="duaphin">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="F">F</option>
        <option value="G">G</option>
        <option value="H">H</option>
        <option value="I">I</option>
        <option value="J">J</option>
        <option value="K">K</option>
        <option value="L">L</option>
        <option value="M">M</option>
        <option value="N">N</option>
        <option value="O">O</option>
        <option value="P">P</option>
        <option value="Q">Q</option>
        <option value="R">R</option>
        <option value="S">S</option>
        <option value="T">T</option>
        <option value="U">U</option>
        <option value="X">X</option>
        <option value="V">V</option>
        <option value="W">W</option>
        <option value="Y">Y</option>
        <option value="Z">Z</option>
    </select>
    <a class="fr"><img src="../Images/Fr_flag.png" alt=""></a>
    <a class="en"><img src="../Images/En_flag.png" alt=""></a>
    <a class="es"><img src="../Images/Es_flag.png" alt=""></a>
    <a class="it"> <img src="../Images/It_flag.png" alt=""></a>
    <a class="dark_mode"><img src="../Images/Moon.png" alt=""></a>
    <a class="light_mode"><img src="../Images/Sun.png" alt=""></a>
    
</header>
	<script src="../Script/jquery-3.6.0.min.js"></script>
	<script src="../Script/JavaScript.js"></script>