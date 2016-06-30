<?php
class ModuleUser extends ModuleGenerique {
	public function __construct() {
		if (isset ( $_SESSION ['estUtilisateur'] ) && $_SESSION ['estUtilisateur'] == true) {
			$module = "user";
			if (isset ( $_GET ['action'] ))
				$action = $_GET ['action'];
			else
				$action = 'ajoutInformations';
			require_once ("Modules/mod_$module/controleur_$module/c_user.php");
			$this->controleur = new ControleurUser ();
			switch ($action) {
				case 'ajoutInformations' :
					$this->controleur->ajout ();
					break;
			}
		} else
			exit ( 'Vous devez être administrateur pour accéder à cette partie du site.' );
	}
}
?>
