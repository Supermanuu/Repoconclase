<?php 
    session_start(); 
    if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){
        header('Location: ./index.php');
    }
?>

<html>
    <head>
        <title>Profesores Con Clase</title>
        <meta charset="utf-8"/>
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="Ranking de Profesores"/>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
        <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/ranking.js"></script>
		<script type="text/javascript" src="js/common.js"></script>
    </head>
    
    <?php //pintamos el fondo de la web de diferente color dependiendo del tipo  de usuario
        if ($_SESSION["type"] == "alumno") {  //Alumno
            echo '<body class="ranking_body_green">';
        }
        elseif ($_SESSION["type"] == "profesor") {  //Profesor
            echo '<body class="ranking_body_blue">';
        }
        elseif ($_SESSION["type"] == "administrador") {  //Admin
            echo '<body class="ranking_body_purple">';
        }

        require_once('./php/header.php');
    ?>

        <div id="ranking_principal">

        <?php    
            if ($_SESSION["type"] == "alumno") {  //Alumno
                echo '<div id="ranking_titulo" class="green">';
            }
            elseif ($_SESSION["type"] == "profesor") {  //Profesor
                echo '<div id="ranking_titulo" class="blue">';
            }
            elseif ($_SESSION["type"] == "administrador") {  //Admin
                echo '<div id="ranking_titulo" class="purple">';
            }

            echo '<h1>TOP PROFESORES</h1>';
            echo '<h2>¿Podrás llegar a lo más alto? </h2>';
            echo '</div>';
        ?>  
            
        <?php 
            if ($_SESSION["type"] == "alumno") {  //Alumno
                echo '<div id="busca_rank" class="green">';
                echo '<form id="buscador_rank" action="" class="green">';
            }
            elseif ($_SESSION["type"] == "profesor") {  //Profesor
                echo '<div id="busca_rank" class="blue">';
                echo '<form id="buscador_rank" action="" class="blue">';
            }
            elseif ($_SESSION["type"] == "administrador") {  //Admin
                echo '<div id="busca_rank" class="purple">';
                echo '<form id="buscador_rank" action="" class="purple">';
            }   
        ?>
                <p id="etq_filter">Filtrar por: </p>
                <select id="filter">
                    <option selected>Nombre del Profesor</option>
                    <option>Asignaturas</option>
                    <option>Mejores Valorados</option>
                </select>
                <input id="search_rank" type="text">
                
                <?php 
                    if ($_SESSION["type"] == "alumno") {  //Alumno
                        echo '<input id="submit_rank" class="green" type="submit" value="Buscar">';
                    }
                    elseif ($_SESSION["type"] == "profesor") {  //Profesor
                        echo '<input id="submit_rank" class="blue" type="submit" value="Buscar">';
                    }
                    elseif ($_SESSION["type"] == "administrador") {  //Admin
                        echo '<input id="submit_rank" class="purple" type="submit" value="Buscar">';
                    }   

                    echo '</form>';  
                    echo '</div>'; 
                ?> 



            <ul id="rank">
    			<li id="profe">
        			<div id="bloque1">
            			<img src="./img/img-not-available.jpg"/>
            		</div>
            		<div id="bloque2">
            			<h1 id="nombre">Berto Carlos Huevos</h1> 
            			<p id="asignatura">Mejor Profesor de Fisica</p>
                        <br>
            			<p id="valorar">Valorar: 
            				<div class="rating">
                					<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
            				</div>
            			</p>
            		</div>
            	</li>

    			<li id="profe"> 
            		<div id="bloque1">
            			<img src="./img/img-not-available.jpg"/>
            		</div>
            		<div id="bloque2">
            			<h1 id="nombre">Alba Ñoguarra</h1>
            			<p id="asignatura">Mejor Profesor de Lengua</p>
            			<p id="valorar">Valorar: 
            				<div class="rating">
                					<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
            				</div>
            			</p>
            		</div>
    			</li>

    			<li id="profe">
            		<div id="bloque1">
            			<img src="./img/img-not-available.jpg"/>
            		</div>
            		<div id="bloque2">
            			<h1 id="nombre">Antonio Suelta Melo</h1>
            			<p id="asignatura">Mejor Profesor de Deporte</p>
            			<p id="valorar">Valorar: 
            				<div class="rating">
                					<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
            				</div>
            			</p>
            		</div>
    			</li>

    			<li id="profe">
            		<div id="bloque1">
            			<img src="./img/img-not-available.jpg"/>
            		</div>
            		<div id="bloque2">
            			<h1 id="nombre">Chema Pamundi</h1>
            			<p id="asignatura">Mejor Profesor de Historia</p>
            			<p id="valorar">Valorar: 
            				<div class="rating">
                					<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
            				</div>
            			</p>
            		</div>
    			</li>

    			<li id="profe">
            		<div id="bloque1">
            			<img src="./img/img-not-available.jpg"/>
            		</div>
            		<div id="bloque2">
            			<h1 id="nombre">Consuelo Alatriste</h1>
            			<p id="asignatura">Mejor Profesor de Filosofia</p>
            			<p id="valorar">Valorar: 
            				<div class="rating">
                					<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
            				</div>
            			</p>
            		</div>
            	</li>

    			<li id="profe"> 
            		<div id="bloque1">
            			<img src="./img/img-not-available.jpg"/>
            		</div>
            		<div id="bloque2">
            			<h1 id="nombre">Andres Trozado</h1>
            			<p id="asignatura">Mejor Profesor de Economia</p>
            			<p id="valorar">Valorar: 
            				<div class="rating">
                					<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
            				</div>
            			</p>
            		</div>
    			</li>

    			<li id="profe">
            		<div id="bloque1">
            			<img src="./img/img-not-available.jpg"/>
            		</div>
            		<div id="bloque2">
            			<h1 id="nombre">Ricardo Borriquero</h1>
            			<p id="asignatura">Mejor Profesor de Tecnologia</p>
            			<p id="valorar">Valorar: 
            				<div class="rating">
                					<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
            				</div>
            			</p>
            		</div>
            	</li>
    		</ul>
        </div> <!-- PRINCIPAL -->

        <?php require_once('./php/footer.php'); ?>

    <?php echo '</body>'; ?>
</html>
