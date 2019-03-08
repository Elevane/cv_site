<?php

require_once('bdco.php');


if (isset($_POST['text']))
{
	$h3 = htmlspecialchars($_POST['h3']);
	$h4 = htmlspecialchars($_POST['h4']);
	$text=htmlentities($_POST['text']); // recupère le titre dans une variable
	$image= $_FILES['img']; // recupère l'
	
	$destDir= 'img/'; // indique le repertoire de destination
	$destinationpath= $destDir . $image['name']; // chemin de destination
	
	

	$req="insert into monblog(imgpath, h3, h4, p) values(?,?,?,?);"; // requete sql
	$prep=$maConnexion->prepare($req); // preparation de la requete
	$prep->bindParam(1,$destinationpath);//on execute les requetessql
	$prep->bindParam(2,$h3);
	$prep->bindParam(3,$h4);
	$prep->bindParam(4,$text);
	$prep->execute();
	




	if(move_uploaded_file($image['tmp_name'], $destinationpath)) // deplace l'image vers la destination
	{
		echo"upload reussi";
		header("location:gestionMonBlog.php");
	}

	else // si ne marche par retourne :
	{
		echo "échec de l'upload";
		// header("location:gestionAPropos.php");
	}

}

else
{
	echo 'echec du isset';
	// header('location:gestionAPropos.php');
}


?>