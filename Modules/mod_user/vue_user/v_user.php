<?php
class VueUser {
	
	public static function afficherFormulaireAjout($series) {
	?>
		<h1 id="labelAccueil">Suggestion d'information</h1>

		<div id="formulaire" class="container">
			<div class="row">
				<form  action="index.php?module=user&action=ajoutInformations" method="POST">
					<select name="serie">
					<?php
						foreach ($series as $value) {
						?>
							<option value=<?php echo $value['id_serie'];?>> <?php echo $value['nom_serie'];?> </option>
						<?php
						}
					?>
					</select>	
					
					<input name="saison" type="text" placeholder="SAISON" id="saison" required>
					
					<select name="categorie">
						<option value="1"> Personnages </option>
						<option value="2"> Lieux </option>
						<option value="3"> Ev&eacute;nements </option>
						<option value="4"> Interviews </option>					
					</select>
					
					<input name="nomInfo" type="text" placeholder="NOM" id="nomInfo" required>
					<input name="texteInfo" type="text" placeholder="TEXTE / LIEN" id="texteInfo" required>
				
					<input type="submit" value="AJOUT" id="bouton">
				</form>
			</div>       
		</div>
	<?php
	}
	public static function afficherAjoutReussie() {
		$nomInfo = $_POST ['nomInfo'];
		echo ("Ajout de $nomInfo r&eacute;ussie. <br>");
	}
	public static function afficherAjoutRatee() {
		echo ("Echec de l'ajout. <br>");
	}
	public static function afficherInfoDejaExistante($nomInfo) {
		echo ("L'information $nomInfo est deja dans la base de données, veuillez en choisir un autre <br>");
	}
}
?>
