﻿$(document).ready ( function ()
{
   tokens = location.search.substr(1).split ("&");
   
   // Tipo de usuario
   if (tokens.includes ("a=al"))
   {
      // Añadimos la clase del usuario
      $("#elemento_volver").addClass ("green");
      $("#elemento_aceptar").addClass ("green");
      
      // Cambiamos el color del buscador
      $("#elemento_titulo").css ("backgroundColor", "#81c37c");
      $("#elemento_contenido").css ("backgroundColor", "#b7efb0");
      $("#elemento_precio > p").css ("backgroundColor", "#81c37c");
   }
   else if (tokens.includes ("a=pr"))
   {
      // Añadimos la clase del usuario
      $("#elemento_volver").addClass ("blue");
      $("#elemento_aceptar").addClass ("blue");
      
      // Cambiamos el color del buscador
      $("#elemento_titulo").css ("backgroundColor", "#7ca6c3");
      $("#elemento_contenido").css ("backgroundColor", "#a2bed2");
      $("#elemento_precio > p").css ("backgroundColor", "#7ca6c3");
   }
   else
   {
      // Añadimos la clase del usuario
      $("#elemento_volver").addClass ("purple");
      $("#elemento_aceptar").addClass ("purple");
      
      // Cambiamos el color del buscador
      $("#elemento_titulo").css ("backgroundColor", "#ba70ce");
      $("#elemento_contenido").css ("backgroundColor", "#cea2d2");
      $("#elemento_precio > p").css ("backgroundColor", "#ba70ce");
   }
   
   // Si da a aceptar
   $('#elemento_aceptar').click (function ()
   {
      $.ajax (
      {
         type: "POST",
         url: "./php/aceptaVistaLista.php",
         data: {"perfil" : $perfil, "tabla" : $tabla, "mis" : !tokens.includes ("c=mis"), "id" :  id_oculto.innerText},
         success: function (data)
         {
            //alert (data); // Esto por si quieres ver la query que se ha ejecutado e info de depuración
            $("#elemento_titulo").fadeOut ("fast", function ()
            {
               $("#elemento_titulo").css ("align-text", "center");
               elemento_titulo.innerText = "¡Contrato firmado!";
               $("#elemento_titulo").fadeIn ("fast", function ()
               {
                  setTimeout (location.reload (), 10000);
               });
            });
            $("#elemento_contenido").fadeOut ("fast");
            $("#elemento_precio").fadeOut ("fast");
            $("#elemento_aceptar").fadeOut ("fast");
            $("#elemento_volver").fadeOut ("fast");
         }
      });
   });
   
   // Si da a volver
   $('#elemento_volver').click (function ()
   {
      //alert ('No se aceptó');
      $("#elemento_titulo").fadeOut ("fast");
      $("#elemento_contenido").fadeOut ("fast");
      $("#elemento_precio").fadeOut ("fast");
      $("#elemento_aceptar").fadeOut ("fast");
      $("#elemento_volver").fadeOut ("fast", function ()
      {
         setTimeout (location.reload (), 3000);
      });
   });
   
   $("#elemento_principal").fadeIn ("fast");
});