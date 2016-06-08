<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Unspoiled Series</title>
		<link href="./css/main.css" rel="stylesheet">
		<link href="./css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="http://localhost/UnspoiledSeries/UnspoiledSeries/angular.min.js"></script>
		<script type="text/javascript" src="http://localhost/UnspoiledSeries/UnspoiledSeries/UnspoiledSeries.js"></script>
    </head>
 
    <body ng-app="MyApp">
	
	<?php //include_once("./php/connexion.php"); ?>
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
    <?php include_once("./php/entete.php"); ?>
    <!-- Le corps -->
	
    <div id="corps">
        <h1 style="text-align:center">Unspoiled Series</h1>
      
        <p>
            Bienvenue sur Unspoiled Series ! </br>
            Ici, vous pourrez trouver toutes les informations que vous désirez sur vos séries !
            Sans spoilers !
        </p>
		
		<nav id="menu">   			   
			<div class="element_menu">
				<h3>Liste séries</h3>
				<form method="post" action="./php/index_timeline.php">
				<?php 
					$reponse = $bdd->query('SELECT * FROM serie');	
					while ($donnees = $reponse->fetch())
					{
				?>
					<input type="submit" name="serie_choisi" value="<?php echo $donnees['nom_serie'] ?>" id="<?php echo $donnees['nom_serie'] ?>" /><br />
				<?php
					}
				?>
				</form>
					<?php
						echo '<br/>';
						$reponse->closeCursor();
                    ?>  
		</nav>

    </div>
    
    <?php include_once("./php/footer.php"); ?>
    
    </body>
</html>