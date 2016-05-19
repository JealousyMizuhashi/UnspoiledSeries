<?php

	$host = 'mysql:host=localhost;dbname=unspoiledseries'; /* L'adresse du serveur */
	$login = 'root'; /* Votre nom d'utilisateur */
	$password = ''; /* Votre mot de passe */

	try
	{
		$bdd = new PDO($host, $login, $password);
	}
	catch (Exception $e)
	{
		   die('Erreur : ' . $e->getMessage());
	}
?>