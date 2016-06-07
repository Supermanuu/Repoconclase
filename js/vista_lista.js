$(document).ready(function()
{
   tokens = location.search.substr(1).split ("&");
   
   // Tipo de usuario
   if (tokens.includes ("a=al"))
   {
      // Añadimos la clase del usuario
      $("header").addClass ("green");
      $("#logout").addClass ("green");
      $("footer").addClass ("green");
      $("#vista_lista_nuevo").addClass ("green");
      $("#vista_lista_editar").addClass ("green");
      $("#vista_lista_borrar_seleccionados").addClass ("green");
      
      // Cambiamos el color del buscador
      $("#vista_lista_buscador").css ("backgroundColor", "#6AC46E");
      $("#vista_lista_submit").css ("backgroundColor", "#6AC46E");
   }
   else if (tokens.includes ("a=pr"))
   {
      // Añadimos la clase del usuario
      $("header").addClass ("blue");
      $("#logout").addClass ("blue");
      $("footer").addClass ("blue");
      $("#vista_lista_nuevo").addClass ("blue");
      $("#vista_lista_editar").addClass ("blue");
      $("#vista_lista_borrar_seleccionados").addClass ("blue");
      
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
      $("#vista_lista_nuevo").addClass ("purple");
      $("#vista_lista_editar").addClass ("purple");
      $("#vista_lista_borrar_seleccionados").addClass ("purple");
      
      // Cambiamos el color del buscador
      $("#vista_lista_buscador").css ("backgroundColor", "#BA68C8");
      $("#vista_lista_submit").css ("backgroundColor", "#BA68C8");
   }
   
   $vista = 'Alumnos';
   
   // Lista que busca
   if (tokens.includes ("b=al"))
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_alumno");
      });
      $vista = 'Alumnos';
   }
   else if (tokens.includes ("b=pr"))
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_profesor");
      });
      $vista = 'Profesores';
   }
   else if (tokens.includes ("b=cl"))
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_clase");
      });
      $vista = 'Clases';
      if (tokens [0] == "a=pr")
         $("#vista_lista_editar").css ("display", "initial");
   }
   else
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_grupo");
      });
      $vista = 'Cursos';
      if (tokens [0] == "a=pr")
         $("#vista_lista_editar").css ("display", "initial");
   }
   
   if (tokens.includes ("c=mis"))
      $("#vista_lista_presentacion").html ($vista);
   else
      $("#vista_lista_presentacion").html ('Mis ' + $vista);

   // Para controlar el borrado de elementos de la lista utilizo un hash map
   var seleccionados_borrar = [];
   $('div[name="vista_lista_borrar_elemento[]"]').mousedown (function ()
   {
      if (seleccionados_borrar.includes (this))
      {
         $(this).removeClass ("vista_lista_borrar_elemento_activo");
         $(this).addClass ("vista_lista_borrar_elemento_pasivo");
         seleccionados_borrar [seleccionados_borrar.indexOf (this)] = null;
      }
      else
      {
         $(this).removeClass ("vista_lista_borrar_elemento_pasivo");
         $(this).addClass ("vista_lista_borrar_elemento_activo");
         seleccionados_borrar.push (this);
      }
   });
   
   // Para controlar que elemento de la lista se ha seleccionado
   var seleccionado;
   $('div[name="vista_lista_elemento[]"]').mousedown (function ()
   {
      if (seleccionado == this)
      {
         $(this).removeClass ("vista_lista_elemento_activo");
         seleccionado = null;
      }
      else
      {
         if (seleccionado != null)
            $(seleccionado).removeClass ("vista_lista_elemento_activo");
         $(this).addClass ("vista_lista_elemento_activo");
         seleccionado = this;
         
         vista_lista_contenido.innerText = this.lastChild.innerText;
      }
   });
});