<?php

class Moduleconnexion extends ModuleGenerique{
	public function __construct() {
		$module = "connexion";
		if (isset ( $_GET ['action'] ))
			$action = $_GET ['action'];
		else
			$action = 'connexion';

		switch ($action) {
			case 'connexion' :
				require_once("Modules/mod_$module/controleur_$module/c_connexion.php");
				$this->controleur= new Controleurconnexion;
				$this->controleur->connecter();
				break;
			case 'inscription' :
				require_once ("Modules/mod_$module/controleur_$module/c_inscription.php");
				$this->controleur=new Controleurinscription ();
				$this->controleur->inscription();
				break;
			case 'deconnexion' :
				require_once ("Modules/mod_$module/controleur_$module/c_deconnexion.php");
				$this->controleur=new Controleurdeconnexion;
				$this->controleur->deconnecter ();
				break;
			default :
				require_once("Modules/mod_$module/controleur_$module/c_connexion.php");
				$this->controleur= new Controleurconnexion;
				$this->controleur->connecter();
				break;
		}
	}
	public  function estConnecte() {
		if (isset ( $_SESSION ['id_user'] ) && ! empty ( $_SESSION ['id_user'] ))
			return true;
		else
			return false;
	}
}

?>
