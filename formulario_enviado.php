<?php session_start(); ?>

<html lang="es-ES">
    <head>
        <title id="Title">Profesores con clase</title>
        <meta charset="utf-8">
        <meta name="author" content="Sistemas web 15/16">
        <meta name="description" content="Formulario enviado">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
        <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/common.js"></script>
        <script src="js/contacto.js"></script>
    </head>
    <body class="form_body">
        <?php 
            $_SESSION["volverIndex"] = 1;
            include './php/header.php'; 
        ?>
        <div class="form_principal">
            <div id="login_placement">
                <?php include './php/login.php'; ?>
            </div>
            <div class="form_contenido">
                <h1 class="my_h1">Formulario enviado</h1>
                <p>Se ha procesado su solicitud. Por favor, continúe navegando por nuestra página.</p>
            </div>
        </div>
        <?php include './php/footer.php'; ?>
    </body>
</html>

