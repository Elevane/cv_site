


<?php

require_once('bdco.php');
if (isset($_POST['modContenu_id']))
{
	$id = htmlspecialchars($_POST['modContenu_id']);
	$newimg = $_FILES['img'];
	$newimga = $_FILES['imga'];
	$newp = htmlspecialchars($_POST['p']);
    $bound = htmlspecialchars($_POST['bound']);


	$destDir= 'img/'; // indique le repertoire de destination
	$destinationpathimg= $destDir . $newimg['name']; // chemin de destination
	$destinationpathimga= $destDir . $newimga['name']; 
	

	$req = 'update portfolio set imgpath = ?, imga = ?, p = ?, bound = ? where portfolio_id ="'.$id.'" ';
	$prep=$maConnexion->prepare($req); // preparation de la requete
	$prep->bindParam(1,$destinationpathimg);//on execute les requetessql
	$prep->bindParam(2,$destinationpathimga);
    $prep->bindParam(4,$bound);
	$prep->bindParam(3,$newp);
	$prep->execute();


	if(move_uploaded_file($newimg['tmp_name'], $destinationpathimg) && move_uploaded_file($newimga['tmp_name'], $destinationpathimga) ) // deplace l'image vers la destination
	{
		echo"upload reussi";
		header("location:gestionPortfolio.php");
	 }

	else // si ne marche par retourne :
	{
		echo "échec de l'upload";
		header("location:gestionPortfolio.php");
	}
}
header('Location:gestionPortfolio.php');
 ?>