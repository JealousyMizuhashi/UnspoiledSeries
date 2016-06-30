<?php
class Moduleinformations extends ModuleGenerique {
	function __construct() {
	
		require_once (dirname ( __FILE__ ) . '/controleur_informations/c_informations.php');
		$idCategorie = $_GET['action'];
		$idSerie = $_GET['idSerie'];
		$idSaison = $_GET['idSaison'];
		$this->controleur = new ControleurInformations();
		$this->controleur->afficheInfos ($idCategorie, $idSerie, $idSaison );	
	}
}
?>
