<!DOCTYPE html>
<html>

	<head>
		<title> Formulaire de connexion </title>
		<h1> Formulaire de connexion </h1>
	</head>

	<body>
		<form method="post" action="traitement.php">
			<p>
			<label for="identifiant"> Votre identifiant </label>
			<input type="text" name="identifiant"/>
			</p>
			<p>
			<label for="motpasse"> Votre mot-de-passe </label>
			<input type="password" name="motpasse"/>
			</p>
			<p>
			<input type="submit" value="Connexion"/>
			</p>
		</form>
	</body>

</html>