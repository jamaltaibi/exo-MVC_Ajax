<?php
ob_start();

require_once "controllers/controller.php";

$controller = new Controller;
$controller->index();

if (isset($_GET['page']) && $_GET['page'] == "accueil"){
    $controller->affichageTaches();
}
if (isset($_GET['page']) && $_GET['page'] == "tache"){
    $controller->soumettreTache();
}

if (isset($_POST['entrer'])){
    $controller->entrerTache();
}
if (isset($_POST['supp'])){
    header("Location: index.php?page=accueil");  
    $controller->supptache();   
}
if (isset($_POST['modif'])) {
    $idTache = isset($_POST['idtache']) ? intval($_POST['idtache']) : 0;
    $nouvelleTache = isset($_POST['nouvelleTache']) ? htmlspecialchars($_POST['nouvelleTache']) : '';

    if (!empty($nouvelleTache)) {
        $controller->modifierTache($idTache, $nouvelleTache);
        header("Location: index.php?page=accueil");
    } else {
        echo "Le champ de modification est vide. Veuillez entrer une nouvelle tâche.";
    }
}

ob_end_flush();
?>
