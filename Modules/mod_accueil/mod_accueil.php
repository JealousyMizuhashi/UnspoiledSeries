<?php

class Moduleaccueil extends ModuleGenerique {

	function __construct() {
		//$this->controleur = $ctrl;
		//$accueil='accueil';
		
	if(!isset($_GET["action"])){
		$_GET["action"] = 'accueil';
	}

		switch($_GET["action"]){
			case 'accueil':
				require_once( dirname(__FILE__).'/controleur_accueil/c_accueil.php');
				//$livre = $_GET['idLivre'];
				$this->controleur= new ControleurAccueil;
				$this->controleur->afficherSeries();
				break;
				
			case 'contact' :
				require_once( dirname(__FILE__).'/controleur_accueil/c_accueil.php');
				$this->controleur= new ControleurAccueil;
				$this->controleur->afficherPageContact();
				break;
		default :
			require_once( dirname(__FILE__).'/controleur_accueil/c_accueil.php');
			//$livre = $_GET['idLivre'];
			$this->controleur= new ControleurAccueil;
			$this->controleur->afficherSeries();
			break;
			
		}
		
		
	}
	
}
?>