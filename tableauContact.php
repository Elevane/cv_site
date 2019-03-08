			<?php require_once('headerBackoffice.php') ?>
			<table id="tableauC"><!-- ouverture du tableau avec une bordure d'un px-->
			<tr><th>id<th>nom</th><th>mail</th><th>objet</th><th>text</th><th></th></tr> <!-- colonnes du tableau-->


			<?php // créer le tableau
			session_start();
				require_once('bdco.php');  // appel du module de connection a la bdd 
				$req="select * from infosmails"; // on met la requete sql dans uen variable
				$resultat =$maConnexion->query($req); // on requete la bdd
				while ($infosmails=$resultat->fetchObject()) // boucle a partir de la requete pour mettre les données de la bdd dans un tableau
				{
					echo "<tr><td>".$infosmails->mail_id."</td>";
					echo "<td>".$infosmails->nom."</td>"; // recupère les données de la bdd de la table infomails
					echo "<td>".$infosmails->mail."</td>";
					echo "<td>".$infosmails->objet."</td>";
					echo "<td id='textC'>".$infosmails->text."</td>";

					echo'<td><form  action="delMail.php" method="post">';
					echo '<input type="hidden" name="mail_id" value="'.$infosmails->mail_id.'"/>';
					echo '<input type="submit" value="supprimer" formaction="delMail.php" onclick="return '."confirm('voulez-vous supprimer ?')".'"/>';
					echo '</form></td>';
					echo "</tr>";
				}
				

			?>


			</table> <!-- fermeture du tableau-->
           <?php require_once('menuBouton.php');?>


				
		
	
	</body>
</html>