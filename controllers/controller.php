<?php
    require_once "models/model.php";
    
    class controller{
        function index(){
            require_once "views/header.php";
            require_once "views/base.php";
        }
        function affichageTaches(){
            require_once 'views/tabaffichage.php';
        }
        function soumettreTache(){
            require "views/tabtache.php";
        }
        function entrerTache(){
            if(isset($_POST['tache'])) {
                $tache = htmlspecialchars($_POST['tache']);
                $conn = new Bdd;
                $conn->insertBdd($tache);
            } 
        }
        function supptache(){
            $suppTache = $_POST["idTache"];
            $conn = new Bdd;
            $conn->suppBdd($suppTache);
        }
    }
?>

