<?php
	setcookie('pseudo','Alex',time()+360*24*3600,null,null,false,true);
?>
<!DOCTYPE html>
<html>
	<title>Minichat</title>
</head>
<body>
	<form method="post" action="minichat_post.php">
		<?php
		if (isset($_COOKIE['pseudo']))
		{
			echo '<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo" value=' . $_COOKIE['pseudo'] . ' required><br/>';
		}
		else
		{
			echo '<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo" required><br/>';
		}
		?>
		<label for="message">Message : </label><input type="text" name="message" id="message" required><br/>
		<input type="submit" name="envoyer" value="Envoyer">
	</form>
	<br/>
<?php
	//Database connection
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=minichat','root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	//Select last 10 messages with related pseudo
	$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 10');
	//Display each messages with related pseudo
	while ($donnees = $reponse->fetch())
	{
		echo '<p><strong>' . $donnees['pseudo'] . '</strong> : ' . $donnees['message'] . '</p>';
	}
	$reponse->closeCursor();
?>
</body>
</html>