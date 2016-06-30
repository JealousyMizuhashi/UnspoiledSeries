<?php
class VueInformations {

	static function afficherInfos($stats) {	
		
		switch ($_GET['action']) {
			case 1: ?> <h1 id="labelAccueil">P E R S O N N A G E S</h1> <?php $categorie = "personnages"; $taille = "230px"; break;
			case 2: ?> <h1 id="labelAccueil">L I E U X</h1> <?php $categorie = "lieux"; $taille = "105px"; break;
			case 3: ?> <h1 id="labelAccueil">E V E N E M E N T S</h1> <?php $categorie = "evenements"; $taille = "105px"; break;
			case 4: ?> <h1 id="labelAccueil">I N T E R V I E W S</h1> <?php $categorie = "interviews"; $taille = "105px"; break;		
		}
		
		?>	
		<div class="container">
			<section id="ligne" class="row">
	
				<?php
				foreach ($stats as $value) {
					if ($value['info_valide'] == 1) {
						switch($_GET['action']) {
							case 1:
								?>
								<a href="index.php?module=donnees&action=<?php echo $_GET['action'];?>&idSerie=<?php echo $_GET['idSerie'];?>&idSaison=<?php echo $_GET['idSaison'];?>&nom=<?php echo $value['nom_information'];?>">
								<?php
								break;
							case 2:
								?>
								<a href="index.php?module=donnees&action=<?php echo $_GET['action'];?>&idSerie=<?php echo $_GET['idSerie'];?>&idSaison=<?php echo $_GET['idSaison'];?>&nom=<?php echo $value['nom_information'];?>">
								<?php
								break;
							case 3:
								?>
								<a href=<?php echo $value['texte_information'];?>  target="_blank">
								<?php
								break;
							case 4:
								?>
								<a href=<?php echo $value['texte_information'];?>  target="_blank">
								<?php
								break;
						}
						?>
							<div class="col-md-2">  
								<figure style="overflow:hidden;position:relative">
									<img src="./images/<?php echo $categorie;?>/<?php echo $value['nom_information'];?>.jpg"  alt="Image de <?php echo $value['nom_information'];?>" width="100%" height=<?php echo $taille;?>>
									<figcaption>
										<p id="auteur"><?php echo $value['nom_information'];?></p>
									</figcaption>
								</figure>
							</div>
						</a>
					<?php
					}
				}
				?>
			</section>
		</div>
		<?php		
	}
}
?>
