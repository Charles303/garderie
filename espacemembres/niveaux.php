<?php require 'include/header.php';
require 'include/start_bdd.php';
?>
<title>niveaux</title>
</head><body>
</div>

<h3 class="text-center text-white pt-5">Liste des niveaux</h3>
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <?php
            require ("include/database.php");
            $db = Database::connect();
            $statement = $db->query("SELECT niveau, session, annee, prenom FROM niveaux inner join gardiennes on niveaux.gardienne_id = gardiennes.id");
            $resultat = $statement->fetch();

            do{
                echo '<p>Niveau <strong style="color:#17a2b8" >' .$resultat['niveau']. ' ' .$resultat['session']. ' ' .$resultat['annee']. ' </strong>, <text>Occupé par </text><strong style="color:#17a2b8" > ' .$resultat['prenom']. '</strong>  </p>';
            } while($resultat = $statement->fetch());


            ?>
        </div>
    </div>
</div>

</body>