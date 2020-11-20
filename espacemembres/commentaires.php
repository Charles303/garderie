<?php require 'include/header.php';
require 'include/start_bdd.php';
?>
<title>commentaires</title>
</head><body>
</div>

<h3 class="text-center text-white pt-5">Faire un commentaire</h3>
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <?php
            require ("include/database.php");
            $db = Database::connect();
            $statement = $db->query("SELECT id, prenom, nom FROM gardiennes");
            $resultat = $statement->fetch();

            $requete = $db->query("SELECT id, nom FROM garderies");
            $result = $requete->fetch();
            ?>
            <h3>Sur un établissement</h3>
            <form method="post">
                <label for="texteeta">Texte:</label>
                <textarea id="texteeta" name="texteeta" rows="4" cols="50">

                </textarea>
                <label for="etablissement">établissement:</label>

                <select name="etablissement" id="etablissement">
                    <?php
                    do{
                        echo '<p><option>'.$result['id'].'</option></p>';
                    } while($result = $requete->fetch());
                    ?>
                </select>
                <input type="submit" name="submiteta" id="submiteta" value="Envoyer le commentaire"/>
            </form>




        </div>
        <div class="col-md-6">
            <h3>Sur une gardienne</h3>

            <form method="post">

            <label for="texte">Texte:</label>
                <textarea id="texte" name="texte" rows="4" cols="50">

                </textarea>
                <label for="gardiennes">gardienne:</label>

                <select name="gardiennes" id="gardiennes">
                    <?php
                    do{
                        echo '<p><option>'.$resultat['id'].'</option></p>';
                    } while($resultat = $statement->fetch());
                    ?>
                </select>
                <?php
                $gardienne = $_POST['gardiennes'];
                $texte = $_POST['texte'];

                ?>
            <input type="submit" name="submitgardienne" id="submitgardienne" value="Envoyer le commentaire"/>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submitgardienne'])){
    $requete = $bdd->prepare('INSERT INTO garderie.commentaires(texte, gardienne_id) VALUES(:texte, :gardienne_id)');

    $requete->bindvalue(':texte', $_POST['texte']);
    $requete->bindvalue(':gardienne_id', $_POST['gardiennes']);

    $requete->execute();
}
if (isset($_POST['submiteta'])){
    $requete = $bdd->prepare('INSERT INTO garderie.commentaires(texte, garderie_id) VALUES(:texteeta, :garderie_id)');

    $requete->bindvalue(':texteeta', $_POST['texteeta']);
    $requete->bindvalue(':garderie_id', $_POST['etablissement']);

    $requete->execute();
}

?>
</body>