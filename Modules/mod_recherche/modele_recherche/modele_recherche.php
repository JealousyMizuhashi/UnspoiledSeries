<?php
class ModeleRecherche extends DBMapper {
	
	public static function getResultatsRecherche($requete) {
		$req = self::$database->prepare ( "select * from serie where nom_serie LIKE \"%$requete%\"" );

		$query= $req->execute(array($requete));
		$resultats = $req->fetchAll();
		$count = $req->rowCount();
		if ($count === 0){ 
			return null;
		}
		else{
			return $resultats;
		}
	}
}
?>





