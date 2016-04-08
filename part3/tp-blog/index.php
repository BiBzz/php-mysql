<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Blog</title>
</head>
<body>
	<?php
	include('blog-header.php');
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=blog','root','root');
	}
	catch(Exception $e)
	{
		die('Message d\'erreur : ' . $e->getMessage());
	}
	echo '<h4>Our last posts :</h4>';
	$posts = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 5');
	while ($post = $posts->fetch())
	{
		echo 	'<div class="news">' .
					'<h3>' . $post['title'] . ' <em>le ' . $post['creation_date_fr'] . '</em></h3>' .
					'<p>' . $post['content'] . '<br />' .
					'<a href="post.php?post_id=' . $post['id'] . '">Comments</a>' . '</p>' .
				'</div>';
	}
	$posts->closeCursor();
	?>
</body>
</html>