<?php require 'include/header.php';
require_once 'include/start_bdd.php';

$id = $_SESSION['id'];
$statement = $bdd->query("DELETE FROM garderie.enfants WHERE parent_id = $id");
$resultat = $statement->execute();