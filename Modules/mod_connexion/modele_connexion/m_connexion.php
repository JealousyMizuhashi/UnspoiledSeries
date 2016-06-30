<?php
class ModeleConnexion extends DBMapper {
	public static function testConnexion($pseudo, $mdp) {
		$req = self::$database->prepare ( "SELECT `idUser`, `login`, `typeCompte` FROM `user` WHERE `login` = ? AND `password` = ?" );
		$array [0] = $pseudo;
		$array [1] = ($mdp); // TODO HASHER LE MDP !
		$req->execute ( $array );
		$enregistrement = $req->fetch ( PDO::FETCH_ASSOC );
		
		
		if (isset ( $enregistrement ['idUser'] )) {
			if ($enregistrement ['typeCompte'] == 2) {
				$_SESSION ['estAdmin'] = true;
			}
			if ($enregistrement ['typeCompte'] == 1) {
				$_SESSION ['estModerateur'] = true;
			}
			if ($enregistrement ['typeCompte'] == 0) {
				$_SESSION ['estUtilisateur'] = true;
			}
			
			$_SESSION ['login_user'] = $enregistrement ['login'];
			$_SESSION ['id_user'] = $enregistrement ['idUser'];
			return $enregistrement ['idUser'];
		} 

		else {
			$_SESSION ['id_user'] = "";
			return null;
		}
	}
}
?>