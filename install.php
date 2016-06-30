<?php
	//include_once("./connexion.php");
	$host = 'mysql:host=localhost'; /* L'adresse du serveur */
	$login = 'root'; /* Votre nom d'utilisateur */
	$password = ''; /* Votre mot de passe */
	try
	{
		if($bdd = new PDO($host, $login, $password)) {
			echo 'BDD Ok !
				<div  id="moduleConnexion">
					<li>
						<a href="./index.php"> 
							 <button type="button" class="btn btn-danger btn-lg" id="butConnexion" >Index</button>
						</a>
					</li>
				</div>
				';
		}
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
	
	$req = "CREATE TABLE information(
    id_information INT NOT NULL AUTO_INCREMENT,
    nom_information VARCHAR(128) NOT NULL,
	texte_information VARCHAR(512) NOT NULL,
	id_categorie_information INT NOT NULL,
	id_serie_information INT NOT NULL,
	saison_information INT NOT NULL,
	info_valide BOOLEAN NOT NULL,						
    PRIMARY KEY (id_information)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8";	
	$bdd->prepare($req)->execute(); 
	
	$req = "CREATE TABLE user(
    idUser BIGINT(20) NOT NULL AUTO_INCREMENT,
    login VARCHAR(256) NOT NULL,
	password VARCHAR(256) NOT NULL,
	email VARCHAR(32) NOT NULL,
	typeCompte TINYINT(1) NOT NULL,
    PRIMARY KEY (idUser)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8";
	$bdd->prepare($req)->execute(); 
	
	$req = "INSERT INTO categorie VALUES(1,'personnages')";	$bdd->prepare($req)->execute();
	$req = "INSERT INTO categorie VALUES(2,'lieux')";		$bdd->prepare($req)->execute();
	$req = "INSERT INTO categorie VALUES(3,'evenements')";	$bdd->prepare($req)->execute();
	$req = "INSERT INTO categorie VALUES(4,'interviews')";	$bdd->prepare($req)->execute();
	
	$req = "INSERT INTO serie VALUES(1,6,'Game Of Thrones')";			$bdd->prepare($req)->execute();	
	$req = "INSERT INTO serie VALUES(2,6,'The Walking Dead')";			$bdd->prepare($req)->execute();	
	$req = "INSERT INTO serie VALUES(3,5,'Breaking Bad')";				$bdd->prepare($req)->execute();
	$req = "INSERT INTO serie VALUES(4,5,'Once Upon A Time')";			$bdd->prepare($req)->execute();
	$req = "INSERT INTO serie VALUES(5,10,'Stargate SG-1')";			$bdd->prepare($req)->execute();
	$req = "INSERT INTO serie VALUES(6,11,'Supernatural')";				$bdd->prepare($req)->execute();
	$req = "INSERT INTO serie VALUES(7,4,'Orange Is The New Black')";	$bdd->prepare($req)->execute();
	
	/* infos personnage */
	$req = "INSERT INTO information VALUES(1,'Tyrion Lannister', 'Tyrion est un nain. Il est le dernier fils de la famille Lannister.',1,1,0,true)";																			$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(2,'Tyrion Lannister', 'Il tua son p&egrave;re avec une arbal&egrave;te lors de son &eacute;vasion des prisons du donjon rouge.',1,1,4,true)";										$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(3,'Tyrion Lannister', 'D&eacute;sormais &agrave; Merren, il sert Daeneris en lui offrant ses conseils.',1,1,5,true)";																$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(4,'Cersei Lannister', 'Cersei est la soeur de Tyrion et James Lannister. Elle est mari&eacute; au roi Robert Barath&eacute;on.',1,1,0,true)";										$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(5,'Cersei Lannister', 'Elle vient d\'arriver au donjon rouge apr&egrave;s sa marche d\'expiation dans la capitale.',1,1,5,true)";													$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(6,'Ned Stark', 'Ned est le gouverneur du Nord de Westeros et p&egrave;re d\'une grande famille. Il est le fr&ecirc;re de Benjen Stark, mari&eacute; &agrave; Catelyn Stark
	 et p&egrave;re de John Snow, Robb, Sansa, Bran, Arya et Rickon Stark. Il a particip&eacute; &agrave; la rebellion avec Robert Barath&eacute;on contre les Targaryen il y a 15 ans.',1,1,0,true)";						$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(7,'John Snow', 'John est le fils batard de Ned Stark, il n\'a pas de droits d\'h&eacute;ritage sur Winterfell de par son droit de naissance.',1,1,0,true)";						$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(8,'Sansa Stark', 'Sansa est la plus grande fille de la famille Stark.',1,1,0,true)";																								$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(9,'Sansa Stark', 'Elle se marie &agrave; Ramsey Bolton sous la demande de LittleFinger. Sansa se fait alors viol&eacute; par son nouveau mari.',1,1,4,true)";						$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(10,'Rick Grimes', 'Rick &eacute;tait sh&eacute;rif et apr&egrave;s avoir re&ccirc;u une balle dans une fusillade, il se r&eacute;veille dans un h&ocirc;pital en ruine.',1,2,0,true)";	$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(11,'Michonne', 'Michonne se d&eacute;place avec deux mort-vivants sans bras ni bouche et rencontre Andrea.',1,2,3,true)";															$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(12,'Glenn', 'Glenn est un ancien livreur de pizza qui aide les gens dans le besoin autant que possible contre les marcheurs.',1,2,0,true)";										$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(13,'Glenn', 'Il devient le petit ami de Maggie qu\'il rencontre avec le groupe de Rick apr&egrave;s la blessure de Carl.',1,2,2,true)";											$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(14,'Walter White', 'Professeur de chimie dans un lyc&eacute;e, il apprend qu\'il est atteint d\'un cancer.',1,3,0,true)";															$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(15,'Walter White', 'Il produit de la meth (drogue synth&eacute;tique) en grande quantit&eacute; pour Gustavo Fring avec l\'aide de Jesse.',1,3,3,true)";							$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(16,'Jesse Pinkman', 'Jesse produit de la drogue ill&eacute;galement avant de rencontrer Walter White.',1,3,0,true)";																$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(17,'Mike Ehrmantraut', 'Mike est &agrave; la fois d&eacute;tective priv&eacute; et chef de la s&eacute;curit&eacute; de \"Los Pollos Hermanas\".',1,3,3,true)";					$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(18,'Saul Goodman', 'Avocat avide d\'argent, il fera affaire avec Walter White et Jesse.',1,3,0,true)";																			$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(19,'Hank Schrader', 'Hank est agent des stup. Il est &eacute;galement le beau-fr&egrave;re de Walter White.',1,3,0,true)";														$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(20,'Skyler White', 'Skyler est femme au foyer. Elle est mari&eacute;e &agrave; Walter White.',1,3,0,true)";																		$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(21,'Marie Schrader', 'Marie est l'&eacute;pouse de Hank Schrader et la soeur de Skyler White.',1,3,0,true)";																		$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(22,'Baelfire', 'Il est le fils de Rumplestiltskin.',1,4,1,true)";																													$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(23,'Regina Mills', 'La M&eacute;chante Reine et maire de Storybrooke.',1,4,0,true)";																								$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(24,'Zelena', 'La M&eacute;chante Sorci&egrave;re de l\'Ouest, elle est la demi-soeur de Regina.',1,4,3,true)";																	$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(25,'Teal\'c', 'Teal\'c est un jaffa qui sert les faux dieux goa\'uld. Il est \'primat\' de l\'un d\'eux : Apophis.',1,5,0,true)";													$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(26,'Teal\'c', 'Il se rebelle contre son ma&icirc;tre et rejoint l\'&eacute;quipe SG-1 qui l\'accueille avec joie.',1,5,1,true)";													$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(27,'Jack O\'Neill', 'Jack est un colonel de l\'US Air Force. Il int&egrave;gre l\'&eacute;quipe SG-1 dont il devient le chef.',1,5,0,true)";											$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(28,'Daniel Jackson', 'Daniel est &eacute;gyptologue. Il a d&eacute;couvert le fonctionnement de la porte des &eacute;toiles. Il aide SG-1 gr&acirc;ce &agrave; ses connaissances des langues 
	et cultures &eacute;trang&egrave;re.',1,5,0,true)";																																										$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(29,'Vala Mal Doran', 'Vala est une arnaqueuse qui dupe les gens sur diff&eacute;rentes plan&egrave;tes. Elle rencontre Daniel lorsqu\'elle tente de vol&eacute; le 
	Prom&eacute;th&eacute;.',1,5,8,true)";																																													$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(30,'Dean Winchester', 'Dean est le fr&egrave;re de Sam Winchester. Il l\'aide a vaincre des d&eacute;mons depuis la mort de leur m&egrave;re et la disparition de 
	leur p&egrave;re.',1,6,0,true)";																																														$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(31,'Sam Winchester', 'Sam est le petit fr&egrave;re de Dean Winchester. C\'est son grand fr&egrave;re qui s\'occupe de lui depuis la mort de leur m&egrave;re et la 
	disparition de leur p&egrave;re.',1,6,0,true)";																																											$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(32,'Alex Vause', 'Alex est une ancienne trafiquante de drogue. Après une p&eacute;riode de d&eacute;pendance &agrave; la drogue, elle s\'arr&ecirc;te pendant son s&eacute;jour en 
	prison.',1,7,0,true)";																																																	$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(33,'Piper Chapman', 'Piper est une femme bisexuelle condamn&eacute;e pour trafic de drogue 10 ans plus t&ocirc;t.',1,7,0,true)";													$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(34,'Piper Chapman', 'Elle se retrouve dans la m&ecirc;me chambre que Claudette, avec  qui elle s\'entend mal au d&eacute;but mais elles finissent par &ecirc;tre amis.',1,7,1,true)";	$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(35,'Sam Healy', 'Sam est un ancien gardien de prison. Il sert d&eacute;sormais de conseiller dans la prison de la s&eacute;rie.',1,7,0,true)";									$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(36,'Galina\"Red\" Reznikov', 'Galina est une co-d&eacute;tenue de Piper. Elle dirige la cuisine et la communaut&eacute; blanche de la prison.',1,7,0,true)";						$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(37,'Suzanne \"Crazy Eyes\" Warren', 'Suzanne prend Piper pour sa m&egrave;re adoptive et la frappe au visage.',1,7,2,true)";														$bdd->prepare($req)->execute();
	/* infos lieux */
	$req = "INSERT INTO information VALUES(38,'Winterfell', 'Capitale du nord, elle est dirig&eacute;e par la famille Stark depuis plusieurs milliers d\'ann&eacute;es.',2,1,0,true)";										$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(39,'Winterfell', 'Apr&egrave;s la chute de Robb Stark, Winterfell appartient d&eacute;sormais &agrave; la famille Bolton.',2,1,5,true)";											$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(40,'Dorne', 'Dorne est au Sud de Westeros et est dirig&eacute; par la famille Martell.',2,1,4,true)";																				$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(41,'Atlanta', 'Atlanta est la ville dans laquelle se rend Rick à cheval, il y rencontre Glenn et beaucoup d\'autres.',2,2,4,true)";												$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(42,'Ferme familiale des Greene', 'Cette exploitation fermi&egrave;re est le refuge du groupe de Rick apr&egrave;s que Carl soit bless&eacute;.',2,2,2,true)";						$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(43,'Storybrooke', 'Ville dans le Maine. Tous les personnages de contes y ont &eacute;t&eacute; transport&eacute;s.',2,4,0,true)";													$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(44,'Le Pays Imaginaire', 'Monde où vivent Peter Pan et les Enfants Perdus.',2,4,3,true)";																							$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(45,'P&eacute;nitentier de Litchfield', 'Prison dans laquelle se d&eacute;roule l\'histoire. Elle est dirig&eacute; par le D&eacute;partement F&eacute;d&eacute;ral de Correction.',2,7,0,true)";	$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(46,'Stargate Command (SGC)', 'Base militaire sous une montagne. C\'est l&agrave; qu\'est la porte des &eacute;toiles et que les &eacute;quipes SG partent en exploration 
	de mondes aliens.',2,5,0,true)"; 																																														$bdd->prepare($req)->execute();
	/* infos evenements */
	$req = "INSERT INTO information VALUES(47,'Les noces pourpres','https://www.youtube.com/watch?v=OuD8tjcggjI',3,1,3,true)";																								$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(48,'La mort de Joffrey','https://www.youtube.com/watch?v=V5K7motTFf8',3,1,4,true)";																								$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(49,'Duel judiciaire Oberyn contre La Montagne','https://www.youtube.com/watch?v=Pr9Do6blB4c',3,1,4,true)";																		$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(50,'La mort de John Snow','https://www.youtube.com/watch?v=HVkHpeW8zJo',3,1,5,true)";																							$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(51,'La mort de Ned Stark','https://www.youtube.com/watch?v=PW6wfXPeJTw',3,1,1,true)";																							$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(52,'La mort de Shane','https://www.youtube.com/watch?v=9L510ov05NI',3,2,2,true)";																								$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(53,'La mort de Gustavo Fring','https://www.youtube.com/watch?v=R6CjCEyAJ2s',3,3,4,true)";																						$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(54,'Say my name (Dit mon nom)','https://www.youtube.com/watch?v=C9MGU7krXnQ',3,3,5,true)";																						$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(55,'La mort de Neal','https://www.youtube.com/watch?v=lMXXCDe7n1U',3,4,3,true)";																									$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(56,'Le mariage de Belle et Rumplestiltskin','https://www.youtube.com/watch?v=UPV90t8afB0',3,4,3,true)";																			$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(57,'La r&eacute;surrection de Mal&eacute;fique','https://www.youtube.com/watch?v=EW9vdjYJBcc',3,4,4,true)";																		$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(58,'Bataille de la super porte','https://www.youtube.com/watch?v=FRIvaO3i5EM',3,5,9,true)";																						$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(59,'D&eacute;collage du Prom&eacute;th&eacute;e','https://www.youtube.com/watch?v=-Xdlr30G6PM',3,5,6,true)";																		$bdd->prepare($req)->execute();
	/* infos interviews */
	$req = "INSERT INTO information VALUES(60,'Interview des acteurs et r&eacute;alisateurs avant la saison 2','https://www.youtube.com/watch?v=--jx-ZKmHkE',4,1,2,true)";													$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(61,'Interview des acteurs avant le lancement de la saison 6','https://www.youtube.com/watch?v=hX-btYt5caY',4,1,6,true)";															$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(62,'Supernatural Comic Con 2015','https://www.youtube.com/watch?v=nvMTCXOWEkU',4,6,10,true)";																					$bdd->prepare($req)->execute();
	$req = "INSERT INTO information VALUES(63,'Interview de Laura Prepon et Laverne Cox','https://www.youtube.com/watch?v=ZZupBPrGefw',4,7,3,true)";																		$bdd->prepare($req)->execute();
	
	/* comptes */
	$req = "INSERT INTO user VALUES(1,'admin','admin','admins@admin.fr',2)";																																				$bdd->prepare($req)->execute();

	
	
																																																							
	
?>