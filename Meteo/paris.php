<!DOCTYPE html>
<html lang="fr">

    <?php include_once 'header.php'; ?>

    <body>
        
        <?php
            include_once 'date_var.php';
            include_once 'horloge.php';
            
        ?>

        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="bordeaux.php">Voir la météo de Bordeaux</a></li>
        </ul>
        
        <br><br><br>
        
        <?php
        
            for ($i = 0; $i<4 ; $i++) {
                echo '<center>';
            
                echo '<img src="https://www.prevision-meteo.ch/uploads/widget/paris_'. $i . '.png" alt="">';
            
                echo '</center>';
                echo '<br>';
            }
            
        ?>

    </body>

</html>