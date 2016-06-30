<?php
class Moduletimeline extends ModuleGenerique {
	function __construct() {

		$timeline = "timeline";

		require_once (dirname ( __FILE__ ) . '/controleur_timeline/c_timeline.php');
		$idSerie = $_GET ['id'];
		$this->controleur = new ControleurTimeline ();
		$this->controleur->afficherTimeline ($idSerie);
				
	}
}

?>
