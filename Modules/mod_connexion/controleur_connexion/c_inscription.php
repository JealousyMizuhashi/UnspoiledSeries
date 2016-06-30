<?php
$module = "connexion";
require_once ("./Modules/mod_connexion/vue_$module/v_inscription.php");
require_once ("./Modules/mod_connexion/modele_$module/m_inscription.php");
class Controleurinscription extends ControleurGenerique {
	public function inscrire() {
		if (! isset ( $_SESSION ['id_user'] ) || empty ( $_SESSION ['id_user'] )) {
			$existeDansLaBase = ModeleInscription::utilisateurExisteDansLaBase ( $_POST ['pseudo'] );
			if (! $existeDansLaBase) {
				$inscriptionReussie = ModeleInscription::ajouterUser ( $_POST ['pseudo'], $_POST ['password'], $_POST ['email'], $_POST['typeCompte']);
				if ($inscriptionReussie) {
					$this->constructView ( 'VueInscription', 'afficherInscriptionReussie', array () );
				} else
					$this->constructView ( 'VueInscription', 'afficherInscriptionRatee', array () );
			} else {
				$this->constructView ( 'VueInscription', 'afficherPseudoDejaExistant', array (
						$_POST ['pseudo'] 
				) );
			}
		} else {
			echo ("Vous &ecirc;tes d&eacute;j&agrave; connect&eacute; ! Vous ne pouvez pas vous inscrire. <br>");
		}
	}
	public function afficherFormulaireInscription() {
		if (! isset ( $_SESSION ['id_user'] ) || empty ( $_SESSION ['id_user'] )) {
			$this->constructView ( 'VueInscription', 'afficherFormulaireInscription', array () );
		}
	}
	public function inscription() {
		if (! isset ( $_SESSION ['id_user'] ) || empty ( $_SESSION ['id_user'] )) {
			if (isset ( $_POST ['pseudo'] ) && isset ( $_POST ['password'] ) ) {
				$this->inscrire ();
			} else {
				$this->afficherFormulaireInscription ();
			}
		}
	}
}
?>