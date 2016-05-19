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
	
	<?php include_once("./php/connexion.php"); ?>
    <?php include_once("./php/entete.php"); ?>
    
    <!-- Le corps -->
    
    <div id="corps">
        <h1 style="text-align:center">Unspoiled Series</h1>
      
        <p>
            Bienvenue sur Unspoiled Series ! </br>
            Ici, vous pourrez trouver toutes les informations que vous désirez sur vos séries !
            Sans spoilers !
        </p>
		
		<nav id="menu">   			   
			<div class="element_menu">
			
				<?php 
					$reponse = $bdd->query('SELECT * FROM serie WHERE nom_serie =\'The Walking Dead\'');	
					$donnees = $reponse->fetch();
					$serie=$donnees['nom_serie'];	
					$nb_saison=$donnees['nb_saison_serie'];
				?>
	
				<h3>Liste séries</h3>
				<div ng-controller="MyController">
				<ul>
					<li><a ng-click="ShowHide()" href="#"><?php echo $serie ?></a></li>
					<li><a href="#">Série 2</a></li>
					<li><a href="#">Série 3</a></li>
				</ul>
				<nav id="categories">        
					<div class="element_categories" ng-hide="IsHidden">
						<h3>Liste catégories</h3>
						<ul>
							<li><a href="#">Personnages</a></li>
							<li><a href="#">Lieux</a></li>
							<li><a href="#">Evènements</a></li>
							<li><a href="#">Interviews</a></li>
				
							<form action="index.php" method="post">
								<label for="nombre-saison" id="label-nombre-saison">
									Jusqu'à quel saison avez vous avancé dans <?php echo $serie ?></br>

								</label>
								<input type="range" id="nombre-saison" name="nombre-saison" step="1" value="0" min="0" max="<?php echo $nb_saison?>" oninput="document.getElementById('AfficheRange').textContent=value" />
								<span id="AfficheRange"></span>
								<?php
									echo '<br/>';
									$reponse->closeCursor();
								?>
							</form>
						</ul>
					</div>    
				</nav>	
			</div>    
		</nav>
		
		

    </div>
    
    <?php include_once("./php/footer.php"); ?>
    
    </body>
</html>
