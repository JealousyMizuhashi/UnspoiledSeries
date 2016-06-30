<?php
///include_once("Modules/mod_accueil/modele_produit/m_produit.php");
include_once("Modules/mod_accueil/vue_accueil/v_accueil.php");
include_once("Modules/mod_accueil/modele_accueil/m_accueil.php");

class ControleurAccueil extends ControleurGenerique{
	public function afficherSeries(){
		$series=ModeleAccueil::recupererSeries();
		$this->constructView("VueAccueil", "affichageSeries", array($series));
	}
	
	public function afficherPageContact(){
		$this->constructView("VueAccueil", "afficherPageContact", array());
	}
}