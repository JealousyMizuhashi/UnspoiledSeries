<?php class VueInscription {

	public static function afficherFormulaireInscription() {
		echo('
			<script type="text/javascript">
				function yesnoCheck() {
					if (document.getElementById(\'utilisateur\').checked) {
						document.getElementById(\'email\').style.visibility = \'hidden\';
					} else {
						document.getElementById(\'email\').style.visibility = \'visible\';
					}
				}
			</script>
		
			<h1 id="labelAccueil">INSCRIPTION</h1>

			<div id="formulaire" class="container">
				<div class="row">
					<form action="index.php?module=connexion&action=inscription" method="POST">
						<h2>Vous pouvez remplir rapidement ce formulaire pour vous inscrire. Vous pourrez ainsi proposer des liens vers des informations pour nous aider à agrandir notre site.</h2>
						<h2>Toute l\'équipe de Unspoiled Series vous remercie et vous souhaite la bienvenue.</h2>
						<input name="pseudo" type="text" placeholder="PSEUDO" id="pseudo" required>
						<input name="password" type="password" placeholder="MOT DE PASSE" id="password" required>
						<label for="utilisateur" style="padding-left:525px; padding-top:15px;"> Compte utilisateur </label>
						<input name="typeCompte" type="radio" value="0" id="utilisateur" checked onclick="javascript:yesnoCheck();">
						<label for="moderateur" style="padding-left:525px; padding-top:15px;"> Compte modérateur </label>
						<input name="typeCompte" type="radio" value="1" id="moderateur" onclick="javascript:yesnoCheck();"> 
						<input name="email" type="email" placeholder="EMAIL" id="email" style=visibility:hidden>
						<input type="submit" value="S\'INSCRIRE" id="bouton">
					</form>
				</div>
			</div>
		');
	}
	public static function afficherInscriptionReussie () {
		$log = $_POST['pseudo'];
		echo("Inscription de $log reussie. <br>");
	}
	public static function afficherInscriptionRatee() {
		echo("Inscription echouee. <br>");
	}
	
	public static function afficherPseudoDejaExistant ($pseudo) {
		echo("Le pseudo $pseudo est déjà utilisé, veuillez en choisir un autre <br>");
	}
	
}
?>
