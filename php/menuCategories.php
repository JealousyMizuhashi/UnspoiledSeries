<!-- Le menu des catégories -->

<nav id="categories">        
	<div class="element_categories">
		<h3>Liste catégories</h3>
		<ul>
			<li><a href="#">Personnages</a></li>
			<li><a href="#">Lieux</a></li>
			<li><a href="#">Evènements</a></li>
			<li><a href="#">Interviews</a></li>
		</ul>
		
		<form action="index.php" method="post">
			<label for="nombre-saison" id="label-nombre-saison">
				Jusqu'à quel saison avez vous avancé dans cette série?</br>
				<?php 
				$reponse = $bdd->query('SELECT nb_saison_serie FROM serie WHERE nom_serie =\'Game of Thrones\'');	//récupérer le nb de saison de la série(test)
				$donnees = $reponse->fetch(); 
				$nb_saison=$donnees['nb_saison_serie'];
				?>
			</label>
			<input type="range" id="nombre-saison" name="nombre-saison" step="1" value="0" min="0" max="<?php echo $nb_saison?>" oninput="document.getElementById('AfficheRange').textContent=value" />
			<span id="AfficheRange"></span>
			<?php
				echo '</br>';
				$reponse->closeCursor();
			?>
		</form>
	</div>    
</nav>