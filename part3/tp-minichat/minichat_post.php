<?php
	//Automatic redirection to minichat.php
	header('Location: minichat.php');
	//Database connection
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=minichat','root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	$requete = $bdd->prepare('INSERT INTO minichat(pseudo,message) VALUES(:pseudo,:message)');
	$requete->execute(array('pseudo' => strip_tags($_POST['pseudo']),'message' => strip_tags($_POST['message'])));
?>