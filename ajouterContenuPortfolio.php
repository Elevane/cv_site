<?php

require_once('bdco.php');


if (isset($_POST['p']))
{
	$imga = $_FILES['imga'];
	$p = htmlspecialchars($_POST['p']);
	$image= $_FILES['img']; // recupère l'
	$bound = htmlspecialchars($_POST['bound']);
	
	$destDir= 'img/'; // indique le repertoire de destination
	$destinationpathimg= $destDir . $image['name']; // chemin de destination
	$destinationpathimga= $destDir . $imga['name']; 
	
	

	$req="insert into portfolio(imgpath, imga,bound, p) values(?,?,?,?);"; // requete sql
	$prep=$maConnexion->prepare($req); // preparation de la requete
	$prep->bindParam(1,$destinationpathimg);//on execute les requetessql
	$prep->bindParam(2,$destinationpathimga);
	$prep->bindParam(3,$bound);
	$prep->bindParam(4,$p);
	$prep->execute();
	




	if(move_uploaded_file($image['tmp_name'], $destinationpathimg) && move_uploaded_file($imga['tmp_name'], $destinationpathimga) ) // deplace l'image vers la destination
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

else
{
	header('llocation:gestionPortfolio.php');
}


?>