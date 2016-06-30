<?php
class ModeleDeconnexion extends DBMapper{
	public static function deconnexion(){
		$sessionDetruite=session_destroy();
		return $sessionDetruite;
	}
}
?>
