<!DOCTYPE html>
<html>
<head>
	<title>Minichat</title>
</head>
<body>
	<form method="post" action="minichat_post.php">
		<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo"><br/>
		<label for="message">Message : </label><input type="text" name="message" id="message"><br/>
		<input type="submit" name="envoyer" value="Envoyer">
	</form>
	<br/>
<?php
	$bdd = new PDO('mysql:host=localhost;dbname=minichat','root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$reponse = $bdd->query('SELECT * FROM minichat ORDER BY ID DESC LIMIT 10');
	while ($donnees = $reponse->fetch())
	{
		echo '<p><strong>' . $donnees['pseudo'] . '</strong> : ' . $donnees['message'] . '</p>';
	}
?>
</body>
</html>