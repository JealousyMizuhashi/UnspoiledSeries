<?php
class ModeleAccueil extends DBMapper{
	static function recupererSeries(){
		$req=self::$database->prepare('select * from serie');
		$req->execute();
		$series=$req->fetchAll(PDO::FETCH_ASSOC);
		
		return $series;
		
	}
	
	static function afficherPageContact(){
		
	}
	
	
}