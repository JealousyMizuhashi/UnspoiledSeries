<?php

$module ="recherche";
require_once ("./Modules/mod_$module/vue_$module/vue_$module.php");
require_once ("./Modules/mod_$module/modele_$module/modele_$module.php");

class ControleurRecherche extends ControleurGenerique {
	
	public function afficherResultatsRecherche ($requete) {
			$resultats = ModeleRecherche::getResultatsRecherche($requete); 	
			$this->constructView("VueRecherche", "afficherRechercheAccueil", array($resultats, $requete));
			unset($_POST['requete']);
		
	}
}
?>
