<?php setcookie('pseudo','Alex',time()+360*24*3600,null,null,false,true);?>
<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="minichat.css">
	<meta charset="utf-8"/>
	<title>Minichat</title>
</head>
<body>
	<section id="chatzone">	
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
		echo '<p><strong>' . $donnees['pseudo'] . '</strong> :<br/>' . $donnees['message'] . '</p>';
	}
	$reponse->closeCursor();
	?>
	</section>
	<br/>
	<form method="post" action="minichat_post.php">
		<div id="textboxes">
			<?php
			if (isset($_COOKIE['pseudo']))
			{
				echo '<div id:"pseudobox"><label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo" value=' . $_COOKIE['pseudo'] . ' required></div><br/>';
			}
			else
			{
				echo '<div id:"pseudobox"><label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo" required></div><br/>';
			}
			?>
			<label for="message">Message : </label><input type="text" name="message" id="message" required><br/>
		</div>
		<input type="submit" name="envoyer" id="submit" value="Envoyer">
	</form>
	
</body>
</html>