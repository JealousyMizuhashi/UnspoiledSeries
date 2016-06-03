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
	
				<h3>Liste séries</h3>
				<div ng-controller="MyController">
				<ul>
					<?php 
						
						$reponse = $bdd->query('SELECT * FROM serie');
						
						// On affiche chaque entrée une à une
						while ($donnees = $reponse->fetch()) {
						?>
								<li><a ng-click="ShowHide()"> 
								<?php 
									echo $donnees['nom_serie'] 
								?>
								</a></li>
							<div class="<?php echo $donnees['nom_serie'] ?>" ng-hide="IsHidden">
							<label for="nombre-saison" id="label-nombre-saison">
								Jusqu'à quel saison avez vous avancé dans <?php echo $donnees['nom_serie'] ?></br>
							</label>
							<input type="range" id="nombre-saison" name="nombre-saison" step="1" value="0" min="0" max="<?php echo $donnees['nb_saison_serie'] ?>" oninput="document.getElementById('AfficheRange').textContent=value" />
							<span id="AfficheRange"></span> <!-- oninput = event JavaScript quand une valeur ou texte est changé, ici c'est le mouvement du curseur. On récupre la valeur dans l'input range, puis l'affiche avec span, équivalent d'un div sans saut de ligne -->								
							</div> 
						<?php
						}
					
					?>
				</ul>
				<nav id="categories">  
					<div class="<?php echo $donnees['nom_serie'] ?>" ng-hide="IsHidden">
						<h3>Liste catégories</h3>
						<ul>
							<li><a href="#">Personnages</a></li>
							<li><a href="#">Lieux</a></li>
							<li><a href="#">Evènements</a></li>
							<li><a href="#">Interviews</a></li>
				
					</div>		
							
							<?php
								echo '<br/>';
								$reponse->closeCursor();
							?>
							
						</ul>
					</div>    
				</nav>	
			</div>    
		</nav>
		
		

    </div>
    
    <?php include_once("./php/footer.php"); ?>
    
    </body>
</html>
