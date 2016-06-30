<?php
class ModeleTimeline extends DBMapper{

	public static function getTimeline($id_serie){
		$query= self::$database->prepare('select * from serie where id_serie=?'); 
		$query->execute(array($id_serie)); 		
		$result=$query->fetchAll();
	return $result; 
	}
}
?>
