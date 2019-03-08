<?php
require_once('bdco.php');
// on commence par récuperer les champs
if (isset($_POST['mail_id'])) 
{
$id=htmlentities($_POST['mail_id']);

	$req="delete from infosmails where mail_id=?;";
	$prep=$maConnexion->prepare($req);
	$prep->bindParam(1,$id); // on execute la requete sql
	$prep->execute();
	header('location:tableauContact.php');
}
else
{
header("location:tableauContact.php");
}

 ?>