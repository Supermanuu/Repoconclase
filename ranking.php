<?php 
    include './php/sesion.php';
    include "php/ranking_info.php";
?>

<html>
    <head>
        <title>Profesores Con Clase</title>
        <meta charset="utf-8"/>
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="Ranking de Profesores"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
        <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/common.js"></script>
    </head>
    
    <body class="ranking_body">
    <?php
		$_SESSION["volverIndex"] = 1;
        require_once('./php/header.php');
    ?>

        <div id="ranking_principal">
        <?php //COLOREAMOS LA BARRA DEL TITULO DEPENDIENDO EL COLOR DEL USUARIO   
            if ($_SESSION["type"] == "alumno") {  //Alumno
                $color = "green";
            }
            elseif ($_SESSION["type"] == "profesor") {  //Profesor
                $color = "blue";
            }
            elseif ($_SESSION["type"] == "administrador") {  //Admin
                $color = "purple";
            }
        ?>
        <!-- ________________ CABECERA DEL RANKING ________________ -->

        <?php //COLOREAMOS LA BARRA DEL TITULO DEPENDIENDO EL COLOR DEL USUARIO   
             echo '<div id="ranking_titulo" class="'.$color.'">';
        ?>  
            <h1>TOP PROFESORES</h1>
            <h2>¿Podrás llegar a lo más alto? </h2>
        </div>
            
        <!-- ________________ BARRA DE BUSCADOR ________________ -->

        <?php //COLOREAMOS LA BARRA DE BUSQUEDA DEPENDIENDO EL COLOR DEL USUARIO
            echo '<div id="busca_rank" class="'.$color.'">';
            echo '<form id="buscador_rank" action="" class="'.$color.'">';  
        ?>
                <p id="etq_filter">Filtrar por: </p>
                <select id="filter">
                    <option selected>Nombre del Profesor</option>
                    <option>Asignaturas</option>
                    <option>Mejores Valorados</option>
                </select>
                <input id="search_rank" type="text">
                
        <?php //COLOREAMOS EL BOTON DE BUSCAR DEPENDIENDO EL COLOR DEL USUARIO
            echo '<input id="submit_rank" class="'.$color.'" type="submit" value="Buscar">'; 
            echo '</form>';  
            echo '</div>'; 
        ?> 

            <!-- ________________ DATOS DE LOS PROFESORES ________________ -->

            <div id="rank">
                <?php 
                    $nrslt = $_SESSION ["numresultrank"];
                    $k = 0;

                    while ($k < $nrslt)
                    { 
                        echo '<li id="profe">';

                        echo '<div id="bloque1">';
                            load_content($idprofesores[$k], $color);
                        echo '</div>';

                        echo '<div id="bloque2">';
                        echo '<h1 id="nombre"> ' . $nombresprofes[$k] .' </h1>';
                        echo '<p id="asignatura">' . $profesxAsignaturas[$k] . '</p> <br>';
                        echo '<p id="valorar">Valorar: ' . $valoracionxasig[$k] . '
                                <div class="rating">
                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                </div>
                              </p>';
                        echo '</div>'; //bloque2   

                        echo '</li>'; //profe 
                        $k++;
                    } 
                ?>
            </div>

        <?php require_once('./php/footer.php'); ?>

    </body>
</html>
