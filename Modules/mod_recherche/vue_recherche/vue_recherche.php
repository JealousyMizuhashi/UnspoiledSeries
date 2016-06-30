
<?php
class VueRecherche {
	public static function afficherRechercheAccueil($resultats, $requete) {
		if (empty ( $requete )) {
			echo ("<br> Vous devez saisir un mot clé");
			echo $resultats;
		} 

		else {
			echo ('
		       <div  class="container">			
				<section id="ligne" class="row" >
					<h3>Résultats pour ' . $requete . ' : </h3>

				
				</section>

				<section id="ligne" class="row" > 

			');
			
			if (empty ( $resultats )) {
				echo ("
				<section id='ligne' class='row' >
					<h3 class='fg-white text-left'>Aucune série ne correspond a \"$requete\"</h3>
				</section>
					");
			} else {
				
				foreach ( $resultats as $value ) {
					echo ('
		 			<a href="index.php?module=timeline&id='.$value['id_serie'] . '">
		                <div class="col-md-2">
		                    <figure>
								<img src="./images/series/'.$value['nom_serie'].'.jpg"  alt="Image de serie" width="100%" height="230px">
								<figcaption>
									<p id="auteur">nom : '.$value['nom_serie'].'</p>
									<p id="nom"> saisons : '.$value['nb_saison_serie'].'</p>
								</figcaption>
							</figure>
		                </div>
		            </a>
		 	
		 				');
				}
			}
		}
		echo ('
				</section>
			</div>
			');
	}
}

?>

