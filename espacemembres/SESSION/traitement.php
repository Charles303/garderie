<!DOCTYPE html>
<html>

	<head>
		<title> Traitement des données </title>
		<h1> Traitement des données </h1>
	</head>

	<body>
	
		<?php 
			$identifiant_valide = "Shany";
			$mot_de_passe_valide = "12345";
			
			if($_POST['identifiant'] == $identifiant_valide && $_POST['motpasse'] == $mot_de_passe_valide)
			{
				session_start();
				
				$_SESSION['identifiant'] = $_POST['identifiant'];
				$_SESSION['motpasse'] = $_POST['motpasse'];
				
				echo 'Bonjour, vous êtes connectés avec succès. <br>';
			}
		?>
		
	</body>

</html>