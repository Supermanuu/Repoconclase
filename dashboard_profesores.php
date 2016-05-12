<?php
	 session_start(); 

	 //si no has iniciado sesion y accedes desde la url te tira al index
	 if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){
	     header('Location: ./index.php');
	 }

?>

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
        <script src="js/common.js"></script>
        <script src="js/dashboard_profesores.js"></script>
    </head>
    
    <body class="dashprofes_body">

        <?php require_once('./php/header.php'); ?>

        <div class="dashprofes_principal" id="principal">

        	<div id="tuInfo" class="dashboard oscuro">
		    	<p class="dashprofes_big_p"> Leandro Gado Mata</p>
		    	<p class="dashprofes_small_p dashprofes_info">Proximos Eventos: </p>
		    	<p class="dashprofes_small_p dashprofes_info" id="tusEventos"> Quimica - Grupo 2 : 18:00 </p>
		 	</div>

        	<div id="tusAlumnos" class="dashboard claro">
		    	<p class="dashprofes_big_p">Tus Clases</p>
		    	<p class="dashprofes_small_p" id="gestionaAlumnos">Aqui encontrarás todo lo que necesitas para gestionar tus clases particulares con otros alumnos</p>
		 	</div>

		 	<div id="tusGrupos" class="dashboard claro">
		    	<p class="dashprofes_big_p">Tus Cursos</p>
		    	<p class="dashprofes_small_p" id="gestionaGrupos">Este es el espacio podrás admnistrar todo lo relacionado con tus clases a un grupo de alumnos</p>
		 	</div>

		 	<div id="buscaUsuario" class="dashboard claro">
		    	<p class="dashprofes_big_p">Búsqueda</p>
		    	<p class="dashprofes_small_p" id="busca">Utiliza este servicio para encontrar alumnos u otros usuarios usando filtros en pocos pasos</p>
		 	</div>

        	<div id="correo" class="dashboard claro">
		    	<p class="dashprofes_big_p">Correo</p>
		    	<p class="dashprofes_small_p" id="redactarMensaje">Cliente de mensajería personalizado para la comunicación con cualquier usuario de esta web</p>
		 	</div>

		 	<div id="infoPersonal" class="dashboard claro">
		    	<p class="dashprofes_big_p">Información Personal</p>
		    	<p class="dashprofes_small_p" id="editarInfo">Actualiza tu información personal para mostrar al mundo tus más recientes aptitudes</p>
		 	</div>

		 	<div id="valoraciones" class="dashboard claro">
		    	<p class="dashprofes_big_p">Valoraciones y Estadisticas</p>
		    	<p class="dashprofes_small_p" id="verValoraciones">Consulta tus valoraciones o las de diferentes grupos y alumnos. ¡Son una parte muy importante de esta web!</p>
		 	</div>

		 	<div id="ranking" class="dashboard claro">
		    	<p class="dashprofes_big_p">Ranking</p>
		    	<p class="dashprofes_small_p" id="verTop">¡Comprueba tu puesto en la clasificación de Profesores y demuestra quien tiene mas Clase!</p>
		 	</div>

		 	<div id="video" class="dashboard claro">
		    	<p class="dashprofes_big_p">Video Tutorial</p>
		    	<p class="dashprofes_small_p">Vídeo ilustrativo para aprender a usar la imponente web de Profesores Con Clase</p>
		 	</div>		

        </div>

        <?php require_once('./php/footer.php'); ?>
    </body>
</html>
