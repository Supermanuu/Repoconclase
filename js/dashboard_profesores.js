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

   $("#video").mousedown (function ()
   {
      $(location).attr('href', ' ');
   });

   //------------Animacion JS del slider del profesor------------

   //almacenar slider en una variable
   var slider = $('#slider');
   //almacenar botones
   var siguiente = $('#btn-next');
   var anterior = $('#btn-prev');

   $('slider>#tusEventos').innerText = "SCRIBO POR JS";
   
   siguiente.on('click',function() {
       moverD();
   });

   anterior.on('click',function() {
       moverI();
   });

   function moverD() {
      $('#listaOculta:first').insertAfter('#listaOculta:last'); //recolocamos los elems de la lista
      $('#tusEventos').innerText = $('#listaOculta>li:first-child').innerText; //mostramos solo el primer elem de la lista escribiendole en el parrafo
   }

   function moverI() {
      $('#listaOculta:last').insertBefore('#listaOculta:first'); //recolocamos los elems de la lista
      $('#tusEventos').innerText = $('#listaOculta>li:first-child').innerText; //mostramos solo el primer elem de la lista escribiendole en el parrafo       });
   }

   

});