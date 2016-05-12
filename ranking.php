<?php if(!isset($_SESSION)){ 
        session_start(); 
      } ?>

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
        <script type="text/javascript" src="js/jquery.color.js"></script>
		<script type="text/javascript" src="js/ranking.js"></script>
		<script type="text/javascript" src="js/common.js"></script>
    </head>
    
    <body class="ranking_body">

        <?php require_once('./php/header.php'); ?>

        <div id="ranking_principal">

            <div id="ranking_titulo">
               <h1>TOP PROFESORES</h1>
               <h2>¿Podrás llegar a lo más alto? </h2>
            </div>

            <div id="busca_rank">
            <form id="buscador_rank" action="">
                <p id="etq_filter">Filtrar por: </p>
                <select id="filter">
                    <option selected>Nombre del Profesor</option>
                    <option>Asignaturas</option>
                    <option>Mejores Valorados</option>
                </select>
                <input id="search_rank" type="text">
                <input id="submit_rank" type="submit" value="Buscar">
            </form>
            </div>

            <ul id="rank">
    			<li id="profe">
        			<div id="bloque1">
            			<img src="./img/img-not-available.jpg"/>
            		</div>
            		<div id="bloque2">
            			<h1 id="nombre">Berto Carlos Huevos</h1> 
            			<p id="asignatura">Mejor Profesor de Matematicas</p>
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

    </body>
</html>