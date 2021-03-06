<?php session_start(); ?>

<html lang="es-ES">
    
    <head>
        <title id="Title">Profesores con clase</title>
        <meta charset="utf-8"> <!--Codificación utf8-->
        <meta name="author" content="SWTeam"/> <!--Autor del documento HTML-->
        <meta name="description" content="¿Quiénes somos?"> <!--Descripción del HTML-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
      	<link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      	<script src="js/common.js"></script>
    </head>
    </head>

    <body class="miembros_body">
        <?php 
            $_SESSION["volverIndex"] = 1;
            include './php/header.php'; 
        ?>

        <div class="miembros_principal">
            <div id="login_placement">
                <?php include './php/login.php'; ?>
            </div>
            <div id="contenido_miembros">
            <h1 class="my_h1">¿Quiénes somos?</h1>
            
            <div id="pablo">           
                <div id="miembro_foto">
                    <img src="img/gato.jpg" width="200" height="200" />
                </div>
            	<div id="miembro_texto">
                    <p><Strong>Pablo Lammers Corral</Strong></br></br>
                    Edad: 20 años.</br></br>
                    Futuro Ingeniero de Computadores, líder cuestionado de Profesores con Clase.</br>
                    Contacto : plammers@ucm.es</p>
                </div>
            </div>
            
            <div id="fran">
                <div id="miembro_foto">
                    <img src="img/nerd.jpg" width="200" height="200" />
                </div>
                <div id="miembro_texto">
                	<p>
                    <Strong>Francisco Burruezo Aranda</Strong></br></br>
                    Edad: 26 años.</br></br>
                    Cargando el paquete 'Ingeniería de Computadores'.</br>
                    Descubriendo las tecnologías web desde 2016.</br>
                    Contacto: frburrue@ucm.es</p>
                </div>
            </div>
            
            <div id="manu">
                <div id="miembro_foto">
                    <img src="img/neo-selfie.jpg" width="200" height="200"/>
                </div>
            	<div id="miembro_texto">
                    <p><Strong>Manuel Pascual</Strong></br></br>
                    Edad: 20 años.</br></br>
                    Ingeniero de Computadores no se hace, se nace.</br>
                    Mi gozo en el Pozo Murcia. Fui líder antes del motín.</br>
                    Contacto: manupa01@ucm.es</p>
                </div>
        	</div>
            
            <div id="pino">
                <div id="miembro_foto">
                    <img src="img/pino.jpg" width="200" height="200" />
                </div>
            	<div id="miembro_texto">
                    <p><Strong>Daniel del Pino Sánchez</Strong></br></br>
                    Edad: 21 años.</br></br>
                    Ingeniero en proceso, el músculo del grupo y delegado de clase.</br>
                    Talaverano de nacimiento, madridista de corazón.</br>
                    Contacto: danidelp@ucm.es</p>
                </div>
            </div>
            
            <div id="sergio">
                <div id="miembro_foto">
                    <img src="img/sergio.jpg" width="200" height="200" />
                </div>
            	<div id="miembro_texto">
                    <p><Strong>Sergio Tarancón</Strong></br></br>
                    Edad: 23 años.</br></br>
                    Ingeniero en fase Beta.</br>
                    Líder en las sombras de la sección HTML y diseñador de la interfaz web.</br>
                    Contacto: sertaran@ucm.es</p>
                </div>
            </div>
            
            </div>
        </div>

        <?php include './php/footer.php'; ?>

    </body>

</html>


