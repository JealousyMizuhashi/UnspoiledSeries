<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Unspoiled Series</title>
		<link href="../css/main.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="http://localhost/UnspoiledSeries/UnspoiledSeries/angular.min.js"></script>
		<script type="text/javascript" src="http://localhost/UnspoiledSeries/UnspoiledSeries/UnspoiledSeries.js"></script>
    </head>
 
    <body ng-app="MyApp">
	
	<?php //include_once("./php/connexion.php"); ?>
	<?php
	$host = 'mysql:host=localhost;dbname=unspoiledseries'; /* L'adresse du serveur */
	$login = 'root'; /* Votre nom d'utilisateur */
	$password = ''; /* Votre mot de passe */
	try
	{
		$bdd = new PDO($host, $login, $password);
	}
	catch (Exception $e)
	{
		   die('Erreur : ' . $e->getMessage());
	}
?>
    <?php include_once("entete.php"); ?>
    <!-- Le corps -->
	
    <div id="corps">
        <h1 style="text-align:center">Unspoiled Series</h1>
      
        <p>
            Bienvenue sur Unspoiled Series ! </br>
            Ici, vous pourrez trouver toutes les informations que vous désirez sur vos séries !
            Sans spoilers !
        </p>
		<p><?php echo $_POST['serie_choisi']; ?></p>
	</div>
	<nav id="menu">   			   
			<div class="element_menu">
				<h3>Liste séries</h3>
				<form method="post" action="./index_timeline.php">
				<?php 
					$reponse = $bdd->query('SELECT * FROM serie');	
					while ($donnees = $reponse->fetch())
					{
				?>
					<input type="submit" name="serie_choisi" value="<?php echo $donnees['nom_serie'] ?>" id="<?php echo $donnees['nom_serie'] ?>" /><br />       
					
					<?php
					}
					$reponse->closeCursor();
					$reponse = $bdd->query('SELECT * FROM serie WHERE nom_serie=\'' . $_POST['serie_choisi'] . '\'');	
					while ($donnees = $reponse->fetch())
					{
					?>
					<div class="timeline">
						<form action="index.php" method="post">
                                <label for="nombre-saison" id="label-nombre-saison">
                                    Jusqu'à quel saison avez vous avancé dans <?php echo $_POST['serie_choisi'] ?></br>
                                </label>
     
                                <input type="range" id="nombre-saison" name="nombre-saison" step="1" value="0" min="0" max="<?php echo $donnees['nb_saison_serie'] ?>" oninput="document.getElementById('AfficheRange').textContent=value" />
                                <span id="AfficheRange"></span>
						</form>
					</div>
					<?php
					}
					?>
				</form>
				<?php
					echo '<br/>';
					$reponse->closeCursor();
                ?>
					<h3>Liste catégories</h3>
					<ul>
						<li><a href="#">Personnages</a></li>
						<li><a href="#">Lieux</a></li>
						<li><a href="#">Evènements</a></li>
						<li><a href="#">Interviews</a></li>
					</ul>    	    
	
    </div>
	</nav>
    <?php include_once("./footer.php"); ?>
    
    </body>
</html>