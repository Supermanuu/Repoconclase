<?php if(!isset($_SESSION)){ 
		session_start(); 
	  } 

	  //si no has iniciado sesion y accedes desde la url te tira al index
	  if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){
	  	header('Location: ./index.php');
	  }

	  /*si no has iniciado sesion como tipo de usuario profesor te tira a 
	  	tu pagina de inicio dependiendo de tu tipo o al  index */
	  if (!isset($_SESSION["type"]) || $_SESSION["type"] != "pr"){
	  	if ($_SESSION["type"] == "al")
	  		header('Location: ./index_alumnos.html');
	  	elseif ($_SESSION["type"] == "ad")
	  		header('Location: ./administrador.html');
	  	else 
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
		    	<p class="dashprofes_small_p">Proximos Eventos: </p>
		    	<p class="dashprofes_small_p" id="tusEventos"> Quimica - Grupo 2 : 18:00 </p>

		    	<p class="dashprofes_small_p"><br></p>
		 	</div>

        	<div id="tusAlumnos" class="dashboard claro">
		    	<p class="dashprofes_big_p">Tus Alumnos</p>
		    	<p class="dashprofes_small_p" id="gestionaAlumnos">Gestionar Alumnos</p>
		    	<p class="dashprofes_small_p" id="listaCursos">Lista de Cursos</p>
		    	<p class="dashprofes_small_p" id="nuevoCurso">Crear Nuevo Curso</p>
		 	</div>

		 	<div id="tusGrupos" class="dashboard claro">
		    	<p class="dashprofes_big_p">Tus Grupos</p>
		    	<p class="dashprofes_small_p" id="gestionaGrupos">Gestionar Grupos</p>
		    	<p class="dashprofes_small_p" id="nuevoGrupo">Crear Nuevo Grupo</p>
		    	<p class="dashprofes_small_p"><br></p>
		 	</div>

		 	<div id="buscaUsuario" class="dashboard claro">
		    	<p class="dashprofes_big_p">Búsqueda</p>
		    	<p class="dashprofes_small_p" id="busca">Buscar Alumnos</p>
		    	<p class="dashprofes_small_p" id="busca">Buscar Grupos</p>
		    	<p class="dashprofes_small_p"><br></p>
		 	</div>

        	<div id="correo" class="dashboard claro">
		    	<p class="dashprofes_big_p">Correo</p>
		    	<p class="dashprofes_small_p" id="redactarMensaje">Nuevo Mensaje</p>
		    	<p class="dashprofes_small_p" id="entradaMensajes">Bandeja de Entrada</p>
		    	<p class="dashprofes_small_p"><br></p>
		 	</div>

		 	<div id="infoPersonal" class="dashboard claro">
		    	<p class="dashprofes_big_p">Información Personal</p>
		    	<p class="dashprofes_small_p" id="editarInfo">Editar información</p>
		    	<p class="dashprofes_small_p"><br></p>
		    	<p class="dashprofes_small_p"><br></p>
		 	</div>

		 	<div id="valoraciones" class="dashboard claro">
		    	<p class="dashprofes_big_p">Valoraciones y Estadisticas</p>
		    	<p class="dashprofes_small_p" id="verValoraciones">Ver valoraciones</p>
		    	<p class="dashprofes_small_p" id="estadsAlumnos">Estadísticas de Alumnos</p>
		    	<p class="dashprofes_small_p" id="estadsGrupos">Estadísticas de Grupos</p>
		 	</div>

		 	<div id="ranking" class="dashboard claro">
		    	<p class="dashprofes_big_p">Ranking</p>
		    	<p class="dashprofes_small_p" id="verTop">Ver Top 10</p>
		    	<p class="dashprofes_small_p">¿Cómo mejorar tu rank?</p>
		    	<p class="dashprofes_small_p"><br></p>
		 	</div>

		 	<div id="video" class="dashboard claro">
		    	<p class="dashprofes_big_p">Video Tutorial</p>
		    	<p class="dashprofes_small_p"><br></p>
		    	<p class="dashprofes_small_p"><br></p>
		    	<p class="dashprofes_small_p"><br></p>
		 	</div>		

        </div>

        <?php require_once('./php/footer.php'); ?>
    </body>
</html>