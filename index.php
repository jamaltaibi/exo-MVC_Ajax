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
    ob_end_flush();
?>
 <script src="script.js"></script>
