
<?php 
	session_start();
?>

<!DOCTYPE html>
<html>

	<head>
		<title> Page espace Membre </title>
		<h1> Page Espace membre </h1>
	</head>

	<body>
	
		<?php 
			// On detruit les variables de notre session
			session_unset();
			
			// On detruit notre session
			session_destroy();
		?>
		
	</body>

</html>