<?php

include_once("Modules/mod_timeline/modele_timeline/m_timeline.php"); 
include_once("Modules/mod_timeline/vue_timeline/vue_timeline.php"); 

class ControleurTimeline extends ControleurGenerique{

	function afficherTimeline($id_serie){
		$timeline=ModeleTimeline::getTimeline($id_serie);		
		$this->constructView('VueTimeline','afficherTimeline',$timeline); 	
	}
}
?>


