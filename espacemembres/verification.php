<?php require 'include/header.php';
require_once 'include/start_bdd.php';
?>
<title>Verification</title>
</head><body>

<?php
if($_GET){

	if(isset($_GET['email'])){
		$email = $_GET['email'];
	}
	if(isset($_GET['token'])){
		$token = $_GET['token'];
	}

	if(!empty($email) && !empty($token)){

		$requete = $bdd->prepare('SELECT * FROM garderie.parents WHERE email=:email');
		$requete->bindvalue(':email',$email);

		$requete->execute();

		$nombre=$requete->rowCount();

		if($nombre==1){
			$update = $bdd->prepare('UPDATE garderie.parents SET validation=:validation WHERE email=:email AND token=:token');

			$update->bindvalue(':validation',1);
			$update->bindvalue(':token',$token);
			$update->bindvalue(':email',$email);

			$resultUpdate=$update->execute();

			if($resultUpdate){
				echo "<script type=\"text/javascript\">
				alert('Votre adresse email est bien confirmée');
				document.location.href='connexion.php';
				</script>";


			}
		}
	}
}















