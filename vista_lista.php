﻿<html>
	<head>
		<title>Profesores con clase</title>
		<meta charset="utf-8"/>
      <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/estructura.css"/>
      <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="js/common.js"></script>
      <script src="js/vista_lista.js"></script>
	</head>
	<body id="vista_lista_body">
		<header>
         <button id="logout">Logout</button>
      </header>
		<div id="vista_lista_principal">
         <div id="vista_lista_presentacion">
            Mis Grupos
         </div>
         <div id="vista_lista_detalle">
            <div id="vista_lista_container_lista">
               <div id="vista_lista_acciones">
                  <button id="vista_lista_nuevo">Nuevo</button>
                  <button id="vista_lista_editar">Editar</button>
                  <button id="vista_lista_borrar_seleccionados">Borrar</button>
               </div>
               <form id="vista_lista_buscador" action="">
                  <input id="vista_lista_search" type="text" placeholder="Búsqueda por asignatura">
                  <input id="vista_lista_submit" type="submit" value="Buscar">
               </form>
               <div id="vista_lista_lista">
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_1" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_1" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_1" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_1" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_2" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_2" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_2" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_2" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_3" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_3" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_3" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_3" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_4" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_4" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_4" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_4" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_5" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_5" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_5" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_5" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_6" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_6" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_6" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_6" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_7" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_7" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_7" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_7" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_8" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_8" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_8" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_8" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_9" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_9" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_9" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_9" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_10" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_10" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_10" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_10" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_11" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_11" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_11" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_11" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_12" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_12" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_12" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_12" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_13" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_13" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_13" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_13" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
                  <div name="vista_lista_elemento[]" class="vista_lista_elemento">
                     <div id="vista_lista_imagen_elemento_14" name="vista_lista_imagen_elemento[]" class="vista_lista_imagen_elemento"></div>
                     <div class="vista_lista_contenido_elemento">
                        <div id="vista_lista_titulo_elemento_14" class="vista_lista_titulo_elemento">
                           Eusebio Martín Pérez
                        </div>
                        <div id="vista_lista_descripcion_elemento_14" class="vista_lista_descripcion_elemento">
                           Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                        </div>
                     </div>
                     <div id="vista_lista_borrar_elemento_14" name="vista_lista_borrar_elemento[]" class="vista_lista_borrar_elemento vista_lista_borrar_elemento_pasivo"></div>
                  </div>
               </div>
            </div>
            <div id="vista_lista_vista">
               <div id="vista_lista_titulo">
                  Eusebio Martín Pérez
               </div>
               <div id="vista_lista_contenido">
                  Es un profesor muyyy majo que nos cayó muy bien y decidimos comentar...
                  Por eso blaaa bla bla bla bla bla bla bl alaalasflaj sah kjshk hsakdh kashd jsh 
                  dj dalk ljs lkj s ljl jlasj lsj lsj la jºsadjalskj skjdh j kjh k k jhkjhsdkjhsk 
                  kshksahdk jh k hak sjhk jkjhskjhdkjshk  ksjhdk hka hsk khdsakhdk khdkhk dk hdkj
                  sld lajs lsjkdlkjldj  lkjsdl jl jlsdjl l kjl jsl jlkjasldskjdl j lkjsdl lksjl lkj
                  Y yo le dije: Cuál es el sueño de una servilleta? y el me dijo... Ser billete! asique
                  sñjdlja lj lkj ajs lj ljksljlsj  ldkj lk jl kj lkjlkjsljd oleoiu owje ljdj slkjd la
                  jsl kjlsdjlaj flj jro ijoie lkjwel después de un tiempo lo volvimos a contar y tuvo
                  muucha gracia, le direon un premio novel y todos suuuper contentos, menos yo... que
                  me quedé sin un chiste más que contar.
               </div>
               <div id="vista_lista_imagen" class="vista_lista_imagen"></div>
            </div>
         </div>
		</div>
		<footer></footer>
	</body>
</html>