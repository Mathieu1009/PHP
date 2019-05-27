<?php
session_start();
include_once 'bdd.php';

if (!empty($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
}

?>

<!DOCTYPE html>
<html lang="fr">



    <head>
        <title>Test PDO</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media 			queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/			html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/			respond.min.js"></script>
<![endif]-->

        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>

        <div class="content">


            <p><a href="index.php">Spawner</a></p>
            <p><a href="index.php?page=1">Créer un spawn</a></p>
            <p><a href="index.php?page=2">Modifier un spawn</a></p>
            <p><a href="index.php?page=3">Supprimer un spawn</a></p>
            <p><a href="index.php?page=4">Voir la liste des spawns</a></p>

            <br><br>

            <?php

            if (isset($page)) {

                if ($page == 1) {

            ?>

            <h2>Créer un Spawn</h2>

            <form action="create_spawn.php" method="post" enctype="multipart/form-data">
                <label for="user_name">Nom du spawn :</label>
                <input type="text" name="new_spawn_name" id="new_spawn_name" placeholder="Nom du spawn">
                <br>
                <br>
                <label for="file">Image du spawn :</label>
                <input type="file" name="file" id="file">
                <br>
                <br>
                <br>
                <input type="submit" value="Créer ce spawn !" id="submit" name="submit">

            </form>

            <?php

                } elseif ($page == 2) {

            ?>

            <h2>Modifier un spawn</h2>

            <form action="modify_spawn.php" method="post" enctype="multipart/form-data">

                <label for="spawn_id">ID du spawn :</label>
                <input type="text" name="spawn_id" id="spawn_id" placeholder="ID">
                <br>
                <label for="new_spawn_name">Nouveau nom :</label>
                <input type="text" name="new_spawn_name" id="new_spawn_name" placeholder="Nouveau nom du spawn">
                <br>
                <label for="new_spawn_img">Nouvelle image :</label>
                <input type="file" name="new_spawn_img" id="new_spawn_img">
                <br>
                <br>
                <input type="submit" value="Modifier ce spawn" id="submit" name="submit">

            </form>

            <br><br>

            <center>
            <?php

                    $query = "SELECT * FROM spawns";

                    if ($fetch = $bdd->query($query)) {
                        echo '<table>
                        <tr>
                            <th>ID</th>
                            <th>NOM</th>
                            <th id="img_table">IMG</th>
                        </tr>';
                        
                        while ($row = $fetch->fetch()) {
                            
                            echo '<tr><td>'.$row['ID'].'</td>';
                            echo '<td>'.$row['nom'].'</td>';
                            echo '<td><img id="td-img" src="'.$row['img'].'" alt=""></td></tr>';
                            
                        }
                        
                        echo '</table>';

                    }

            ?>
            </center>

            <?php

                } elseif ($page == 3) {

            ?>

            <h2>Supprimer un spawn</h2>

            <form action="delete_spawn.php" method="post">

                <label for="user_name">ID du spawn :</label>
                <input type="text" name="spawn_id" id="spawn_id" placeholder="ID">
                <br>
                <br>
                <input type="submit" value="Supprimer ce spawn" id="submit" name="submit">

            </form>

            <?php

                } elseif ($page == 4) {

            ?>

            <h2>Liste des spawns</h2>
            <center>
            <?php

                    $query = "SELECT * FROM spawns";

                    if ($fetch = $bdd->query($query)) {
                        echo '<table>
                        <tr>
                            <th>ID</th>
                            <th>NOM</th>
                            <th id="img_table">IMG</th>
                        </tr>';
                        
                        while ($row = $fetch->fetch()) {
                            
                            echo '<tr><td>'.$row['ID'].'</td>';
                            echo '<td>'.$row['nom'].'</td>';
                            echo '<td><img id="td-img" src="'.$row['img'].'" alt=""></td></tr>';
                            
                        }
                        
                        echo '</table>';

                    }

            ?>
            </center>
            <?php
                }
            } else {

            ?>

            <h2>Spawner</h2>

            <form action="spawn_user.php" method="post">

                <br>
                <input type="submit" value="Me faire spawn !" id="submit" name="submit">

            </form>

            <?php

            }

            ?>

        </div>

    </body>

</html>