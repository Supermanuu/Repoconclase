$(document).ready(function()
{
   tokens = location.search.substr(1).split ("&");
   
   if (tokens [0] == "a=al")
   {
      // Añadimos la clase del usuario
      $("header").addClass ("green");
      $("#logout").addClass ("green");
      $("footer").addClass ("green");
      
      // Cambiamos el color del buscador
      $("#vista_lista_buscador").css ("backgroundColor", "#6AC46E");
      $("#vista_lista_submit").css ("backgroundColor", "#6AC46E");
   }
   else if (tokens [0] == "a=pr")
   {
      // Añadimos la clase del usuario
      $("header").addClass ("blue");
      $("#logout").addClass ("blue");
      $("footer").addClass ("blue");
      
      // Cambiamos el color del buscador
      $("#vista_lista_buscador").css ("backgroundColor", "#4F81BD");
      $("#vista_lista_submit").css ("backgroundColor", "#4F81BD");
   }
   else
   {
      // Añadimos la clase del usuario
      $("header").addClass ("purple");
      $("#logout").addClass ("purple");
      $("footer").addClass ("purple");
      
      // Cambiamos el color del buscador
      $("#vista_lista_buscador").css ("backgroundColor", "#BA68C8");
      $("#vista_lista_submit").css ("backgroundColor", "#BA68C8");
   }
   
   if (tokens [1] == "b=al")
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_alumno");
      });
      $("#vista_lista_presentacion").html ('Mis Alumnos');
   }
   else if (tokens [1] == "b=pr")
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_profesor");
      });
      $("#vista_lista_presentacion").html ('Mis Profesores');
   }
   else if (tokens [1] == "b=cl")
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_clase");
      });
      $("#vista_lista_presentacion").html ('Mis Clases');
   }
   else
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_grupo");
         $("#vista_lista_presentacion").html ('Mis Grupos');
      });
   }
});