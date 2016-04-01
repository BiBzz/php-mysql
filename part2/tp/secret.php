<!DOCTYPE html>
<html>
<head>
	<title>Codes top secret</title>
</head>
<body>
	<?php
	if (isset($_POST['password']) && $_POST['password']=="kangourou")
	{
		echo '<p>Le code d\'accès ultra secret est kangourou';
	}
	else
	{
		echo 'Vous n\'avez malheuresement pas le bon code d\'accès';
	}
	?>
</body>
</html>