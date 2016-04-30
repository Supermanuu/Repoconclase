$(document).ready (function () {

   // Para resaltar los cuadros del dashboard al pasar sobre ellos con el raton
   $(".claro").mouseover (function (){
      $(this).css ("background-color", "#94AFCB");
   });
   $(".claro").mouseleave (function (){
      $(this).css ("background-color", "#6C8DBC");
   });
   //para dejar el mismo color al cuadro de info
   $("#tuInfo").mouseleave (function (){
      $(this).css ("background-color", "#376092");
   });

 // ACCIONES AL PULSAR SOBRE LOS PANELES 
   $("#tusAlumnos").mousedown (function ()
   {
      $(location).attr('href', 'vista_lista.html?a=pr&b=al');
   });

   $("#tusGrupos").mousedown (function ()
   {
      $(location).attr('href', 'vista_lista.html?a=pr&b=gr');
   });

   $("#buscaUsuario").mousedown (function ()
   {
      $(location).attr('href', 'buscador.html');
   });

   $("#correo").mousedown (function ()
   {
      $(location).attr('href', 'correo.html');
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
      $(location).attr('href', 'ranking.html');
   });

   $("#video").mousedown (function ()
   {
      $(location).attr('href', ' ');
   });

});