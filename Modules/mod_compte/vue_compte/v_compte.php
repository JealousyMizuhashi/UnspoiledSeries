<?php
class VueCompte{
	static function affichageInformations($infos){
	echo "<h1 id='labelAccueil'>Mon compte</h1>

     <div id='formulaire' class='container'>
        <div class='row'>
            <form action='index.php?module=compte&action=modifier' method='post'>
                <h2>Voici les informations liees a votre compte.</h2><h2>Pour toutes modifications, changer une case souhaitee puis cliquer sur le bouton modifier.</h2>
                <input name='nom' type='text' value='".$infos[0]['nom']."' id='nom'>
                <input name='prenom' type='text' value='".$infos[0]['prenom']."' id='prenom'>
                <input name='adresse' type='text' value='".$infos[0]['adresse']."' id='adresse'>
                <input name='codePostal' type='text' value='".$infos[0]['codePostal']."' id='codepostal'>
                <input name='email' type='email' value='".$infos[0]['email']."' id='email'>
                <input name='pseudo' type='text' value='".$infos[0]['login']."' id='pseudo'>
                <input name='password' type='password' value='".$infos[0]['password']."' id='password'>
                <input class='btn' type='submit' value='Modifier' id='bouton'>
            </form>
         </div>
        
        </div>";
		
	}
	
	
}