<?php
require_once('bdco.php');

if (isset($_POST['delContenu_id'])) // sécurité : si on a bien cliqué sur le bouton
{
$id=htmlentities($_POST['delContenu_id']); // récupération de la variable dans la boucle qui affiche les données de la bdd

	$req="delete from monblog where monblog_id=?;"; // requette sql et mise dans une variable
	$prep=$maConnexion->prepare($req); // on prépare la requete
	$prep->bindParam(1,$id); 
	$prep->execute();// on execute la requette
	header('location:gestionMonBlog.php'); // retour a la page
}
else
{
 header("location:gestionmonBlog.php");
}

 ?>