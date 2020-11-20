<!DOCTYPE html>
<html>

	<head>
		<title> Traitement des données </title>
		<h1> Traitement des données </h1>
	</head>

	<body>
	
		<?php 
			if(isset($_POST['nom']))
			{
				echo "Youpiiii !";
				setcookie("nom", $_POST['nom'], time()+365*24*3600, '/', '', false, false);
			}
		?>
		
	</body>

</html>