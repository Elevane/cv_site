
<?php

require_once('bdco.php');
if (isset($_POST['modContenu_id']))
{
	$id = htmlspecialchars($_POST['modContenu_id']);
	$newimg = $_FILES['img'];
	$newh2= htmlspecialchars($_POST['h2']);
	$newh3 = htmlspecialchars($_POST['h3']);
	$newtext = htmlspecialchars($_POST['text']);


	$destDir= 'img/'; // indique le repertoire de destination
	$destinationpathimg= $destDir . $newimg['name']; // chemin de destination
	

	$req = 'update apropos set imgpath = ?, h2 = ?, h3 = ?, p = ? where apropos_id ="'.$id.'" ';
	$prep=$maConnexion->prepare($req); // preparation de la requete
	$prep->bindParam(1,$destinationpathimg);//on execute les requetessql
	$prep->bindParam(2,$newh2);
	$prep->bindParam(3,$newh3);
	$prep->bindParam(4,$newtext);
	$prep->execute();


	if(move_uploaded_file($newimg['tmp_name'], $destinationpathimg)) // deplace l'image vers la destination
	{
		echo"upload reussi";
		// header("location:gestionPortfolio.php");
	 }

	else // si ne marche par retourne :
	{
		echo "échec de l'upload";
		// header("location:gestionPortfolio.php");
	}
}
header('Location:gestionAPropos.php');
 ?>