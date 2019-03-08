<?php require_once('headerBackoffice.php') // header backoffice?> 

	<section id="sectionGestionApropos">
	    <h1 class="h1">gestion a Propos</h1><!-- titre de la page-->
		<?php
			require_once('bdco.php');// informations de  connexion a la base de données
			$req = "select imgpath, h2, h3,apropos_id, p from apropos;"; // on enregistre la requete sql dans uen variable
			$resultat = $maConnexion->query($req); // fonction php qui requete la BDD
			while($contenu=$resultat->fetchObject()) // boucle qui va boucler dans la bdd, jusqu'a ce qu'il y a quelquechose a récupérer
			{
				echo "<article><img src='".$contenu->imgpath."' alt='img'>"; // image de l'article
				echo "<h2>".$contenu->h2."</h2>";// titre de l'article
				echo "<h3>".$contenu->h3."</h3>";// sous titre
				echo "<p>".$contenu->p."</p>";// contenu
				echo '<form action="delContenuApropos.php" method="post"><input type="hidden" name="delContenu_id" value="'.$contenu->apropos_id.'"/>'; // bouton supprimer
				echo '<input type="submit" value="supprimer" onclick="return '."confirm('voulez-vous supprimer ?')".'"/></form>';
				echo '<form action="modContenuAPropos.php" method="post" enctype="multipart/form-data"><input type="hidden" name="modContenu_id" value="'.$contenu->apropos_id.'"/>'; // bouton modifier
				echo '<div>
				<label for="img"></label>
				<input type="file" name="img"> 

				<label for="h2"></label>
				<input type="text" name="h2">

				<label for="h3"></label>
				<input type="text" name="h3">

				<label for="text"></label>
				<textarea name="text"></textarea>

				<label for="sub"></label>';
				echo '<input type="submit" name ="sub" value="modifier"/>'; // formulaire de modification
				echo '</div></form></article>';

			}


	 ?>
	<form action="ajouterContenuAprops.php" method="post" enctype="multipart/form-data" class="formGestion"><!-- formulaire d'ajout d'article pour la partie a propos-->
		<div>
		<label for="img"></label>
		<input type="file" name="img"> <!-- image a  ajouter -->

		<label for="h2"></label>
		<input type="text" name="h2"><!-- titre a ajouter-->

		<label for="h3"></label>
		<input type="text" name="h3"><!-- sous-titre a ajouter-->

		<label for="text"></label>
		<textarea name="text"></textarea><!-- texte a ajouter-->

		<label for="sub"></label>
		<input type="submit" name="sub" value=" ajouter une idée"><!-- bouton submit-->
	</div>
	</form>
</section>
<?php require_once('menuBouton.php');// menu de bouton qui permettent d'aller sur les autres pages ?>
</body>
</html>