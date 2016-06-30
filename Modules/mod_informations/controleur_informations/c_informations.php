<?php

include_once("Modules/mod_informations/modele_informations/m_informations.php"); 
include_once("Modules/mod_informations/vue_informations/vue_informations.php"); 

class ControleurInformations extends ControleurGenerique{
	
	function afficheInfos($idCategorie, $idSerie, $idSaison){
		$infos=ModeleInformations::getInfos($idCategorie, $idSerie, $idSaison);		
		$this->constructView('VueInformations','afficherInfos',array($infos)); 	
	}
}
?>

