$(document).ready(function()
{
   function clearString (str)
   {
      return str.replace ('\n', ' ').trim ().toLowerCase ().replace(/á/gi,"a").replace(/é/gi,"e").replace(/í/gi,"i").replace(/ó/gi,"o").replace(/ú/gi,"u")
   }
   
   tokens = location.search.substr(1).split ("&");
   $perfil = 'al';
   
   // Tipo de usuario
   if (tokens.includes ("a=al"))
   {
      // Añadimos la clase del usuario
      $("#vista_lista_nuevo").addClass ("green");
      $("#vista_lista_editar").addClass ("green");
      $("#vista_lista_borrar_seleccionados").addClass ("green");
      
      // Cambiamos el color del buscador
      $("#vista_lista_buscador").css ("backgroundColor", "#6AC46E");
      $("#vista_lista_submit").css ("backgroundColor", "#6AC46E");
      $perfil = 'al';
   }
   else if (tokens.includes ("a=pr"))
   {
      // Añadimos la clase del usuario
      $("#vista_lista_nuevo").addClass ("blue");
      $("#vista_lista_editar").addClass ("blue");
      $("#vista_lista_borrar_seleccionados").addClass ("blue");
      
      // Cambiamos el color del buscador
      $("#vista_lista_buscador").css ("backgroundColor", "#4F81BD");
      $("#vista_lista_submit").css ("backgroundColor", "#4F81BD");
      $perfil = 'pr';
   }
   else
   {
      // Añadimos la clase del usuario
      $("#vista_lista_nuevo").addClass ("purple");
      $("#vista_lista_editar").addClass ("purple");
      $("#vista_lista_borrar_seleccionados").addClass ("purple");
      
      // Cambiamos el color del buscador
      $("#vista_lista_buscador").css ("backgroundColor", "#BA68C8");
      $("#vista_lista_submit").css ("backgroundColor", "#BA68C8");
      $perfil = 'ad';
   }
   
   $vista = 'Alumnos';
   $tabla = 'al';
   
   // Lista que busca
   if (tokens.includes ("b=al"))
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_alumno");
      });
      $vista = 'Alumnos';
      $tabla = 'al';
   }
   else if (tokens.includes ("b=pr"))
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_profesor");
      });
      $vista = 'Profesores';
      $tabla = 'pr';
   }
   else if (tokens.includes ("b=cl"))
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_clase");
      });
      $vista = 'Clases';
      $tabla = 'cl';
      if ($perfil == "pr")
         $("#vista_lista_editar").css ("display", "initial");
   }
   else if (tokens.includes ("b=as"))
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_asignatura");
      });
      $vista = 'Asignaturas';
      $tabla = 'as';
      if (tokens [0] == "a=ad")
         $("#vista_lista_editar").css ("display", "initial");
      $('div[name="vista_lista_borrar_elemento[]"]').css ("display", "none");
   }
   else
   {
      $('div[name="vista_lista_imagen_elemento[]"]').each (function ()
      {
         $(this).addClass ("vista_lista_imagen_elemento_grupo");
      });
      $vista = 'Cursos';
      $tabla = 'cu';
      if ($perfil == "pr")
         $("#vista_lista_editar").css ("display", "initial");
   }
   
   // Controlamos si la lista es de mis cosas o de cosas generales
   if (tokens.includes ("c=mis"))
   {
      $("#vista_lista_presentacion").html ($vista);
      if ($perfil == 'al')
      {
         $('div[name="vista_lista_borrar_elemento[]"]').css ("display", "none");
         $("#vista_lista_nuevo").css ("display", "none");
         $("#vista_lista_borrar_seleccionados").css ("visibility", "hidden");
      }
      if ($perfil == 'pr' && $tabla != 'pr' && $tabla != 'as')
         $('div[name="vista_lista_borrar_elemento[]"]').css ("display", "none");
      if ($perfil == 'ad')
      {
         $('div[name="vista_lista_aceptar_elemento[]"]').css ("display", "none");
         $('div[name="vista_lista_borrar_elemento[]"]').css ("margin-left", "auto");
         $("#vista_lista_nuevo").css ("display", "none");
         $("#vista_lista_borrar_seleccionados").css ("visibility", "hidden");
      }
   }
   else
   {
      $("#vista_lista_presentacion").html ('Mis ' + $vista);
      $('div[name="vista_lista_aceptar_elemento[]"]').css ("display", "none");
      $('div[name="vista_lista_borrar_elemento[]"]').css ("margin-left", "auto");
   }
   
   
   $("#vista_lista_nuevo").click (function ()
   {
      if ($perfil != 'pr')
         // Para navegar a todos los cursos si se da a "nuevo" y no eres profe
         location.href += '&c=mis';
      else
      {
         // Si es profesor, vamos a crear clase o grupo
         if ($tabla == 'cl')
            location.href = './crear.php?cl';
         else
            location.href = './crear.php';
      }
   });
   
   // Para controlar el borrado de elementos de la lista utilizo un hash map
   var seleccionados_borrar = [];
   $('div[name="vista_lista_borrar_elemento[]"]').mousedown (function ()
   {
      // Si el elemento ya habia sido marcado
      if (seleccionados_borrar.includes (this))
      {
         $(this).removeClass ("vista_lista_borrar_elemento_activo");
         $(this).addClass ("vista_lista_borrar_elemento_pasivo");
         seleccionados_borrar.splice (seleccionados_borrar.indexOf (this), 1);
      }
      // Si no habia sido marcado
      else
      {
         $(this).removeClass ("vista_lista_borrar_elemento_pasivo");
         $(this).addClass ("vista_lista_borrar_elemento_activo");
         seleccionados_borrar.push (this);
      }
   });
   
   // Accion de borrado
   $("#vista_lista_borrar_seleccionados").click (function borrar_seleccionados ()
   {
      for (var i = 0; i < seleccionados_borrar.length; i++)
      {
         // Ejecutamos el php que eliminara el elemento de la tabla en el backend
         $.ajax (
         {
            type: "POST",
            url: "./php/eliminaDeVistaLista.php",
            data: {"perfil" : $perfil, "tabla" : $tabla, "mis" : !tokens.includes ("c=mis"), "id" :  seleccionados_borrar [i].parentElement.children [5].innerText},
            success: function (data)
            {
               if (data == '' || data.search ("ERROR") > -1)
                  alert ("¡Ooops! ¡Ha habido un error!");
               //alert (data); // Esto por si quieres ver la query que se ha ejecutado e info de depuración
            }
         });
         // Animación
         $("#" + seleccionados_borrar [i].parentElement.id).hide ("slide", {direction: "left"}, 250);
      }
      // Liberamos el array de elementos a eliminar
      seleccionados_borrar.splice (0, seleccionados_borrar.length);
      
      // Refrescamos la vista del elemento
      if (vista_lista_lista.childElementCount == 0)
      {
         vista_lista_titulo.innerText = "Ningún elemento";
         vista_lista_contenido.innerText = "";
      }
      else
      {
         vista_lista_titulo.innerText = "Ningún elemento seleccionado";
         vista_lista_contenido.innerText = "";
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
         
         vista_lista_titulo.innerText = this.children [1].firstChild.innerText;
         vista_lista_contenido.innerText = this.children [4].innerText;
      }
   });
   
   // Para controlar el tick de elementos de la lista
   $('div[name="vista_lista_aceptar_elemento[]"]').mousedown (function ()
   {
      $(this).addClass ("vista_lista_aceptar_elemento_activo");
      $(this).fadeOut ("slow", function ()
      {
         this.nextSibling.style.marginLeft = "auto";
         
         if ($tabla != 'cu' && $tabla != 'cl')
         {
            $.ajax (
            {
               type: "POST",
               url: "./php/aceptaVistaLista.php",
               data: {"perfil" : $perfil, "tabla" : $tabla, "mis" : !tokens.includes ("c=mis"), "id" :  this.parentElement.children [5].innerText},
               success: function (data)
               {
                  if (data == '' || data.search ("ERROR") > -1)
                     alert ("¡Ooops! ¡Ha habido un error!");
               //alert (data); // Esto por si quieres ver la query que se ha ejecutado e info de depuración
               }
            });
         }
         else
         {
            $.ajax (
            {
               type: "POST",
               url: "elemento.php",
               data: {
                  "titulo" : this.parentElement.children [1].firstChild.innerText, 
                  "contenido" : this.parentElement.children [4].innerText, 
                  "id" : this.parentElement.children [5].innerText,
                  "precio" : this.parentElement.children [6].innerText
               },
               success: function (data)
               {
                  if (data == '' || data.search ("ERROR") > -1)
                     alert ("¡Ooops! ¡Ha habido un error!");
                  else
                  {
                     vista_lista_principal.innerHTML = data;
                     $("#elemento_principal").hide ();
                     $.getScript ("js/elemento.js");
                  }
                  //alert (data); // Esto por si quieres ver la query que se ha ejecutado e info de depuración
               }
            });
         }
      });
      
   });
   
   // Filtro de busqueda
   $("#vista_lista_search").keyup (function ()
   {
      var str_busqueda = this.value.toLowerCase ();
      str_busqueda = clearString (str_busqueda);
      var tokensBusqueda = str_busqueda.split (" ");
      
      $('div[name="vista_lista_elemento[]"]').each ( function ()
      {
         var str_div = this.children [1].firstChild.innerHTML + " " + this.children [4].innerText;
         str_div = clearString (str_div);
         
         var aceptado = true;
         for (var index in tokensBusqueda)
         {
            if (str_div.search (tokensBusqueda [index]) > -1 && aceptado)
               aceptado = true;
            else
               aceptado = false;
         }
                 
         if (aceptado)
            $(this).show ("slide", {direction: "left"}, 250);
         else
            $(this).hide ("slide", {direction: "left"}, 250);
      });
   });
});