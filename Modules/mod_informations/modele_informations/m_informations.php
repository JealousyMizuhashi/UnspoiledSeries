<?php
class ModeleInformations extends DBMapper{
			
	public static function getInfos($idCategorie, $idSerie, $idSaison){
		
		$query= self::$database->prepare('SELECT DISTINCT nom_information, texte_information, info_valide from information WHERE id_categorie_information=? AND id_serie_information=? AND saison_information<=? GROUP BY nom_information'); 
		$query->execute(array($idCategorie, $idSerie, $idSaison)); 		
		$result=$query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
}
?>
