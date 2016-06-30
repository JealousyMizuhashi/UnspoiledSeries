<?php

include_once("Modules/mod_donnees/modele_donnees/m_donnees.php"); 
include_once("Modules/mod_donnees/vue_donnees/vue_donnees.php"); 

class ControleurDonnees extends ControleurGenerique{
	
	function afficheDonnees($idCategorie, $idSerie, $idSaison, $nom){
		$donnees=ModeleDonnees::getDonnees($idCategorie, $idSerie, $idSaison, $nom);		
		$this->constructView('VueDonnees','afficherDonnees',array($donnees)); 	
	}
}
?>

