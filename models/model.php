<?php 

    class Bdd{

        public $connexion;

        public function __construct() {
            $dsn = "mysql:host=localhost;dbname=test";
            $username = "root";
            $password = "";
            $this->connexion = new PDO($dsn, $username, $password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "vous êtes connecté à la bdd";
        }
        function readAll(){
            $sql = "SELECT * FROM `Taches`";
            $request = $this->connexion->prepare($sql);
            $request->execute();
            return $request->fetchAll(PDO::FETCH_ASSOC);
        }
        function insertBdd($param1){
            $sql = "INSERT INTO `Taches`(`tache`) VALUES (:tache)";
            $stmtinsert = $this->connexion->prepare($sql);
            $stmtinsert->bindParam(':tache', $param1);
            $stmtinsert->execute();
            echo "data bien ajouté à la bdd";
        }
        function modifBdd($idTache, $nouvelleTache){
            $sql = "UPDATE `Taches` SET `tache` = :nouvelleTache WHERE `id` = :idTache";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':nouvelleTache', $nouvelleTache);
            $stmt->bindParam(':idTache', $idTache);
            $stmt->execute();
        }
        function suppBdd($suppTache){
            $sqlSup = "DELETE FROM `Taches` WHERE id = :idTache";
            $stmtSup = $this->connexion->prepare($sqlSup);
            $stmtSup->bindParam(':idTache', $suppTache);
            $stmtSup->execute();

            echo "data Supprimer";
        }
    }
?>
