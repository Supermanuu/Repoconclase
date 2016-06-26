<?php
   include './php/sesion.php';
   include './php/preparaLista.php';
   
   function print_item ($nitem, $titulo, $descripcion, $id, $precio)
   {
      echo '<div id="vista_lista_elemento_' . $nitem . '" name="vista_lista_elemento[]" class="vista_lista_elemento pulsable">';
         echo '<div id="vista_lista_imagen_elemento_' . $nitem . '" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento pulsable"></div>';
         echo '<div class="vista_lista_contenido_elemento">';
            echo '<div id="vista_lista_titulo_elemento_' . $nitem . '" class="vista_lista_titulo_elemento pulsable">';
               echo $titulo;
            echo '</div>';
            echo '<div id="vista_lista_descripcion_elemento_' . $nitem . '" class="vista_lista_descripcion_elemento pulsable">';
               echo substr ($descripcion, 0, 60) . "...";
            echo '</div>';
         echo '</div>';
         echo '<div id="vista_lista_aceptar_elemento_' . $nitem . '" name="vista_lista_aceptar_elemento[]" class="vista_lista_aceptar_elemento pulsable"></div>';
         echo '<div id="vista_lista_borrar_elemento_' . $nitem . '" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo pulsable"></div>';
         echo '<div id="vista_lista_descripcion_oculto_' . $nitem . '" class="vista_lista_elemento_oculto">';
            echo nl2br ($descripcion);
         echo '</div>';
         echo '<div id="vista_lista_id_oculto_' . $nitem . '" class="vista_lista_elemento_oculto">';
            echo $id;
         echo '</div>';
         echo '<div id="vista_lista_precio_oculto' . $nitem . '" class="vista_lista_elemento_oculto">';
            echo $precio;
         echo '</div>';
      echo '</div>';
   }
?>

<html lang="es-ES">
	<head>
		<title>Profesores con clase</title>
		<meta charset="utf-8"/>
      <meta name="author" content="Sistemas web 15/16">
      <meta name="description" content="Muestra listas de cosas">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
      <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/estructura.css"/>
      <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
      <script src="js/common.js"></script>
      <script src="js/vista_lista.js"></script>
	</head>
	<body id="vista_lista_body">
		<?php
         $_SESSION["volverIndex"] = 1;
         include './php/header.php'; 
      ?>
		<div id="vista_lista_principal">
         <div id="vista_lista_presentacion">
            Mis Cursos
         </div>
         <div id="vista_lista_detalle">
            <div id="vista_lista_container_lista">
               <div id="vista_lista_acciones">
                  <button id="vista_lista_nuevo" class="pulsable">Nuevo</button>
                  <button id="vista_lista_editar" class="pulsable">Editar</button>
                  <button id="vista_lista_borrar_seleccionados" class="pulsable">Borrar</button>
               </div>
               <div id="vista_lista_buscador">
                  <input id="vista_lista_search" type="text" placeholder="Búsqueda por asignatura">
                  <button id="vista_lista_submit">Buscar</button>
               </div>
               <div id="vista_lista_lista">
                  <?php 
                     $i = 0;
                     $elementos_nulos = 0;
                     while ($i < $nelems)
                     {
                        if ($ids [$i] != null)
                           print_item ($i, $lista [$i], $descr [$i], $ids [$i], $precios [$i]);
                        else
                           $elementos_nulos++;
                        $i++;
                     }
                  ?>
               </div>
            </div>
            <div id="vista_lista_vista">
               <div id="vista_lista_titulo">
                  <?php
                     if ($nelems == 0 || $elementos_nulos == $nelems)
                        echo 'Ningún elemento';
                     else
                        echo 'Ningún elemento seleccionado';
                  ?>
               </div>
               <div id="vista_lista_contenido">
               </div>
               <div id="vista_lista_imagen" class="vista_lista_imagen"></div>
            </div>
         </div>
		</div>
		<?php include './php/footer.php'; ?>
	</body>
</html>