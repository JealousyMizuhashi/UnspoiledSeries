<?php
class Modulecompte extends ModuleGenerique {
	function __construct() {
		// $this->controleur = $ctrl;
		if (isset ( $_GET ['action'] ))
			$compte = $_GET ['action'];
		else
			$compte = 'compte';
		
		switch ($compte) {
			case 'compte' :
				require_once (dirname ( __FILE__ ) . '/controleur_compte/c_compte.php');
				$this->controleur = new ControleurCompte ();
				$this->controleur->afficherInformations ();
				break;
			case 'modifier' :
				require_once (dirname ( __FILE__ ) . '/controleur_compte/c_compte.php');
				$this->controleur = new ControleurCompte ();
				$this->controleur->modifierInformations ();
				break;
			default :
				require_once (dirname ( __FILE__ ) . '/controleur_compte/c_compte.php');
				$this->controleur = new ControleurCompte ();
				$this->controleur->afficherInformations ();
				break;
		}
	}
}
?>