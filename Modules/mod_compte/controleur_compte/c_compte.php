<?php
// /include_once("Modules/mod_accueil/modele_produit/m_produit.php");
include_once ("Modules/mod_compte/vue_compte/v_compte.php");
include_once ("Modules/mod_compte/modele_compte/m_compte.php");
class ControleurCompte extends ControleurGenerique {
	public function afficherInformations() {
		$idUser = $_SESSION ['id_user'];
		$infos = ModeleCompte::recupererInformations ( $idUser );
		$this->constructView ( "VueCompte", "affichageInformations", array (
				$infos 
		) );
	}
	public function modifierInformations() {
		$idUser = $_SESSION ['id_user'];
		if (isset ( $_POST ['nom'] ) && isset ( $_POST ['prenom'] ) && isset ( $_POST ['adresse'] ) && isset ( $_POST ['codePostal'] ) && isset ( $_POST ['pseudo'] ) && isset ( $_POST ['password'] )) {
			$nom = $_POST ['nom'];
			$prenom = $_POST ['prenom'];
			$adresse = $_POST ['adresse'];
			$codePostal = $_POST ['codePostal'];
			$pseudo = $_POST ['pseudo'];
			$passwd = $_POST ['password'];
			$email = $_POST ['email'];
			ModeleCompte::modifierInformations ( $idUser, $nom, $prenom, $adresse, $codePostal, $pseudo, $passwd, $email );
			$infos = ModeleCompte::recupererInformations ( $idUser );
			$this->constructView ( "VueCompte", "affichageInformations", array (
					$infos 
			) );
		} else
			ControleurCompte::afficherInformations ();
	}
}