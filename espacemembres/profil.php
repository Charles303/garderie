<?php require 'include/header.php'; ?>
<title>Profil</title>
<head></head>
	<body>

	<?php
	if(isset($_SESSION['id']))
	{
		?>
		<div id="login">
		<h3 class="text-center text-white pt-5">Profil</h3>
		<div class="container">
		<div id="login-row" class="row justify-content-center align-items-center">
		<div id="login-column" class="col-md-6">
		<div id="login-box" class="col-md-12">

		<table>
			<tr><td>Nom:</td><td><?=$_SESSION['prenom'] ?> </td></tr>
			<tr><td>Email:</td><td><?=$_SESSION['email'] ?> </td></tr>
			<tr><td><a href="modif_profil.php"> Modifier mon profil</td></tr>
		</table>

		<?php
	}
	?>

</body>
</html>