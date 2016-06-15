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
		
		<p><?php //echo "serie : ". $_POST['serie_choisi'];  ?></p>
		<p><?php //echo "saison : ". $_POST['saison_choisi'];  ?></p>
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
					echo '<br/>';
					$reponse->closeCursor();
                ?>   	    
			</div>
			<?php 
					//récupération de l'id_catégorie correspondande dans la bdd
					$reponse = $bdd->query('SELECT * FROM categorie WHERE nom_categorie=\'' . $_POST['categorie_choisi'] . '\'');	
					while ($donnees = $reponse->fetch())
					{
					    $id_categorie_choisi=$donnees['id_categorie'];
					}
					$reponse->closeCursor();
					
					//récupération de l'id_catégorie correspondande dans la bdd
					$reponse = $bdd->query('SELECT * FROM serie WHERE nom_serie=\'' . $_POST['serie_choisi'] . '\'');	
					while ($donnees = $reponse->fetch())
					{
					    $id_serie_choisi=$donnees['id_serie'];
					}
					$reponse->closeCursor();
	
					$saison_choisi = $_POST['saison_choisi'];
	
					//affichage des informations en prenant en compte la catégorie + la saison + la série
					$reponse = $bdd->query('SELECT DISTINCT nom_information FROM information WHERE 
					id_categorie_information=\'' . $id_categorie_choisi . '\' &&
					saison_information<=\'' . $saison_choisi . '\' &&
					id_serie_information=\'' . $id_serie_choisi . '\'');
					?>					
					<form action="./index_information.php" method="post">
						<?php
						while ($donnees = $reponse->fetch())
						{
						?>
								<input type="submit" name="nom_choisi_info" value="<?php echo $donnees['nom_information'] = utf8_encode($donnees['nom_information']) ?>" id="<?php echo $donnees['nom_information'] ?>" /><br />	<!-- nom de l'information -->
						<?php		
						}
						?>
							<input type="hidden" name="serie_choisi_info" value="<?php echo $_POST['serie_choisi'] ?>" id="POST_Seriechoisi"></input> <!-- serie_choisi -->
							<input type="hidden" name="saison_choisi_info" value="<?php echo $_POST["saison_choisi"] ?>" id="POST_AfficheRange"></input>	<!-- saison -->
							<input type="hidden" name="categorie_choisi_info" value="<?php echo $id_categorie_choisi ?>" id="POST_Categoriechoisi"></input>	<!-- categorie -->
					</form>
				
				<?php
					echo '<br/>';
					$reponse->closeCursor();
                ?>
	</nav>
    <?php include_once("./php/footer.php"); ?>
    
    </body>
</html>