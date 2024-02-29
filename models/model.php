<?php 

    /** * Accés a la base de donnéés et au fonction de la BDD */
    class Bdd{

        public $connexion;

        /** * Permet d'acceder a la base de données */
        public function __construct() {
            $dsn = "mysql:host=localhost;dbname=test";
            $username = "root";
            $password = "";
            $this->connexion = new PDO($dsn, $username, $password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "vous êtes connecté à la bdd";
        }
        /** * Permet de recuperer et lire la base de données choisie */
        function readAll(){
            $sql = "SELECT * FROM `Taches`";
            $request = $this->connexion->prepare($sql);
            $request->execute();
            return $request->fetchAll(PDO::FETCH_ASSOC);
        }
        /**
         * Permet d'inserer dans la base de données choisie
         * @param $param1 $param1 [la tache a effectué] 
         * */
        function insertBdd($param1){
            $sql = "INSERT INTO `Taches`(`tache`) VALUES (:tache)";
            $stmtinsert = $this->connexion->prepare($sql);
            $stmtinsert->bindParam(':tache', $param1);
            $stmtinsert->execute();
            echo "data bien ajouté à la bdd";
        }
        /**
         * Permet de Modifier dans la base de données choisie
         * @param $idTache $idTache ['']
         * @param $nouvelleTache $nouvelleTache [Modifie la tache enregistrer]
         */
        function modifBdd($idTache, $nouvelleTache){
            $sql = "UPDATE `Taches` SET `tache` = :nouvelleTache WHERE `id` = :idTache";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':nouvelleTache', $nouvelleTache);
            $stmt->bindParam(':idTache', $idTache);
            $stmt->execute();
        }
        /**
         * Permet de Supprimer dans la base de données choisie
         * @param $suppTache $suppTache [Supprime l'id et la tache]
         */
        function suppBdd($suppTache){
            $sqlSup = "DELETE FROM `Taches` WHERE id = :idTache";
            $stmtSup = $this->connexion->prepare($sqlSup);
            $stmtSup->bindParam(':idTache', $suppTache);
            $stmtSup->execute();

            echo "data Supprimer";
        }
    }
?>
