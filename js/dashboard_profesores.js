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
   $("#tusClases").mousedown (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=pr&b=al');
   });

   $("#tusCursos").mousedown (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=pr&b=gr');
   });

   $("#busqueda").mousedown (function ()
   {
      $(location).attr('href', 'buscador.html');
   });

   $("#correo").mousedown (function ()
   {
      $(location).attr('href', 'correo.php');
   });


   $("#infoPersonal").mousedown (function ()
   {
      $(location).attr('href', 'editar_usuario.html');
   });

   $("#valoraciones").mousedown (function ()
   {
      $(location).attr('href', 'estadisticas.html');
   });

   $("#ranking").mousedown (function ()
   {
      $(location).attr('href', 'ranking.php');
   });

   $("#video").mousedown (function ()
   {
      $(location).attr('href', ' ');
   });

});