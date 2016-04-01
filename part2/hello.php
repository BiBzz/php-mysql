<!DOCTYPE html>
<html>
<head>
	<title>Bonjour!</title>
</head>
<body>
	<?php
	if (isset($_GET['nom']) && isset($_GET['prenom']))
	{
		echo '<p>Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' </p>';
	}
	?>
</body>
</html>