<?php require_once('headerBackoffice.php') // header backoffice ?>
	<section id="sectionGestionApropos">
	    <h1 class="h1">gestion Port folio</h1> <!-- titre de la page-->
		<?php
			require_once('bdco.php');// informations de coonnexion a la bdd
			$req = "select imgpath, imga,bound, p, portfolio_id from portfolio"; // enregistrement de la requete sql dans une variable
			$resultat = $maConnexion->query($req);// fonction php qui requete la bdd
			while($contenu=$resultat->fetchObject())// on boucle dans la bdd tant qu'il y a du contenu
			{
				echo "<article class='articleGP'><img src='".$contenu->imgpath."' alt='img' class='imgPF'>";// image
		        echo "<a href='".$contenu->bound."'><img src='".$contenu->imga."'alt='icon' class='imga'/><a>";// deuxieme image
		        echo "<p>".$contenu->p."</p>";// texte
				echo '<form action="delContenuPortfolio.php" method="post"><input type="hidden" name="delContenu_id" value="'.$contenu->portfolio_id.'"/>';// boouton supprimer
				echo '<input type="submit" value="supprimer" onclick="return '."confirm('voulez-vous supprimer ?')".'"/></form>';
				echo'</br>';
				echo '<form action="modContenuPortfolio.php" method="post" enctype="multipart/form-data"><input type="hidden" name="modContenu_id" value="'.$contenu->portfolio_id.'"/>'; // bouton modifier
				
				echo '<label for="img"></label>
				<input type="file" name="img">

				<label for="imga"></label>
				<input type="file" name="imga">

				<label for="p"></label>
				<input name="p" type="text" placeholder="titre">

				<label for="bound"></label>
				<input name="bound" type="text" placeholder="lien">';
		        
				echo '<input type="submit" name="sub" value="modifier"/>';
				echo '</div></form></article>';

			}


		 ?>
	 
	<form action="ajouterContenuPortfolio.php" method="post" enctype="multipart/form-data" class="formGestion"><!-- formulaire pour modifier un element de portfolio-->

		<div>
		<label for="img"></label>
		<input type="file" name="img"><!-- input d'image-->

		<label for="imga"></label>
		<input type="file" name="imga"><!-- input de la deuxieme image-->

		<label for="p"></label>
		<input name="p" type="text" placeholder="titre"><!-- input du titre-->

		<label for="bound"></label>
		<input name="bound" type="text" placeholder="lien"><!-- input du lien vers lequelle l'image peut envoyer-->

		<label for="sub"></label>
		<input type="submit" name="sub" value="ajouter une idée"><!-- bouton submit , pour valider le modifier-->
		</div>
	</form>


<?php require_once('menuBouton.php');// menu de bouton qui permettent d'aller sur les autres pages  ?>

</body>
</html>