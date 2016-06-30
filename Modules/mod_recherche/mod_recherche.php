<?php
class Modulerecherche extends ModuleGenerique {
	public function __construct() {
		$module = "recherche";
		require_once ("Modules/mod_$module/controleur_$module/controleur_$module.php");
		$this->controleur = new ControleurRecherche ();
		$this->controleur->afficherResultatsRecherche ( $_POST ['requete'] );
	}
}

?>


