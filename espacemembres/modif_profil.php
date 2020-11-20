<?php require 'include/header.php'; ?>
<title>Profil</title>
</head><body>
</div>

<?php


if(isset($_POST['modification']) AND isset($_SESSION['id']))
{
	$id = $_SESSION['id'];

    if(empty($_POST['email']))
    {
        $message = 'Votre username doit être une chaine de caractéres (alphanumérique) !';
    }
    elseif(empty($_POST['password']) || $_POST['password'] != $_POST['password2'])
    {
        $message = "Rentrer un mot de passe valide";
    }
    else
    {
        require_once 'include/start_bdd.php';


        $req = $bdd->prepare('SELECT * FROM garderie.parents WHERE email = :email');

        $req->bindvalue(':email', $_POST['email']);
        $req->execute();
        $result = $req->fetch();

         if($result)
       {
       	$message = "L'adresse email que vous avez choisi est déjà pris";
       }
         else
       {

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $requete = $bdd->prepare('UPDATE garderie.parents SET email = :email, password = :password WHERE id=:id' );

        $requete->bindvalue(':email', $_POST['email']);
        
        $requete->bindvalue(':password', $password);
        $requete->bindvalue(':id', $id);

        $requete->execute();

        
        header('location:index.php');

       }

   }

}

   ?>

       <div id="login">
<h3 class="text-center text-white pt-5">Modification du profil</h3>
<div class="container">
<div id="login-row" class="row justify-content-center align-items-center">
<div id="login-column" class="col-md-6">
<div id="login-box" class="col-md-12">


<center><div class="container" style="background-color:#FB6969;">
<font color="#8B0505"> 
<?php if(isset($message)) echo $message;?> 
</font>
</div></center> 

<form id="login-form" class="form" action="" method="post">
 <div class="form-group">
      <label for="email" class="text-info">Email:</label><br>
      <input type="text" name="email" id="email" class="form-control">
</div>


<div class="form-group">
      <label for="password" class="text-info">Mot de passe:</label><br>
      <input type="password" name="password" id="password" class="form-control">
</div>
<div class="form-group">
      <label for="password2" class="text-info">Confirmation du mot de passe:</label><br>
      <input type="password" name="password2" id="password2" class="form-control">
</div>
<div class="form-group">
      <input type="submit" name="modification" class="btn btn-info btn-md" value="Modifier">

</div>
                              
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
