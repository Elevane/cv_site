<?php 


if (isset($_POST['nom']))
{
	
	$nom = htmlentities($_POST['nom']);
	$mail = htmlentities($_POST['mail']);
	$objet = htmlentities($_POST['objet']);
	$text = htmlentities($_POST['text']);

	require_once('bdco.php');
		$maConnexion = new PDO($dns,$user,$mdp); // co a la bdd

		$req="insert into infosmails(nom, mail,objet,text)values(?,?,?,?);";
		$prep=$maConnexion->prepare($req);
		$prep->bindParam(1,$nom);
		$prep->bindParam(2,$mail); // on execute la requete sql
		$prep->bindParam(3,$objet);
		$prep->bindParam(4,$text);

		$prep->execute();
		header("location:index.php");
}




 ?>