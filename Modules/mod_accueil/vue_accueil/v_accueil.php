<?php
class VueAccueil{
	static function affichageSeries($series){
	ECHO'	 <h1 id="labelAccueil">S  E  R  I  E  S</h1>
		
       <div id="nouveautes" class="container">
		<section id="ligne" class="row" > 
			';
		foreach ($series as  $value){
						
			echo '
				<a href="index.php?module=timeline&id='.$value['id_serie'].'">
					<div class="col-md-2">  
						<figure>
							<img src="./images/series/'.$value['nom_serie'].'.jpg"  alt="Image de '.$value['nom_serie'].'" width="100%" height="230px">
							<figcaption>
								<p id="auteur">'.$value['nom_serie'].'</p>
								<p id="nom"> Saisons : '.$value['nb_saison_serie'].'</p>
							</figcaption>
						</figure>
					</div>
				</a>
			   
					';
		}
		echo "</div>";
		
	}
	
	static function afficherPageContact(){
		echo'
			<h1>Qui sommes-nous ?</h1>		
		<p>Nous sommes un groupe de trois étudiants en Licence Professionnelle C.S.I.D à l\'IUT de Montreuil. Dans le cadre de notre projet personnel, nous avons fait le choix de créer un site d\'informations sur les séries avec un filtre par saison pour éviter les spoils.</p>
		
		<h2>Contact</h2>
		
		<form action="mailto:francois.lebrazidec.idf@gmail.com;terraiskevin@gmail.com;braire2@yahoo.fr;" method="post" name="contact">
		Nom :
		<p><input name="Votre nom"></p>
		Prénom :
		<p><input name="Votre prénom"></p>
		Adresse mail :
		<p><input name="Votre mail"></p>
		<p>Votre message:</p>
		<textarea name="message" rows="2" cols="30"></textarea><p>
		<input type="submit" value="Envoyer"></form>
		';
	}
	
	
}