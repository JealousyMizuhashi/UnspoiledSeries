<?php
session_start ();

include_once "./dbmapper.php";
include_once './debug.php';
include_once './params_connexion.php';
require_once ("./include_generique.php");

$connexion = new PDO ( $host, $login, $password );
DBMapper::init ( $connexion );
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="ASCII" />
		<title>Unspoiled Series</title>
		<link href="./main.css" rel="stylesheet">
		<link href="./dist/css/bootstrap.css" rel="stylesheet">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset= UTF-8"/>
	</head>

	<body>
		<header>
			<img src="./images/logoUnspoiledSeries.png" id="header-fond" />			
		</header>

		<nav id="nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>
					<form class="navbar-form " role="search" method="POST" action="index.php?module=recherche&action=rechercheParSaisie">
						<div class="form-group">
							<input type="text" name="requete" class="form-control" placeholder="Recherche" required>
						</div>
						<button type="submit" class="btn btn-default">Rechercher !</button>
					</form>
				</li>
	<?php
	if (! isset ( $_SESSION ['id_user'] ) || empty ( $_SESSION ['id_user'] )) {
		echo '
											<div  id="moduleConnexion">
												<li> 
													<form method="POST" action="index.php?module=connexion&action=connexion">
														<input type="text" id="pseudo" name="pseudo" placeholder="LOGIN">
														<input type="password" id="password" name="password" placeholder="PASSWORD">
														<button type="submit" class="btn btn-primary btn-lg" id="butConnexion" >CONNEXION</button>
													</form>
												</li>
												<li>
													<a href="index.php?module=connexion&action=inscription"> 
														 <button type="button" class="btn btn-danger btn-lg" id="butInscription" >INSCRIPTION</button>
													</a>
												</li>
												<li>
													<a href="./install.php"> 
														 <button type="button" class="btn btn-danger btn-lg" id="butBD" >Script BD</button>
													</a>
												</li>
											</div>
					
											';
	} else {
		if (isset ($_SESSION ['estUtilisateur']) && $_SESSION ['estUtilisateur'] == true) {
			echo ('
													<li><a href="index.php?module=User&action=ajoutInformations">Sugg&eacute;rer une information</a></li>
													');
		}
		if (isset ( $_SESSION ['estModerateur'] ) && $_SESSION ['estModerateur'] == true) {
			echo ('
													<li><a href="index.php?module=gestionproduit&action=accueil">Administration</a></li>
													');
		}
		if (isset ( $_SESSION ['estAdmin'] ) && $_SESSION ['estAdmin'] == true) {
			echo ('
													<li><a href="index.php?module=gestionproduit&action=accueil">Administration</a></li>
													');
		}
		echo ('
											<li>
											<a href=" ' . htmlspecialchars ( "index.php?module=connexion&action=deconnexion" ) . '">
											D&eacute;connexion
											</a>
											</li>
										');
	}
	?>
							</ul>

		</nav>
	 
	<?php
	if (isset ( $_GET ['module'] ))
		$module = $_GET ['module'];
	else
		$module = 'accueil';
		
		// Permet d'inclure un module au choix
	if (isset ( $module )) {
		require_once ("./Modules/mod_$module/mod_$module.php");
		$classeModule = "Module$module";
		$moduleObjet = new $classeModule ();
		$moduleObjet->display ();
	}
	?>
				

		<footer id="footer" class="container col-md-12">
			<p class="col-md-12">
				Pour toute autre information, vous pouvez nous contacter sur la page
				<a href="index.php?module=accueil&action=contact">contact</a>
			</p>
		</footer>
	</body>

</html>
