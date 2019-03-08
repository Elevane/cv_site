<?php
 $user = "root"; // identifant pour la conexion a la bdd
 $mdp = ""; // mot de passe
 $serveur = "127.0.0.1"; // adresse ip du server de bdd, en l'occurence local
 $bd="cv"; // base de données portant le nom de cv
 $dns="mysql:host=$serveur;dbname=$bd;charset=utf8"; // requete dns avec les infos précédement remplies

 try
 {
 	$maConnexion = new PDO($dns,$user,$mdp); // connexion a la base de données
 	$maConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // aides pour les erreurs
 }

catch (PDOException $e)
{
	print"erreur avec la bdd : ".$e->getMessage()."<br/>"; // message d'erreur en cas d'echec de connexion
	die();
}
 ?>
