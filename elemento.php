<?php
   session_start ();
   
   $titulo = $_REQUEST ["titulo"];
   $contenido = $_REQUEST ["contenido"];
   $id = $_REQUEST ["id"];
   //$precio = $_REQUEST ["precio"];
?>
   
<div id="elemento_principal">

<!-- Id de lo que solicita -->
<div id="id_oculto" class="elemento_oculto"> <?php echo $id; ?> </div>
   <!-- Elemento que se muestra -->
   <div id="elemento_elemento">
   
      <div id="elemento_titulo">
         <p>
            <?php echo $titulo; ?>
         </p>
      </div>
      
      <div id="elemento_contenido">
         <!-- Un <p> por cada salto de línea -->
         <?php echo $contenido; ?>
      </div>
      
      <div id="elemento_precio">
         <p>
            <?php //echo $precio; ?> 100.4€
         </p>
      </div>
      
   </div>
   
   <!-- Botones -->
   <div id="elemento_botones">
      <button id="elemento_volver">Volver</button>
      <button id="elemento_aceptar">Aceptar</button>
   </div>
   
</div>