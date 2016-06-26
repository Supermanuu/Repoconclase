<?php 
   include './php/sesion.php';
   include "php/getProfesorInfo.php";
?>

<html>
    <head>
        <title>Profesores Con Clase</title>
        <meta charset="utf-8"/>
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="Dashboard profesores"/>
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

        <!-- _________ PRINCIPAL CON LA INFO DEL PROFESOR _________-->
        <div class="dashprofes_principal" id="principal">
        	<div id="tuInfo" class="dashboard oscuro" title="<?php echo $_SESSION["nombre"]; ?>">       
		    	<p class="dashprofes_big_p"> <?php echo $_SESSION["nombre"]; ?> <span class="glyphicon glyphicon-info-sign" ></span> </p>
		    	<p class="dashprofes_small_p dashprofes_info">Proximos Eventos: </p>
          <?php 
            $infoClases = $_SESSION ["infoclases"];
            if($_SESSION ["nclases"] == 0){ //no hay clases para el profesor, imprimimos mensaje por defecto emitido por el php
              echo '<p class="dashprofes_small_p dashprofes_info" id="tusEventos">'; 
              echo $infoClases[0];  
              echo '</p>';
            }
            else{ //hay alguna clase
              
              if($_SESSION ["infonclases"] > 4)
                $nc = 4;
              else  
                $nc = $_SESSION ["infonclases"];

               //lista oculta que contendra los prox eventos del profesor y nos servira para imprimir su primer elem en el parrafo de abajo
              $k = 0;
              echo '<div id="slider">'; //-------------------generamos el slider
              echo '<ul>';
              while ($k < $nc)
              {   
                echo '<li>';
                echo '<p id="tusEventos" class="dashprofes_small_p dashprofes_info">';
                echo $infoClases[$k] . "  " . $datosClases[$k];   
                echo '</p>';
                echo '</li>';
                $k++;
              } 
              echo '</ul>';
              echo '</div>';
            }                           //-------------------slider 
          ?>
            

          </div>

      <!-- _________ CORREO _________-->
      <div id="correo" class="dashboard claro">
          <p class="dashprofes_big_p">Correo <span class="glyphicon glyphicon-envelope"></span> </p>
          <?php 
            
            if($_SESSION ["ncorreos"] == 0){ //no hay mensajes nuevos sin leer
              echo '<p class="dashprofes_small_p" id="nuevosMensajes">Ningun mensaje nuevo</p>';
            }
            else{ //hay algun mensaje sin leer

              $nmen = $_SESSION ["ncorreos"];
              echo '<p class="dashprofes_small_p dashprofes_info">Nuevos correos: ' . $nmen . ' </p>';

              if($nmen > 4){
                $nmen = 3; //mostramos maximo 3 mensajes
              }

              $m = 0;
              echo '<ul id="listaCorreo">';
              while ($m < $nmen)
              {  
                echo '<li>';
                echo '<p class="dashprofes_small_p " id="nuevosMensajes">';
                echo $correo_nuevo_asunto[$m] . "    ----    " . $correo_nuevo_fecha[$m];   
                echo '</p>';
                echo '</li>';
                $m++;
              }
              echo '</ul>';
            } 
          ?>
      </div>

      <!-- _________ BUSQUEDA _________-->
      <div id="busqueda" class="dashboard claro">
          <p class="dashprofes_big_p">Búsqueda <span class="glyphicon glyphicon-search"></span> </p>
          <p class="dashprofes_small_p" id="busca">Enlace al buscador de la web</p>
      </div>

      <!-- _________ TUS CLASES _________-->
      <div id="misClases" class="dashboard claro">
		    	<p class="dashprofes_big_p">Mis Clases <span class="glyphicon glyphicon-education"> </p>	
          <?php 
            $clases = $_SESSION ["clases"];

            if($_SESSION ["nclases"] == 0){
              echo '<p class="dashprofes_small_p">' . $clases[0] . '</p>';
            }
            else{
              $numcls = $_SESSION ["nclases"]; 
              if($numcls > 4){
                $numcls = 4;
              }

              echo '<p class="dashprofes_small_p dashprofes_info">Clases actuales: ' . $_SESSION ["nclases"] . ' </p>';
              $j = 0;
              while($j < $numcls){
                echo '<p id="tusEventos" class="dashprofes_small_p dashprofes_info"> ' . $clases[$j] . ' </p>';
                $j++;
              }
            }
          ?>   
          </p>
		 	</div>

      <!-- _________ TUS CURSOS _________-->
		 	<div id="misCursos" class="dashboard claro">
		    	<p class="dashprofes_big_p">Mis Cursos <span class="glyphicon glyphicon-list-alt"> </p>
          <?php 
            $cursos = $_SESSION ["cursos"];

            if($_SESSION ["ncursos"] == 0){
              echo '<p class="dashprofes_small_p">' . $cursos[0] . '</p>';
            }
            else{
              $numcurs = $_SESSION ["ncursos"]; 
              if($numcurs > 4){
                $numcurs = 4;
              }

              echo '<p class="dashprofes_small_p dashprofes_info">Cursos actuales: ' . $_SESSION ["ncursos"] . ' </p>';
              $k = 0;
              while($k < $numcurs){
                echo '<p id="tusEventos" class="dashprofes_small_p dashprofes_info"> ' . $cursos[$j] . ' </p>';
                $k++;
              }
            }
          ?> 
		 	</div>

      <!-- _________ MIS ALUMNOS _________-->
		 	<div id="misAlumnos" class="dashboard claro">
          <p class="dashprofes_big_p">Mis Alumnos <span class="glyphicon glyphicon-user" > </p>
          <?php 

            $alums = $_SESSION ["alumnos"];
            if($_SESSION ["nalumnos"] == 0){
              echo '<p class="dashprofes_small_p">' . $alums[0] . '</p>';
            }
            else{
              echo '<p class="dashprofes_small_p dashprofes_info">Alumnos actuales: ' . $_SESSION ["nalumnos"] . ' </p>';
            }
          ?>
          <p class="dashprofes_small_p">Una forma rapida de gestionar tus alumnos</p>
      </div>

      <!-- _________ VALORACIONES Y ESTADISTICAS _________-->
		 	<div id="valoraciones" class="dashboard claro">
		    	<p class="dashprofes_big_p">Valoraciones y Estadisticas <span class="glyphicon glyphicon-check"> </p>
		    	<p class="dashprofes_small_p" id="verValoraciones">Consulta tus valoraciones. ¡Son una parte muy importante de esta web!</p>
		 	</div>

      <!-- _________ RANKING _________-->
		 	<div id="ranking" class="dashboard claro">
		    	<p class="dashprofes_big_p">Ranking <span class="glyphicon glyphicon-star-empty"> </p>
          <?php 
            echo '<p class="dashprofes_small_p dashprofes_info">Tu valoracion total actual es: ' . $_SESSION ["valoracion"] . ' </p>';
          ?>
		    	<p class="dashprofes_small_p" id="verTop">¡Comprueba tu puesto en nuestra clasificación!</p>
		 	</div>

      <!-- _________ MODIFICAR INFORMACION _________-->
		 	<div id="infoPersonal" class="dashboard claro">
          <p class="dashprofes_big_p">Modificar Información <span class="glyphicon glyphicon-cog"> </p>
          <p class="dashprofes_small_p" id="editarInfo">Actualiza tu información personal</p>
      </div>

        </div>

        <?php require_once('./php/footer.php'); ?>
    </body>
</html>
