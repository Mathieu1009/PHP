<?php

include_once 'bdd.php';

if(!empty($_POST['spawn_id'])) {


    $id = (int) trim(htmlspecialchars($_POST['spawn_id']));

    if (is_int($id)) {

        $test = $bdd->prepare("SELECT * FROM spawns WHERE ID = :id");
        $test->execute(array(
            "id" => $id
        ));

        $test_result = ($test->rowCount() > 0) ? true : false;

        if ($test_result) {

            while($rows = $test->fetch()) {
                $nom = $rows['nom'];
            }

            echo '<br><br><br><br><br>';
            echo '<center><h1>Le spawn avec comme nom:'.$nom.' à bien été supprimé !</h1></center>';

            $query = $bdd->prepare("DELETE FROM spawns WHERE ID = :id");
            $query->execute(array(
                "id" => $id
            ));

        } else {

            echo '<br><br><br><br><br>';
            echo '<center><h1>Le spawn avec comme ID:'.$id.' n\'existe pas !</h1></center>';
            
        }


?>
<center><a href="index.php?page=3">Accueil</a></center>
<?php

    } else {

        header('Location: index.php?page=3&error=2');
        //id entré n'est pas un nombre
    }


} else {

    header('Location: index.php?page=3&error=1');
    //rien rentré dans id
}

?>