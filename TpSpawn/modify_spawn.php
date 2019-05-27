<?php

include_once 'bdd.php';

if(!empty($_POST['spawn_id']) && !empty($_FILES['new_spawn_img']['name']) && !empty($_POST['new_spawn_name'])) {

    $id = (int) trim(htmlspecialchars($_POST['spawn_id']));
    $new_nom = trim(htmlspecialchars($_POST['new_spawn_name']));

    echo $id, $new_nom;

    if (is_int($id)) {


        $test = $bdd->prepare("SELECT * FROM spawns WHERE ID = :id");
        $test->execute(array(
            "id" => $id
        ));

        while($rows = $test->fetch()) {
            $nom = $rows['nom'];
            $img_server = $rows['img'];
        }
        $img = $img_server;

        $test_result = ($test->rowCount() > 0) ? true : false;

        if ($test_result) {

            $dir = "uploads/";
            $filepath = $dir . basename($_FILES["new_spawn_img"]["name"]);
            $fileType = strtolower(pathinfo($filepath,PATHINFO_EXTENSION));
            $extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'tiff');

            if(in_array($fileType, $extensions)) {

                if(move_uploaded_file($_FILES['new_spawn_img']['tmp_name'], $filepath)) {
                    
                    echo $img;
                    unlink($img);

                    $query = $bdd->prepare("UPDATE spawns SET nom=:nom, img=:img WHERE id=:id");
                    $query->execute(array(
                        'nom' => $new_nom,
                        'img' => $filepath,
                        "id" => $id
                    ));

                    echo '<br><br><br><br><br>';
                    echo '<center><h1>Le spawn avec comme nom : '.$nom.' a bien été modifié pour : '.$new_nom.'</h1>';
                    ?>
                    <center><a href="index.php?page=3">Accueil</a></center>
                    <?php
                    echo '<img src="'.$filepath.'" alt=""></center>';

                    $query = $bdd->prepare("UPDATE spawns SET nom=:nom, img=:img WHERE id=:id");
                    $query->execute(array(
                        "nom" => $new_nom,
                        "img" => $filepath,
                        "id" => $id
                    ));

                }

            }

        } else {

            echo '<br><br><br><br><br>';
            echo '<center><h1>Le spawn avec comme ID:'.$id.' n\'existe pas !</h1></center>';

        }

    } else {

        header('Location: index.php?page=2&error=2');
        //id est pas un int
    }


} else {

    header('Location: index.php?page=2&error=1');
    //une entrée est null
}

?>