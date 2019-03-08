<?php require_once('headerBackoffice.php') // header backoffice ?>
	<section id="sectionGestionApropos">
	    <h1 class="h1">gestion Mon Blog</h1> <!-- titre de la page-->
		<?php
			require_once('bdco.php');// informations de connexion a la bdd
			$req = "select imgpath, h3, h4, monblog_id, p from monblog;"; // on enregistre la requete sql dans une variable
			$resultat = $maConnexion->query($req); // fonction php qui requete la bdd
			while($contenu=$resultat->fetchObject()) // boucle qui boucle tan qu'il y a du contenu dans la table de la bdd
			{
				echo "<article><img src='".$contenu->imgpath."' alt='img' class='boite_blog'>"; // image
				echo "<section><h3>".$contenu->h3."</h3>";// titre
				echo "<h4>".$contenu->h4."</h4>";// sous titre
				echo "<p>".$contenu->p."</p></section>"; // texte
				echo '<form action="delContenuMonBlog.php" method="post"><input type="hidden" name="delContenu_id" value="'.$contenu->monblog_id.'"/>'; // bouton supprimer
				echo '<input type="submit" value="supprimer" onclick="return '."confirm('voulez-vous supprimer ?')".'"/></form>';
				echo '<form action="modContenuMonBlog.php" method="post" enctype="multipart/form-data"><input type="hidden" name="modContenu_id" value="'.$contenu->monblog_id.'"/>';// bouton modifier
				echo '<div>
				<label for="img"></label>
				<input type="file" name="img">

				<label for="h3"></label>
				<input type="text" name="h3">

				<label for="h4"></label>
				<input type="text" name="h4">

				<label for="text"></label>
				<textarea name="text"></textarea>

				<label for="sub"></label>';
				echo '<input type="submit" name ="sub" value="modifier"/>';
				echo '</div></form></article>';

			}


		 ?>
	<form action="ajouterContenuMonBlog.php" method="post" enctype="multipart/form-data" class="formGestion"> <!-- formulaire d'ajout de contenu pour la partie mon blog-->

		<div>
		<label for="img"></label>
		<input type="file" name="img"><!--image a a ajouter-->


		<label for="h3"></label>
		<input type="text" name="h3"><!-- titre a ajouter-->


		<label for="h4"></label>
		<input type="text" name="h4"><!-- sous titre a ajouter-->


		<label for="text"></label>
		<textarea name="text"></textarea><!--ajout de texte-->


		<label for="sub"></label>
		<input type="submit" name="sub" value=" ajouter une idée"><!-- bouton submit-->

	</div>
	</form>
</section>
<?php require_once('menuBouton.php'); // menu de bouton qui permettent d'aller sur les autres pages ?>
</body>
</html>