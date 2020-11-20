<!DOCTYPE html>
<html>

	<head>
		<title> Formulaire de connexion </title>
		<h1> Formulaire de connexion </h1>
	</head>

	<body>
		
		
		<?php 
			if(isset($_COOKIE['nom']))
			{
				echo 'Bonjour ' .$_COOKIE['nom'];
			}
			else
			{
				?>
				<form method="POST" action="traitement.php">
					<p>
					<label for="nom"> Votre nom </label>
					<input type="text" name="nom" />
					</p>
					<p>
					<label for="motpasse"> Votre mot-de-passe </label>
					<input type="password" name="motpasse" />
					</p>
					<p>
					<input type="submit" value="Connexion" />
					</p>
				</form>
				<?php
			}
		?>
	</body>

</html>