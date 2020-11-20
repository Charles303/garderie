<?php require 'include/header.php';
require 'include/start_bdd.php';
?>
<title>cadeaux</title>
</head><body>
</div>

<h3 class="text-center text-white pt-5">Liste des cadeaux pour les enfants</h3>
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <?php
            $id = $_SESSION['id'];
            require ("include/database.php");
            $db = Database::connect();
            $statement = $db->query("SELECT cadeau, enfants.prenom FROM cadeaux inner join enfants on cadeaux.enfant_id = enfants.id inner join parents on enfants.parent_id = parents.id where parent_id = $id");
            $resultat = $statement->fetch();

            do{
                echo '<p> <strong style="color:#17a2b8" >' .$resultat['cadeau']. '</strong> Pour <strong style="color:#17a2b8" > ' .$resultat['prenom']. '</strong></p>';
            } while($resultat = $statement->fetch());


            ?>
        </div>
    </div>
</div>

</body>