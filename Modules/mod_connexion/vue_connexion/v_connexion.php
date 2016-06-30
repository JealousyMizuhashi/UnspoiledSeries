<?php
class VueConnexion {
	public static function afficherFormulaireConnexion() {
		echo ('        
<!--        Module de connexion-->
        

				<div  id="moduleConnexion">
					<form method="post" action="index.php?module=connexion&action=connexion">
						<fieldset>
							<legend>Connexion</legend>
							<label for="username" > Login : </label><input name="pseudo" type="text" id="username">
							<label for="password" id="labelPass"> Mot de passe : </label><input name="password" type="password" id="password">
							<button type="submit" class="btn btn-primary btn-lg" id="butConnexion">Connexion</button>
						</fieldset>
					</form>
					<a href="index.php?module=connexion&action=inscription">Sinscrire</a>
				</div>
					');
		
// 				<form action="index.php?module=connexion&action=inscription">
// 				<input type="submit" class="btn btn-primary btn-lg" id="butConnexion" value="Inscription">
// 				</form>

	}
	public static function affichageConnecte() {
		//$log = $_SESSION ['login_user'];
		//echo ("Vous êtes connecté en tant que $log <br>");
		header('Location: index.php');
	}
	public static function affichageErreurConnexion() {
		echo ("Connexion échouée, mauvais login et/ou mot de passe.<br>");
	}
}

?>
