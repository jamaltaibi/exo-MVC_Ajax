<?php
    require_once "models/model.php";
        
    class controller{        
         /** * Permet d'afficher le header et le debut du DocType html la base. */
        function index(){
            require_once "views/header.php";
            require_once "views/base.php";
        }        
        /** * Affiche le tableau des Taches*/
        function affichageTaches(){
            require_once 'views/tabaffichage.php';
        }
        /** * Affiche le champs a remplir des Taches */
        function soumettreTache(){
            require "views/tabtache.php";
        }
        /** * Fonction qui permet au controlleur d'acceder a la base de données afin d'Inserer la donnée. */
        function entrerTache(){
            if(isset($_POST['tache'])) {
                $tache = htmlspecialchars($_POST['tache']);
                $conn = new Bdd;
                $conn->insertBdd($tache);
            } 
        }
        /** * Fonction qui permet au controlleur d'acceder a la base de données afin de Supprimer la donnée. */
        function supptache(){
            $suppTache = $_POST["idTache"];
            $conn = new Bdd;
            $conn->suppBdd($suppTache);
        }
    }
?>

