<?php
$module = "connexion";
require_once ("./Modules/mod_connexion/vue_$module/v_deconnexion.php");
require_once ("./Modules/mod_connexion/modele_$module/m_deconnexion.php");

class Controleurdeconnexion extends ControleurGenerique{
	public function deconnecter() {
		if (isset ( $_SESSION ['id_user'] )) {
			if (empty ( $_SESSION ['id_user'] ))
				echo "Il faut etre connecte pour pouvoir se deconnecter";
			else {
				$deconnexionReussie = ModeleDeconnexion::deconnexion ();
				if ($deconnexionReussie)
					$this->constructView('VueDeconnexion','deconnexionReussie',array());
				else
					$this->constructView('VueDeconnexion','deconnexionRatee',array());

			}
		} 

		else {
			echo "Il faut etre connecte pour pouvoir se deconnecter";
		}
	}
}

?>
