<?php
class VueDonnees {

	static function afficherDonnees($stats) {	
		
		foreach ($stats as $value) {
			$nom = $value['nom_information'];
		}
		?>
		<div class="col-md-12">
			<h1 id="labelAccueil"> <?php echo $nom;?></h1>
		</div>
		<?php
		foreach ($stats as $value) {
			if ($value['info_valide'] == 1) {
			?>	
				<div class="col-md-4" style="text-align:justify">
					<?php
					echo '<br/>'.$value['texte_information'].'<br/>';
					?>
				</div>
			<?php
			}
		}
	}
}
?>
