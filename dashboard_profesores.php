<?php 
   session_start ();
   include "php/getProfesorInfo.php";
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
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
        <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/common.js"></script>
        <script src="js/dashboard_profesores.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    
    <body class="dashprofes_body">

        <?php 
          $_SESSION["volverIndex"] = 0;
          require_once('./php/header.php'); 
        ?>

        <div class="dashprofes_principal" id="principal">

        	<div id="tuInfo" class="dashboard oscuro" title="<?php echo $_SESSION["nombre"]; ?>">
          
		    	<p class="dashprofes_big_p"> <?php echo $_SESSION["nombre"]; ?> <span class="glyphicon glyphicon-user" ></span> </p>
		    	<p class="dashprofes_small_p dashprofes_info">Proximos Eventos: </p>
          <?php 
           
            if($_SESSION ["nclases"] == 0){ //no hay clases para el profesor, imprimimos mensaje por defecto emitido por el php
              echo '<p class="dashprofes_small_p dashprofes_info" id="tusEventos">'; 
              echo $clases[0];  
              echo '</p>';
            }
            else{ //hay alguna clase
              
              if($_SESSION ["nclases"] > 4)
                $nc = 4;
              else  
                $nc = $_SESSION ["nclases"];

               //lista oculta que contendra los prox eventos del profesor y nos servira para imprimir su primer elem en el parrafo de abajo
              $k = 0;
              echo '<ul id="listaOculta">';
              while ($k < $nc)
              {  
                echo '<li>';
                echo $clases[$k] . "  " . $datosClases[$k];   
                echo '</li>';
                $k++;
              } 
              echo '</ul>';

              echo '<div id="slider">'; //-------------------generamos el slider
              //parrafo vacio sobre el que mostrar el primer evento de la lista
              echo '<p class="dashprofes_small_p dashprofes_info" id="tusEventos"> </p>'; 
              //flechitas para pasar el slider
              echo '<div id="btn-prev" class="btn-prev"> &#60; </div>';
              echo '<div id="btn-next" class="btn-next"> &#62; </div>';
              echo '</div>';
            }                           //-------------------slider
          ?>
          </div>

        	<div id="tusClases" class="dashboard claro">
		    	<p class="dashprofes_big_p">Tus Clases <span class="glyphicon glyphicon-education"> </p>
		    	<p class="dashprofes_small_p" id="gestionaAlumnos">Aqui encontrarás todo lo que necesitas para gestionar tus clases particulares con otros alumnos</p>
		 	</div>

		 	<div id="tusCursos" class="dashboard claro">
		    	<p class="dashprofes_big_p">Tus Cursos <span class="glyphicon glyphicon-list-alt"></p>
		    	<p class="dashprofes_small_p" id="gestionaGrupos">Este es el espacio podrás admnistrar todo lo relacionado con tus clases a un grupo de alumnos</p>
		 	</div>

		 	<div id="busqueda" class="dashboard claro">
		    	<p class="dashprofes_big_p">Búsqueda <span class="glyphicon glyphicon-search"></span> </p>
		    	<p class="dashprofes_small_p" id="busca">Utiliza este servicio para encontrar alumnos u otros usuarios usando filtros en pocos pasos</p>
		 	</div>

      <div id="correo" class="dashboard claro">
		    	<p class="dashprofes_big_p">Correo <span class="glyphicon glyphicon-envelope"></span> </p>
          <?php 
            
            if($_SESSION ["ncorreos"] == 0){ //no hay mensajes nuevos sin leer
              echo '<p class="dashprofes_small_p" id="nuevosMensajes">Ningun mensaje nuevo</p>';
            }
            else{ //hay algun mensaje sin leer

              echo '<p class="dashprofes_small_p dashprofes_info">Nuevos correos: ' . $_SESSION ["ncorreos"] . ' </p>';
              if($_SESSION ["ncorreos"] > 4){
                $nmen = 3; //mostramos maximo 3 mensajes
              }
              else {
                $nmen = $_SESSION ["ncorreos"];
              }

              $m = 0;
              echo '<ul id="listaCorreo">';
              while ($m < $nmen)
              {  
                echo '<li>';
                echo '<p class="dashprofes_small_p " id="nuevosMensajes">';
                echo $correo_nuevo[$k];   
                echo '</p>';
                echo '</li>';
                $m++;
              }
              echo '</ul>';
            } 
          ?>
		 	</div>

		 	<div id="infoPersonal" class="dashboard claro">
		    	<p class="dashprofes_big_p">Modificar Información <span class="glyphicon glyphicon-cog"> </p>
		    	<p class="dashprofes_small_p" id="editarInfo">Actualiza tu información personal para mostrar al mundo tus más recientes aptitudes</p>
		 	</div>

		 	<div id="valoraciones" class="dashboard claro">
		    	<p class="dashprofes_big_p">Valoraciones y Estadisticas <span class="glyphicon glyphicon-check"> </p>
		    	<p class="dashprofes_small_p" id="verValoraciones">Consulta tus valoraciones o las de diferentes grupos y alumnos. ¡Son una parte muy importante de esta web!</p>
		 	</div>

		 	<div id="ranking" class="dashboard claro">
		    	<p class="dashprofes_big_p">Ranking <span class="glyphicon glyphicon-star-empty"> </p>
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
