<?php
class ModeleCompte extends DBMapper{
	static function recupererInformations($idUser){
		$req=self::$database->prepare('select * from lemon_user where idUser=? ');
		$req->execute(array($idUser));
		$infos	=$req->fetchAll(PDO::FETCH_ASSOC);

		return $infos;
		
	}
	
	static function modifierInformations($idUser,$nom,$prenom,$adresse,$codePostal,$pseudo,$passwd, $email){
		$req=self::$database->prepare('UPDATE `lemon_user` SET `login`=?,`password`=?,`nom`=?,`prenom`=?,`adresse`=?,`codePostal`=?, email=? WHERE idUser=?');
		$req->execute(array($pseudo,$passwd,$nom,$prenom,$adresse,$codePostal,$email, $idUser));
	}
}