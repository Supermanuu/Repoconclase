<?php 
    session_start(); 
    if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){
        header('Location: ./index.php');
    }
?>

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
    </head>
    <body id="stats_body">
        <?php 
            $_SESSION["volverIndex"] = 1;
            require_once('./php/header.php');
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
                    <img src="img/graficaStats.png" height="190" />
                    <img src="img/graficaStats2.png" height="190" />
                </div>
                <div id="valoracion_reciente">
                    <div class="rating2">
                        <p id="rating2">Valoración: </p><span>☆</span><span>☆</span><span>☆</span>☆☆
                    </div>
                    <p>Buen profesor, va al grano, y logré aprobar gracias a él.</br></br>
                    <div class="rating2">
                        <p id="rating2">Valoración: </p><span>☆</span><span>☆</span><span>☆</span><span>☆</span>☆
                    </div>
                    <p>Métodos didácticos eficientes, muy recomendable para cualquiera que necesite un aprobado urgente e incluso lograr buenas notas.</br></br>
                    <div class="rating2">
                        <p id="rating2">Valoración: </p><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                    </div>
                    <p>Perfecto, explica con mucha claridad, sabe y ayuda a saber. ¡5 sobre 5!</br></br>
                    </p>
                </div>
            </div>
        </div>

        <?php require_once('./php/footer.php'); ?>
        
    </body>
</html>
