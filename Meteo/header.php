
<?php

    include_once 'date_var.php';
    
?>

<head>
    <title>Meteo Paris-Bordeaux</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media 			queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/			html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/			respond.min.js"></script>
    <![endif]-->
    
    <style>

        body, body a {
            font-family: sans-serif;
            
            <?php
            
                if ($heure_seul > 7 && $heure_seul < 19) {
            
            ?>
            
            color: #000;
            background-color: #fff;
            
            <?php } else { ?>
            
            color: #fff;
            background-color: #000;
            
            <?php } ?>
            
        }

    </style>

</head>