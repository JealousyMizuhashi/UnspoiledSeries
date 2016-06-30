<?php
require_once ("Modules/mod_user/modele_user/m_user.php");
require_once ("Modules/mod_user/vue_user/v_user.php");
class ControleurUser extends ControleurGenerique {
	
	public function ajouter() {
		$existeDansLaBase = ModeleUser::informationExistante ($_POST['serie'], $_POST['categorie'], $_POST ['nomInfo'], $_POST['texteInfo'], $_POST['saison']);
		if (! $existeDansLaBase) {
			$ajoutReussie = ModeleUser::ajouterInfo ($_POST['serie'], $_POST['categorie'], $_POST['nomInfo'], $_POST['texteInfo'], $_POST['saison']);
			if ($ajoutReussie) {
				$this->constructView ( 'VueUser', 'afficherAjoutReussie', array () );
			} else
				$this->constructView ( 'VueUser', 'afficherAjoutRatee', array () );
		} else {
			$this->constructView ( 'VueUser', 'afficherInfoDejaExistante', array () );
		}
	}
	public function afficherFormulaireAjout() {
		$series = ModeleUser::getSeries();
		$this->constructView ( 'VueUser', 'afficherFormulaireAjout', array ($series) );
	}
	public function ajout() {
		if (isset($_POST['serie']) && isset($_POST['categorie']) &&  isset($_POST['nomInfo']) && isset($_POST['texteInfo']) && isset($_POST['saison'])) {
			$this->ajouter ();
		} else {
			$this->afficherFormulaireAjout ();
		}
	}
}
?>
