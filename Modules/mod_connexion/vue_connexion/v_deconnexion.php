<?php
class VueDeconnexion {
	public static function deconnexionReussie() {
		// echo("Vous avez ete deconnecte !<br>");
		header('Location: index.php');
	}	
	public static function deconnexionRatee() {
		echo("Deconnexion ratee <br>");
	}
}
?>