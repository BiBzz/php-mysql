<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
<?php
//Connection to the database
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog','root','root');
}
catch(Exception $e)
{
	die('Message d\'erreur : ' . $e->getMessage());
}
//Prepare the request to select post informations
$req = $bdd->prepare('SELECT title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = :postid');
//$req = $bdd->prepare('SELECT * FROM posts WHERE id = :postid');
$req->execute(array('postid' => $_GET['post_id']));
$post = $req->fetch();
	echo	
'	<title>' . $post['title'] . '</title>
</head>
<body>';
include("blog-header.php");
echo 	
'	<a href="index.php">Back to posts list</a>
	<div class="news">
		<h3>' . $post['title'] . ' <em>le ' . $post['creation_date_fr'] . '</em></h3>
		<p>' . $post['content'] . '</p>
	</div>
	<h4>Comments</h4>
	';
//Close the database resquest
$req->closeCursor();

//Prepare the request to select related comments
$req = $bdd->prepare('SELECT pseudo, message, DATE_FORMAT(creation_date, \'%d/%m/%Y à %hH%imin%ss\') AS creation_date_fr FROM comments WHERE post_id = :postid ORDER BY creation_date DESC');
$req->execute(array('postid' => $_GET['post_id']));
while ($comment = $req->fetch())
{
echo
'<p><strong>' . $comment['pseudo'] . '</strong> le ' . $comment['creation_date_fr'] . '</p>
	<p>' . $comment['message'] . '</p>
</body>
</html>';
}
//Close the database resquest
$req->closeCursor();
?>