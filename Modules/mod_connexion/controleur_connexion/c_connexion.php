<?php
$module = "connexion";
require_once ("./Modules/mod_$module/vue_$module/v_connexion.php");
require_once ("./Modules/mod_$module/modele_$module/m_connexion.php");
class Controleurconnexion extends ControleurGenerique {

	public function connecter() {
		if (isset ( $_POST ['pseudo'] ) && isset ( $_POST ['password'] )) {
			$idConnexion = ModeleConnexion::testConnexion ( $_POST ['pseudo'], $_POST ['password'] );
			if (isset ( $idConnexion ) && $idConnexion != false) {
				$this->constructView ( 'VueConnexion', 'affichageConnecte', array () );
			} else {
					$this->constructView ( 'VueConnexion', 'affichageErreurConnexion', array () );
			}
		}
		else {
			// On ne peut jamais aller ici 
			echo("pseudo et password ne sont pas set");
		}
	}
}

?>
