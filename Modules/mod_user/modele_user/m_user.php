<?php

class ModeleUser extends DBMapper {
	
	public static function ajouterInfo($serie, $categorie, $nomInfo, $texteInfo, $saison) {
		$req = self::$database->prepare ( "INSERT INTO information(nom_information, texte_information, id_categorie_information, id_serie_information, saison_information, info_valide) VALUES (?, ?, ?, ?, ?, false)" );
		$count = $req->execute ( array($nomInfo, $texteInfo, $categorie, $serie, $saison));

		if ($count === false)
			return false;
		if ($count === 0)
			return false;
		if ($count != 0 && $count != false) {
			return true;
		}
	}
	
	public static function getSeries() {
		$req = self::$database->prepare("SELECT id_serie, nom_serie from serie ORDER BY nom_serie");
		$req->execute();
		$series = $req->fetchAll(PDO::FETCH_ASSOC);
		return $series;
	}

	public static function informationExistante($serie, $categorie, $nomInfo, $texteInfo, $saison) {	
		$req = self::$database->prepare ( "SELECT * from information WHERE id_serie_information=? AND id_categorie_information=? AND nom_information=? AND texte_information=? AND saison_information=?" );
		$req->execute ( array($serie, $categorie, $nomInfo, $texteInfo, $saison));
		$count = $req->rowCount ();
		if ($count === 0)
			return false;
		if ($count > 0)
			return true;
	}
}

?>
