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

   //------------Animacion JS del slider del profesor------------

   //almacenar slider en una variable
   var slider = $('#slider');
   //almacenar botones
   var siguiente = $('#btn-next');
   var anterior = $('#btn-prev');

   //mover ultima imagen al primer lugar
   $('#slider .dashprofes_info:last').insertBefore('#slider .dashprofes_info:first');
   //mostrar la primera imagen con un margen de -100%
   slider.css('margin-left', 0+'%');
   
   siguiente.on('click',function() {
       moverD();
   });

   anterior.on('click',function() {
       moverI();
   });

   function moverD() {
       slider.animate({
           marginLeft:0
       } ,700, function(){
         $('#slider .dashprofes_info:first').insertAfter('#slider .dashprofes_info:last'); //recolocamos los elems de la lista
         $('#tusEventos').innerHTML = $('#slideUl>li:first-child').innerHTML; //mostramos solo el primer elem de la lista escribiendole en el parrafo
           //slider.css('margin-left', '-'+100+'%');
       });
   }

   function moverI() {
       slider.animate({
           marginLeft:0
       } ,700, function(){
         $('#slider .dashprofes_info:last').insertBefore('#slider .dashprofes_info:first'); //recolocamos los elems de la lista
         $('#tusEventos').innerHTML = $('#slideUl>li:first-child').innerHTML; //mostramos solo el primer elem de la lista escribiendole en el parrafo
           //slider.css('margin-left', '-'+100+'%');
       });
   }

   

});