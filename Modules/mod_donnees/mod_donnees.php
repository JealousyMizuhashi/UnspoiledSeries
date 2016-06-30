<?php
class Moduledonnees extends ModuleGenerique {
	function __construct() {
	
		require_once (dirname ( __FILE__ ) . '/controleur_donnees/c_donnees.php');
		$idCategorie = $_GET['action'];
		$idSerie = $_GET['idSerie'];
		$idSaison = $_GET['idSaison'];
		$nom = $_GET['nom'];
		$this->controleur = new ControleurDonnees();
		$this->controleur->afficheDonnees ($idCategorie, $idSerie, $idSaison, $nom);	
	}
}
?>
