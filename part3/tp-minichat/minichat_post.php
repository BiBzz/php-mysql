<?php
	header('Location: minichat.php');
	if (isset($_POST['pseudo']) && isset($_POST['message']))
		{
			$bdd = new PDO('mysql:host=localhost;dbname=minichat','root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$requete = $bdd->prepare('INSERT INTO minichat(pseudo,message) VALUES(:pseudo,:message)');
			$requete->execute(array('pseudo' => strip_tags($_POST['pseudo']),'message' => strip_tags($_POST['message'])));
		}
?>