<?php

$bdd = new PDO('mysql:dbname = garderie; host=localhost','root','mysql');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

