<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Unspoiled Series</title>
		<link href="./css/main.css" rel="stylesheet">
		<link href="./css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="http://localhost/UnspoiledSeries/UnspoiledSeries/angular.min.js"></script>
		<script type="text/javascript" src="http://localhost/UnspoiledSeries/UnspoiledSeries/UnspoiledSeries.js"></script>
	</head>
	<body ng-app="MyApp">
	<?php include_once("./php/connection.php"); ?>
	<?php include_once("./php/entete.php"); ?>
	<!-- Le corps -->
	<div id="corps">
		<h1 style="text-align:center">Unspoiled Series</h1>
		<p>
			Bienvenue sur Unspoiled Series ! </br>
			Ici, vous pourrez trouver toutes les informations que vous désirez sur vos séries !
			Sans spoilers !
		</p>
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
					?>
					</form>
					<?php
					$reponse->closeCursor();
					$reponse = $bdd->query('SELECT * FROM serie WHERE nom_serie=\'' . $_POST['serie_choisi'] . '\'');	
					while ($donnees = $reponse->fetch())
					{
					?>
					<div class="timeline">
						<form action="./index_liste_information.php" method="post">
								<label for="nombre-saison" id="label-nombre-saison">
									Jusqu'à quel saison avez vous avancé dans <?php echo $_POST['serie_choisi'] ?></br>
								</label>
								<!-- FORMULAIRE TIMELINE_SAISON + SERIE_CHOISI + CATEGORIE ------------------------------------------------------- -->
								<input type="range" step="1"  min="0" max="<?php echo $donnees['nb_saison_serie'] ?>" value="0" id="foo" name="saison_choisi" onchange='document.getElementById("bar").value = "Saison : " + document.getElementById("foo").value;'/>
								<input type="text" name="bar" id="bar" value="Saison : 0" disabled /> <!-- timeline par saison -->
								<br />
								<li><input type="submit" name="categorie_choisi" value="personnages" id="personnages" /></li>	<!-- catégorie -->
								<li><input type="submit" name="categorie_choisi" value="lieux" id="lieux" /></li>
								<li><input type="submit" name="categorie_choisi" value="evenements" id="evenements" /></li>
								<li><input type="submit" name="categorie_choisi" value="interviews" id="interviews" /></li>
								<input type="hidden" name="serie_choisi" value="<?php echo $_POST["serie_choisi"] ?>" id="POST_Seriechoisi"></input> <!-- serie_choisi -->
								<?php
								if(isset($_POST["saison_choisi"])){
								?>
									<input type="hidden" name="saison_choisi" value="<?php echo $_POST["saison_choisi"] ?>" id="POST_AfficheRange"></input>	<!-- saison -->
								<?php
								} else{}
								?>
								<!-- ------------------------------------------------------------------------------------------------------------- -->
						</form>
					</div>
					<?php
					}
					?>
				<?php
					echo '<br/>';
					$reponse->closeCursor();
				?>    	    
			</div>
	</nav>
	<?php include_once("./php/footer.php"); ?>
	</body>
</html>