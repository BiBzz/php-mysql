<!--blog navigation bar-->
<nav>
<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=blog','root','root');
	}
	catch(Exception $e)
	{
		die('Message d\'erreur : ' . $e->getMessage());
	}
	echo '<h3>Nos derniers articles</h3>';
	$posts = $bdd->query('SELECT * FROM posts ORDER BY post_creation_date DESC');
	while ($post = $posts->fetch())
	{
		echo '<h4>' . $post['post_title'] . '</h4>';
	}
?>
</nav>