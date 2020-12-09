<?php require 'include/header.php';
require_once 'include/start_bdd.php';
global $wpdb;
$id = $_SESSION['id'];
if (isset($_POST['inscrire'])){
    $requete = $bdd->prepare('INSERT INTO garderie.enfants(prenom, nom, datenaissance, niveau_id, parent_id) VALUES(:prenom, :nom, :daten, :niveau, :parent)');

    $requete->bindvalue(':prenom', $_POST['prenom']);
    $requete->bindvalue(':nom', $_POST['nom']);
    $requete->bindvalue(':daten', $_POST['datenaissance']);
    $requete->bindvalue(':niveau', $_POST['niveau']);
    $requete->bindvalue(':parent', $_SESSION['id']);

    $requete->execute();
}


?>
<title>Inscription enfant</title>
</head><body>
</div>


<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <h3 class="text-white">Liste de mes enfants</h3>
                <?php
                require ("include/database.php");
                $db = Database::connect();
                $statement = $db->query("SELECT prenom, nom, datenaissance, niveau_id FROM garderie.enfants WHERE parent_id = $id");
                $resultat = $statement->fetch();

                do{
                    echo '<p> <strong style="color:#17a2b8" >' .$resultat['prenom']. ' ' .$resultat['nom']. '</strong> ' .$resultat['datenaissance']. ' <strong style="color:#17a2b8" > niveau ' .$resultat['niveau_id']. '</strong></p>';
                } while($resultat = $statement->fetch());
                ?>
                <div>
                    <button class="btn btn-outline-success" ><a href="supprimer_enfant.php" style="color: red">Supprimer les enfants</a></button>
                </div>
            </div>
            <div id="login-column" class="col-md-6">
                <h3 class="text-center text-white pt-5">Inscrire votre enfant</h3>
                <div id="login-box" class="col-md-12">

                    <center><div class="container" style="background-color:#FB6969;">
                            <font color="#8B0505">
                                <?php if(isset($message)) echo $message;?>
                            </font>
                        </div></center>

                    <form id="login-form" class="form" method="post">

                        <div class="form-group">
                            <label for="prenom" class="text-info">Prénom:</label><br>
                            <input type="text" name="prenom" id="prenom" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="nom" class="text-info">Nom:</label><br>
                            <input type="text" name="nom" id="nom" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="datenaissance" class="text-info">Date de naissance:</label><br>
                            <input type="date" name="datenaissance" id="datenaissance" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="niveau" class="text-info">Niveau d'apprentissage (ex:1-2-3):</label><br>
                            <input type="text" name="niveau" id="niveau" class="form-control" >
                        </div>

                        <div class="form-group">
                            <input type="submit" name="inscrire" class="btn btn-info btn-md" value="Inscrire">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

</body>