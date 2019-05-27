<?php
session_start();
include_once 'bdd.php';

$query = $bdd->prepare("SELECT id FROM spawns");
$query->execute();

if($query->rowCount() > 0) {
    
    $items = array();
    $i = 0;
    while($rows = $query->fetch()) {
        $items[$i]=$rows['id'];
        $i++;
    }
    $i--;
    
    $pick_spawn = random_int(0, $i);
    if (empty($_SESSION['last_pick']) && $_SESSION['last_pick'] === "") {
        $_SESSION['last_pick'] = $pick_spawn;
    } else {
        
        while ($pick_spawn == $_SESSION['last_pick']) {
            $pick_spawn = random_int(0, $i);
        }

        $_SESSION['last_pick'] = $pick_spawn;

    }

    $query = $bdd->prepare("SELECT nom, img FROM spawns WHERE ID=:id");
    $query->execute(array(
        "id" => $items[$pick_spawn]
    ));

    $xpos = 0;
    $ypos = 0;

    while($rows = $query->fetch()) {
        $nom = $rows['nom'];
        $img = $rows['img'];
    }

    echo '<br><br><br><br><br>

    <center>

    <h1>Vous avez spawn à : '.$nom.'</h1>
    <br><br><br>';
    ?>
    <center><a href="index.php">Accueil</a></center>
    <?php
    echo '<img src="'.$img.'" alt="">

    </center>';
    
} else {
    
    echo '<br><br><br><br><br>';
    echo '<center><h1>Il n\'y a aucuns spawns !</h1></center>';
    
}

?>