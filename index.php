<?php session_start(); ?>

<html>
    <head>
        <title>Profesores Con Clase</title>
        <meta charset="utf-8"/>
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="Index de Profesores con clase"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
        <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/index.js"></script>
	<script src="js/common.js"></script>
    </head>
    <body id="index_body">
        <?php 
            $_SESSION["volverIndex"] = 1;
            include './php/header.php'; 
        ?>
        <div id="index_principal">
	    <!-- Contenido al pulsar login -->
            <div id="login_placement">
                <?php include './php/login.php'; ?>
            </div>
            <!-- Contenedor para el logo -->
            <div id="index_logoPrincipal">
            </div>
            <!-- Botones para registrarse -->
            <div id="index_botonesInfo">
                <div id="index_botonesInfo2">
                    <?php
                        if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){ //Sesion no iniciada
                          echo '<button class="blue" id="index_toProfes" type="button" >¿Buscas profesores?</br>¡Este es tu sitio!</button>';
                          echo '<button class="blue" id="index_toAlumnos" type="button" >¿Buscas alumnos?</br>¡Este es tu sitio!</button>';
                        }
                        elseif ($_SESSION["type"] == "alumno") {  //Alumno
                          echo '<button class="green" id="index_toProfes" type="button" >¿Buscas profesores?</br>¡Este es tu sitio!</button>';
                          echo '<button class="green" id="index_toAlumnos" type="button" >¿Buscas alumnos?</br>¡Este es tu sitio!</button>';
                        }
                        elseif ($_SESSION["type"] == "profesor") {  //Profesor
                          echo '<button class="blue" id="index_toProfes" type="button" >¿Buscas profesores?</br>¡Este es tu sitio!</button>';
                          echo '<button class="blue" id="index_toAlumnos" type="button" >¿Buscas alumnos?</br>¡Este es tu sitio!</button>';
                        }
                        elseif ($_SESSION["type"] == "administrador") {  //Admin
                          echo '<button class="purple" id="index_toProfes" type="button" >¿Buscas profesores?</br>¡Este es tu sitio!</button>';
                          echo '<button class="purple" id="index_toAlumnos" type="button" >¿Buscas alumnos?</br>¡Este es tu sitio!</button>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php include './php/footer.php'; ?>
    </body>
</html>
