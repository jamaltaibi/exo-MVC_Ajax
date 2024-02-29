<?php
    include '../models/model.php';

    $bdd = new Bdd();

    $idTache = isset($_POST['idtache']) ? intval($_POST['idtache']) : 0;
    $nouvelleTache = isset($_POST['nouvelleTache']) ? htmlspecialchars($_POST['nouvelleTache']) : '';
    
    $bdd->modifBdd($idTache,$nouvelleTache);

    http_response_code(200);
?>
