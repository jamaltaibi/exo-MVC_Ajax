
    <h2>Liste des taches : </h2>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Tache a effectué</th>
            <th>Modification</th>
            <th>Supprimer</th>
        </tr>
    <?php
        $conn = new Bdd;
        $data = $conn->readAll();
        foreach ($data as $value){
            echo "<tr>";
            echo "<td>" . $value["id"] . "</td>";
            echo "<td>" . htmlspecialchars($value["tache"]) . "</td>";
            echo "<td> 
                    <form method='POST' class = 'myForm' data-id='" . $value["id"] . "'>
                        <input type='hidden' name='idtache' value='" . $value["id"] . "'>
                        <input type='text' class = 'nouvelleTache' name='nouvelleTache' placeholder='Nouvelle tâche'>
                        <input type='submit' name='modif' class='modifier' value='Modifier'> 
                    </form>   
                </td>";

            echo "<td>  
                    <form method='POST'>
                        <input type='hidden' name='idTache' value=". $value["id"] .">
                        <input type='submit' name= 'supp' class='supprimer' value='Supprimer' >
                    </form>   
                </td>";
            echo "</tr>"; 
        }
    ?>
    </table>
    
