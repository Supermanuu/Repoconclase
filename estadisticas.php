<?php if(!isset($_SESSION)){ 
        session_start(); 
      } ?>
<?php  require_once 'php/rateajax.php'; ?>

<html>
    <head id="Hola">
        <title>Profesores Con Clase</title>
        <meta charset="utf-8"/>
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="estadisticas_profesor"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
        <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/common.js"></script>
        <script src="js/rate.js"></script>
    </head>
    <body id="stats_body">

        <?php require_once('./php/header.php'); ?>

        <?php
	        if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){ //Sesion no iniciada
	            $color = "blue";
	        }elseif ($_SESSION["type"] == "alumno") {  //Alumno
				$color = "green";
	        }elseif ($_SESSION["type"] == "profesor") {  //Profesor
	            $color = "blue";
	        }elseif ($_SESSION["type"] == "administrador") {  //Admin
	            $color = "purple";
	        }
	    ?>

        <div id="stats_main">
            <div id="stats_sts">
                <div id="stats_opts">
                  <select class="blue" name="Tipo">
                      <option value="alumnos">Alumnos</option>
                      <option value="grupos">Grupos</option>
                   </select>
                </div>
                <div id="stats_perfiles">
                    <p>Alberto Carlos Huevos</p><hr class="perfil_ind">
                    <p>Lola Mento Mucho</p><hr class="perfil_ind">
                    <p>Carmelo Cotón Fresco</p><hr class="perfil_ind">
                    <p>Borja Món Serrano</p><hr class="perfil_ind">
                    <p>Alberto Mate Rojo</p><hr class="perfil_ind">
                </div>
            </div>
            <div id="stats_cuadro">
                <div id="stats_datos">
                    <div id="stats_pic">
                        <img src="img/profeStats.jpg" width="100" height="100" />
                    </div>
                    <div id="stats_info">
                        <p></br>Profesor: Francisco Rupto</br></br>
                        Asignatura: Ciencias Políticas</p>
                    </div>
                    
                </div>
                <div id="valoracion_global">
                    <p>Valorar:</p><br>
                    <div class="rate-cnt">
                        <div id="1" class="rate-btn-1 rate-btn"></div>
                        <div id="2" class="rate-btn-2 rate-btn"></div>
                        <div id="3" class="rate-btn-3 rate-btn"></div>
                        <div id="4" class="rate-btn-4 rate-btn"></div>
                        <div id="5" class="rate-btn-5 rate-btn"></div>
                    </div>
                    <div id=rate_comentario>
                        <br>
                        <textarea class="blue" id=text_chk name="Mensaje" rows="8" cols="30" maxlength="150" placeholder="Escriba aquí su valoración sobre el profesor (max 200 caracteres)." required></textarea>
                        <br><br>
                        <input id="rate_enviar" type="submit" value="Enviar valoración"/>
                    </div>
                </div>
                <div id="valoracion_reciente">

                    <p>Valoración:</p>
                    <div class="rate-result-cnt">
                        <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
                        <div class="rate-stars"></div>
                    </div>
                    <p>ID_ALUM: Buen profesor, va al grano, y logré aprobar gracias a él.</p></br></br>

                    <p>Valoración:</p>
                    <div class="rate-result-cnt">
                        <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
                        <div class="rate-stars"></div>
                    </div>
                    <p>ID_ALUM: Métodos didácticos eficientes, muy recomendable para cualquiera que necesite un aprobado urgente e incluso lograr buenas notas.</p></br></br>

                    <p>Valoración:</p>
                    <div class="rate-result-cnt">
                        <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
                        <div class="rate-stars"></div>
                    </div>
                    <p>ID_ALUM: Perfecto, explica con mucha claridad, sabe y ayuda a saber. ¡5 sobre 5!</p></br></br>
                    </p>
                    

                </div>
            </div>
        </div>

        <?php require_once('./php/footer.php'); ?>
        
        
    </body>
</html>

