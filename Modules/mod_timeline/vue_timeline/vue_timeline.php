<meta charset="utf-8" />

<?php
class VueTimeline {

	static function afficherTimeline($serie) {
	
		if (!isset($_POST['saisonChoisi'])) {
			$idSaison = "0";
		} else {
			$idSaison = $_POST['saisonChoisi'];
		}
		?>
	
		<div class="container">
			<form method="post">
				<div class="col-md-12">
					<h1 id="labelAccueil">INFOS SUR <?php echo $serie["nom_serie"];?>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<img src="./images/series/<?php echo $serie["nom_serie"];?>.jpg"  alt="Image de <?php echo $serie['nom_serie'];?>" width="100%">
				</div>
				<div class="col-md-4"></div> 
				
				<div class="col-md-12" id="timeline">
					<h2>O&ugrave; en &ecirc;tes-vous dans <?php echo $serie["nom_serie"];?> : </h2><br>
					<input type="range" step="1" min="0" max=<?php echo $serie["nb_saison_serie"];?> value=<?php echo $idSaison;?> id="time" oninput="outputIdSaison.value = this.value; saisonChoisi.value = this.value" onchange="this.form.submit();"/>
					<output id="outputIdSaison"> <?php echo $idSaison;?> </output>
					<input type="hidden" id="saisonChoisi" name="saisonChoisi" value=""/>
				</div>
			</form>
			
			<div class="col-md-3" id="menuInfos">
				<a href="index.php?module=informations&action=1&idSerie=<?php echo $serie['id_serie'];?>&idSaison=<?php echo $idSaison;?>"> Personnages </a> <br>
				<a href="index.php?module=informations&action=2&idSerie=<?php echo $serie['id_serie'];?>&idSaison=<?php echo $idSaison;?>"> Lieux </a> <br>
				<a href="index.php?module=informations&action=3&idSerie=<?php echo $serie['id_serie'];?>&idSaison=<?php echo $idSaison;?>"> Ev&eacutenements </a> <br>
				<a href="index.php?module=informations&action=4&idSerie=<?php echo $serie['id_serie'];?>&idSaison=<?php echo $idSaison;?>"> Interviews </a> 
			</div>
		</div>
		
		<?php 
		
	}
}
?>
