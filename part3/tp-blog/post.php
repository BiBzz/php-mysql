<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=blog','root','root');
	}
	catch(Exception $e)
	{
		die('Message d\'erreur : ' . $e->getMessage());
	}
	$req = $bdd->prepare('SELECT title, contenu,  ')


	$req = $bdd->prepare('SELECT * FROM comments WHERE post_id = :postid ORDER BY creation_date DESC');
	$req->execute(array('postid' => $_GET['post_id']));
	while ($comment = $req->fetch())
	{
		echo '<title>' . $comment['post-title'] . '</title>
		</head>
		<body>';
			include("blog-header.php");
		echo '</body>
		</html>';
		$req->closeCursor();
	}
?>