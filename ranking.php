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
		<script src="js/ranking.js"></script>
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
                <select id="select_filter">
                    <option value="asignaturas" selected>Asignaturas</option>
                    <option value="total">Valoracion Total</option>



                </select>
                
        <?php //COLOREAMOS EL BOTON DE BUSCAR DEPENDIENDO EL COLOR DEL USUARIO
            echo '</form>';  
            echo '</div>'; 
        ?> 

            <!-- ________________ DATOS DE LOS PROFESORES ________________ -->

            <div id="rank">
                <?php 
                    include "php/ranking_info.php"; 
                ?>
            </div>

        <?php require_once('./php/footer.php'); ?>

    </body>
</html>
