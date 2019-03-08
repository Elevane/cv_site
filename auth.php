<?php
session_start();
$_SESSION['login'] = $_POST['login']; // login de du form est login de la session
$_SESSION['mdp'] = $_POST['mdp']; // mdp du form est mdp de la session

// SI DANS LA BDD

require('bdco.php'); // connection a la bdd


if(isset($_POST['login']))
{
	$login = htmlentities($_POST['login']); // recupère le login
	$mdp = htmlentities($_POST['mdp']); // recupère le mdp

	if (empty($login) OR empty($mdp)) // les champ doivent être remplis
	{
		header('location:authForm.php'); // retourne a une page qui indique qu'il faut mettre un mot de passe ET un login
	}

	else
	{
		$req = "select count(*) from admin where login ='".$login."'AND mdp = '".$mdp."'"; // comparaison des données entrées dans le formulaire avec celles de la bdd
		$resultat = $maConnexion->query($req)->fetch(); // reffectue la requete sql

		if ($resultat['count(*)']==1) // si une colone parmis les admin de la bdd corespond,
		{
			header('location:tableauContact.php');
		}
		else
		{
			header('location:authForm.php');
		}
	}

}
 ?>
