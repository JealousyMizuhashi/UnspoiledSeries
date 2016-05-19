<?php
	//include_once("./connexion.php");
	$host = 'mysql:host=localhost'; /* L'adresse du serveur */
	$login = 'root'; /* Votre nom d'utilisateur */
	$password = ''; /* Votre mot de passe */

	try
	{
		if($bdd = new PDO($host, $login, $password)) echo 'BDD OK !';
	}
	catch (Exception $e)
	{
		   die('Erreur : ' . $e->getMessage());
	}
	
	$req = "DROP DATABASE `unspoiledseries`";
	$bdd->prepare($req)->execute(); 
	
	$req = "CREATE DATABASE IF NOT EXISTS `unspoiledseries`";
	$bdd->prepare($req)->execute();
	
	$req = "USE unspoiledseries";
	$bdd->prepare($req)->execute();
	
	$req = "CREATE TABLE categorie(
    id_categorie INT NOT NULL AUTO_INCREMENT,
    nom_categorie VARCHAR(64) NOT NULL,
    PRIMARY KEY (id_categorie),
    UNIQUE (nom_categorie)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8";
	
	$bdd->prepare($req)->execute(); 
	
	$req = "CREATE TABLE serie(
    id_serie INT NOT NULL AUTO_INCREMENT,
    nb_saison_serie INT UNSIGNED NOT NULL,
	nom_serie VARCHAR(128) NOT NULL,
    PRIMARY KEY (id_serie),
    UNIQUE (nom_serie)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8";
	
	$bdd->prepare($req)->execute(); 

	$req = "CREATE TABLE saison(
    id_saison INT NOT NULL AUTO_INCREMENT,
    num_saison INT UNSIGNED NOT NULL,
	id_serie_saison INT NOT NULL,
    PRIMARY KEY (id_saison)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8";
    //FOREIGN KEY (id_serie_saison) REFERENCES serie (id_serie)
    //)ENGINE=InnoDB DEFAULT CHARSET=utf8";
	
	$bdd->prepare($req)->execute(); 
	
	$req = "CREATE TABLE information(
    id_information INT NOT NULL AUTO_INCREMENT,
    nom_information VARCHAR(128) NOT NULL,
	lien_information VARCHAR(512) NOT NULL,
	id_categorie_information INT NOT NULL,
    PRIMARY KEY (id_information)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8";
    //FOREIGN KEY (id_categorie_information) REFERENCES categorie (id_categorie)
    //)ENGINE=InnoDB DEFAULT CHARSET=utf8";
	
	$bdd->prepare($req)->execute(); 
	
?>