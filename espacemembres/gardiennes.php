<?php require 'include/header.php';
require 'include/start_bdd.php';
?>
<title>gardiennes</title>
</head><body>
</div>

<h3 class="text-center text-white pt-5">Liste de nos gardiennes</h3>
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <?php
            require ("include/database.php");
            $db = Database::connect();
            $statement = $db->query("SELECT prenom, nom, note, garderie_id, niveau, session, annee FROM gardiennes INNER JOIN niveaux ON gardiennes.id = niveaux.gardienne_id");
            $resultat = $statement->fetch();

            do{
                echo '<p> <strong style="color:#17a2b8" >' .$resultat['prenom']. ' ' .$resultat['nom']. '</strong> Dans la garderie<strong style="color:#17a2b8" > ' .$resultat['garderie_id']. '</strong> <text>S\'occupe du niveau</text><strong style="color:#17a2b8" > ' .$resultat['niveau']. '</strong> est noté ' .$resultat['note']. '  </p>';
            } while($resultat = $statement->fetch());


            ?>
        </div>
    </div>
</div>

</body>