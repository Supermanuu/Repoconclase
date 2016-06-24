$(document).ready (function () {

   // Para resaltar los cuadros del dashboard al pasar sobre ellos con el raton
   $(".claro").mouseover (function (){
      $(this).css ("background-color", "#4F6E9C");
   });
   $(".claro").mouseleave (function (){
      $(this).css ("background-color", "#576881");
   });
   //para dejar el mismo color al cuadro de info
   $("#tuInfo").mouseleave (function (){
      $(this).css ("background-color", "#376092");
   });

 // ACCIONES AL PULSAR SOBRE LOS PANELES 

   $("#misClases").mousedown (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=pr&b=cl&c=mis');
   });

   $("#misCursos").mousedown (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=pr&b=cu&c=mis');
   });

   $("#misAlumnos").mousedown (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=pr&b=al&c=mis');
   });

   $("#busqueda").mousedown (function ()
   {
      $(location).attr('href', 'busqueda.php');
   });

   $("#correo").mousedown (function ()
   {
      $(location).attr('href', 'correo.php');
   });


   $("#infoPersonal").mousedown (function ()
   {
      $(location).attr('href', 'editar_usuario.php');
   });

   $("#valoraciones").mousedown (function ()
   {
      $(location).attr('href', 'estadisticas.php');
   });

   $("#ranking").mousedown (function ()
   {
      $(location).attr('href', 'ranking.php');
   });

   //------------Animacion JS del slider del profesor------------

   //almacenar slider en una variable
   var slider = $('#slider');
   //almacenar botones
   var siguiente = $('#btn-next');
   var anterior = $('#btn-prev');

   
   
   siguiente.mousedown(function() {
      $('#listaOculta:first').insertAfter('#listaOculta:last'); //recolocamos los elems de la lista
      var txto = $('#listaOculta:first').val();
      $("#tusEventos").html('<p id="tusEventos" class="dashprofes_small_p dashprofes_info">'+ txto +'</p>');
   });

   anterior.mousedown(function() {
      $('#listaOculta:last').insertBefore('#listaOculta:first'); //recolocamos los elems de la lista
      var txto = $('#listaOculta:first').val();
      $("#tusEventos").html('<p id="tusEventos" class="dashprofes_small_p dashprofes_info">'+ txto +'</p>');
   });

});