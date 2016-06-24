<?php
   session_start ();
   
   //$titulo = $_REQUEST ["titulo"];
   //$contenido = $_REQUEST ["contenido"];
   //$precio = $_REQUEST ["precio"];
   //$imagen = $_REQUEST ["imagen"];
?>

<html>
	<head>
      <title>Profesores con clase</title>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
      <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="css/reset.css"/>
      <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
      <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="js/common.js"></script>
      <script src="js/contrata.js"></script>
	</head>
	<body id="elemento_body">
   
      <?php include './php/header.php'; ?>
      
      <div id="elemento_principal">
      
         <!-- Elemento que se muestra -->
         <div id="elemento_elemento">
         
            <div id="elemento_titulo">
               <p>
                  <?php //echo $titulo; ?>
                  Clase increiblemente interesante
               </p>
            </div>
            
            <div id="elemento_contenido">
               <p>
                  <?php //echo $contenido; ?>
                  Contenido de la clase tambien muy interesante. Contenido de la clase tambien muy interesante. Contenido de la clase tambien muy interesante. Contenido de la clase tambien muy interesante. 
               </p>
               <p>
                  Contenido de la clase tambien muy interesante. 
               </p>
               <p>
                  Contenido de la clase tambien muy interesante. Contenido de la clase tambien muy interesante. Contenido de la clase tambien muy interesante. 
               </p>
               <p>
                  Contenido de la clase tambien muy interesante. 
               </p>
               <p>
                  Contenido de la clase tambien muy interesante. Contenido de la clase tambien muy interesante. 
               </p>
               <p>
                  Contenido de la clase tambien muy interesante. Contenido de la clase tambien muy interesante. Contenido de la clase tambien muy interesante. 
               </p>
            </div>
            
            <div id="elemento_precio">
               <p>
                  <?php //echo $precio; ?>
                  1000.4 €
               </p>
            </div>
            
            <div id="elemento_imagen" class="elemento_imagen">
               <?php //echo $imagen; ?>
            </div>
            
         </div>
         
         <!-- Botones -->
         <div id="elemento_botones">
            <button id="elemento_volver">Volver</button>
            <button id="elemento_contratar">Contratar</button>
         </div>
         
      </div>
      
      <?php include './php/footer.php'; ?>
      
	</body>
</html>