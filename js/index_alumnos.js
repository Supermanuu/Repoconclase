$(document).ready(function()
{
   // Accion al pulsar sobre el boton de logout
   $("#logout").mousedown (function ()
   {
      console.log ("volver");
   });
   
   // Accion al pulsar sobre el spam principal
   $("#spam_principal").mousedown (function ()
   {
      console.log ("spam_principal");
   });
   
   // Para resaltar partes de la página al poner el raton encima
   $("#spam_principal").mouseover (function ()
   {
      $(this).css ("background-color", "white");
   });
   $("#spam_principal").mouseleave (function ()
   {
      $(this).css ("background-color", "#C8F9C8");
   });
   
   // Accion al pulsar sobre el spam secundario izquierda
   $("#spam_secundario_izquierda").mousedown (function (event)
   {
      console.log ("spam_secundario_izquierda");
   });
   
   // Para resaltar partes de la página al poner el raton encima
   $("#spam_secundario_izquierda").mouseover (function ()
   {
      $(this).css ("background-color", "white");
   });
   $("#spam_secundario_izquierda").mouseleave (function ()
   {
      $(this).css ("background-color", "#C8F9C8");
   });
   
   // Accion al pulsar sobre el spam secundario centro
   $("#spam_secundario_centro").mousedown (function (event)
   {
      console.log ("spam_secundario_centro");
   });
   
   // Para resaltar partes de la página al poner el raton encima
   $("#spam_secundario_centro").mouseover (function ()
   {
      $(this).css ("background-color", "white");
   });
   $("#spam_secundario_centro").mouseleave (function ()
   {
      $(this).css ("background-color", "#C8F9C8");
   });
   
   // Accion al pulsar sobre el spam secundario reecha
   $("#spam_secundario_derecha").mousedown (function (event)
   {
      console.log ("spam_secundario_derecha");
   });
   
   // Para resaltar partes de la página al poner el raton encima
   $("#spam_secundario_derecha").mouseover (function ()
   {
      $(this).css ("background-color", "white");
   });
   $("#spam_secundario_derecha").mouseleave (function ()
   {
      $(this).css ("background-color", "#C8F9C8");
   });
   
   // Accion al pulsar sobre el boton de logout
   $("#mis_notas").mousedown (function ()
   {
      console.log ("mis_notas");
   });
   
   // Accion al pulsar sobre el boton de logout
   $("#mis_grupos").mousedown (function ()
   {
      console.log ("mis_grupos");
   });
   
   // Accion al pulsar sobre el boton de logout
   $("#mis_clases").mousedown (function ()
   {
      console.log ("mis_clases");
   });
   
   // Accion al pulsar sobre el boton de logout
   $("#buscar_profesor").mousedown (function ()
   {
      console.log ("buscar_profesor");
   });
   
   // Accion al pulsar sobre el boton de logout
   $("#contratar_profesor").mousedown (function ()
   {
      console.log ("contratar_profesor");
   });
   
   // Accion al pulsar sobre el boton de logout
   $("#mis_profesores").mousedown (function ()
   {
      console.log ("mis_profesores");
   });
   
   // Accion al pulsar sobre el boton de logout
   $("#correo_alumno").mousedown (function ()
   {
      console.log ("correo_alumno");
   });
   
   // Accion al pulsar sobre el boton de logout
   $("#top_10_profesores").mousedown (function ()
   {
      console.log ("top_10_profesores");
   });
   
   // Accion al pulsar sobre el boton de logout
   $("#ajustes_perfil").mousedown (function ()
   {
      console.log ("ajustes_perfil");
   });
   
   // Accion al pulsar sobre el boton de logout
   $("#video_tutorial").mousedown (function ()
   {
      console.log ("video_tutorial");
   });
   
   // Para cambiar despues de cierto tiempo el carousel
   var index = 0;
   var carouseles = ["#spam_secundario_izquierda", "#spam_secundario_centro", "#spam_secundario_derecha", "#spam_principal"];
   var carousel_next = function ()
   {
      //var index = Math.floor (Math.random ()*carouseles.length);
      index = (index + 1) % carouseles.length;
      // refrescar info aqui
      $(carouseles [index]).slideUp (200);
      // o aqui
      $(carouseles [index]).slideDown (200);
      setTimeout (carousel_next, 10000);
   }
   setTimeout (carousel_next, 5000);
});