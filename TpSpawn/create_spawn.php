<?php

include_once 'bdd.php';

if(!empty($_POST['new_spawn_name']) && !empty($_FILES['file']['name'])) {

    $name = trim(htmlspecialchars($_POST['new_spawn_name']));

    $query_name_exist = $bdd->prepare("SELECT nom FROM spawns WHERE nom = :nom");
    $query_name_exist->execute(array(
        "nom" => $_POST['new_spawn_name']
    ));

    if($query_name_exist->rowCount() == 0) {
        $dir = "uploads/";
        $filepath = $dir . basename($_FILES["file"]["name"]);
        $fileType = strtolower(pathinfo($filepath,PATHINFO_EXTENSION));
        $extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'tiff');

        if(in_array($fileType, $extensions)) {

            if(move_uploaded_file($_FILES['file']['tmp_name'], $filepath)) {

                $query = $bdd->prepare("INSERT INTO spawns (nom, img) VALUES (:nom, :img)");
                $query->execute(array(
                    'nom' => $name,
                    'img' => $filepath
                ));



                $file_tmp_name = $_FILES['file']['name'];

                echo '<br><br><br><br><br>

                <center>

                <h1>Le spawn '.$name.' a bien été ajouté</h1>
                <br><br><br><a href="index.php?page=1">Accueil</a>
                <img src="uploads/'.$file_tmp_name.'" alt="">

                </center>';

            }

        } else {
            header('Location: index.php?page=1&error=3');
            //pas une image
        }

    } else {
        header('Location: index.php?page=1&error=4');
        //nom existe déjà
    }


} else {

    header('Location: index.php?page=1&error=1');
    //un champ est vide

}

?>