<?php

require_once('bdco.php');


if (isset($_POST['text']))
{
	$h2 = htmlspecialchars($_POST['h2']);
	$h3 = htmlspecialchars($_POST['h3']);
	$text=htmlentities($_POST['text']); // recupère le titre dans une variable
	$image= $_FILES['img']; // recupère l'
	
	$destDir= 'img/'; // indique le repertoire de destination
	$destinationpath= $destDir . $image['name']; // chemin de destination
	
	

	$req="insert into apropos(imgpath, h2, h3, p) values(?,?,?,?);"; // requete sql
	$prep=$maConnexion->prepare($req); // preparation de la requete
	$prep->bindParam(1,$destinationpath);//on execute les requetessql
	$prep->bindParam(2,$h2);
	$prep->bindParam(3,$h3);
	$prep->bindParam(4,$text);
	$prep->execute();
	




	if(move_uploaded_file($image['tmp_name'], $destinationpath)) // deplace l'image vers la destination
	{
		echo"upload reussi";
		header("location:gestionAPropos.php");
	}

	else // si ne marche par retourne :
	{
		echo "échec de l'upload";
		header("location:gestionAPropos.php");
	}

}

else
{
	header('location:gestionAPropos.php');
}


?>