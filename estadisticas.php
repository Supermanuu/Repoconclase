<?php

    include './php/sesion.php';
    
?>

<html>
    <head>
        <title>Valoraciones</title>
        <meta charset="utf-8"/>
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="Cliente de mensajería"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
        <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/common.js"></script>
    </head>
    <body id="valora_body">
    <?php
        $_SESSION["volverIndex"] = 1;
        include('php/header.php'); 
    ?>
        <div id="valora_principal">
	  <h1>Lee lo ultimo que la gente ha comentado sobre ti </h1>
        <?php
            if ($_SESSION["type"] == "alumno"){
                $color = "verde";
            }
            elseif($_SESSION["type"] == "profesor"){
                $color = "azul";
            }
            $temporal = "valora_" . $color;
            echo '<div id=' . $temporal . '>';
               include('php/valora2.php');
            echo '</div>';
        ?>
        </div>
        <?php include('php/footer.php'); ?>
    </body>
</html>
