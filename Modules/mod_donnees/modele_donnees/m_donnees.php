<?php
class ModeleDonnees extends DBMapper{
			
	public static function getDonnees($idCategorie, $idSerie, $idSaison, $nom){
		
		$query= self::$database->prepare('SELECT nom_information, texte_information, info_valide from information WHERE id_categorie_information=? AND id_serie_information=? AND saison_information<=? AND nom_information=?'); 
		$query->execute(array($idCategorie, $idSerie, $idSaison, $nom)); 		
		$result=$query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
}
?>
