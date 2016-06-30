<?php
// if(!defined("TEST_INCLUDE")
// die("Vous ne pouvez pas accéder à cette page du site");
class ModeleInscription extends DBMapper {
	public static function ajouterUser($login, $password, $email, $typeCompte) {
		$req = self::$database->prepare ( "INSERT INTO `user`(`login`, `password`, `email`, `typeCompte`) VALUES (?, ?, ?,  ?)" );
		$array [0] = $login;
		$array [1] = $password; // TODO HASHAGE DU MOT DE PASSE !
		$array [2] = $email;
		$array [3] = $typeCompte;
		$count = $req->execute ( $array );

		if ($count === false)
			return false;
		if ($count === 0)
			return false;
		if ($count != 0 && $count != false) {
			return true;
		}
	}
	public static function utilisateurExisteDansLaBase($pseudo) {
		$req = self::$database->prepare ( "select * from user where login=?" );
		$array [0] = $pseudo;
		$req->execute ( $array );
		$count = $req->rowCount ();
		if ($count === 0)
			return false;
		if ($count > 0)
			return true;
	}
}

?>
