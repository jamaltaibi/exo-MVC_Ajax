<?php 
include '../models/model.php';

$bdd = new Bdd();

$resultat = $bdd->readAll();

echo json_encode($resultat);


?>