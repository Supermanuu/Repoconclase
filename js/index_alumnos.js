$(document).ready(function()
{
   
   $("#spam_principal").click (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=al&b=gr&c=mis');
   });
   
   $("#spam_secundario_izquierda").click (function (event)
   {
      $(location).attr('href', 'ranking.php');
   });
   
   $("#spam_secundario_centro").click (function (event)
   {
      $(location).attr('href', 'ranking.php');
   });
   
   $("#spam_secundario_derecha").click (function (event)
   {
      $(location).attr('href', 'ranking.php');
   });
   
   $("#mis_notas").click (function ()
   {
      console.log ("mis_notas");
   });
   
   $("#mis_cursos").click (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=al&b=gr');
   });
   
   $("#mis_clases").click (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=al&b=cl');
   });
   
   $("#buscar_profesor").click (function ()
   {
      $(location).attr('href', 'busqueda.php');
   });
   
   $("#contratar_profesor").click (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=al&b=cl&c=mis');
   });
   
   $("#contratar_curso").click (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=al&b=cu&c=mis');
   });
   
   $("#mis_profesores").click (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=al&b=pr');
   });
   
   $("#correo_alumno").click (function ()
   {
      $(location).attr('href', 'correo.php?a=al');
   });
   
   $("#top_10_profesores").click (function ()
   {
      $(location).attr('href', 'ranking.php');
   });
   
   $("#ajustes_perfil").click (function ()
   {
      $(location).attr('href', 'editar_usuario.php');
   });
   
   $("#video_tutorial").click (function ()
   {
      console.log ("video_tutorial");
   });
   
   // Variables importantes del spam central
   var carrusel_central;
   var index_central = 0;
   
   // Funcion que cambia el spam central
   function next_spam_central ()
   {
      $("#spam_principal").slideUp (200, function () 
      {
         spam_principal_intro.innerText = carrusel_central.spam_c [index_central].intro;
         spam_principal_autor.innerText = carrusel_central.spam_c [index_central].autor;
         spam_principal_curso.innerText = carrusel_central.spam_c [index_central].curso;
         spam_principal_horario.innerText = carrusel_central.spam_c [index_central].horario;
         index_central = (index_central + 1) % carrusel_central.spam_c.length;
         $("#spam_principal").slideDown (200);
         setTimeout (next_spam_central, 40000);
      });
   }
   
   // Cargamos el spam de la base de datos con JSON
   $.ajax (
   {
      type: "POST",
      url: "./php/getSpamCentral.php",
      success: function (data)
      {
         if (data == '' || data.search ("ERROR") > -1)
         {
            spam_principal_curso.innerText = 'No se pueden mostrar los cursos :(';
            spam_principal_ver_mas.innerText = ' ';
            if (data.search ("ERROR") > -1)
               alert (data);
         }
         else
         {
            carrusel_central = JSON.parse (data);
            next_spam_central ();
         }
      }
   });
   
   // Variables importantes del spam inferior
   var selector_spam = ["spam_secundario_izquierda", "spam_secundario_centro", "spam_secundario_derecha"];
   var carrusel_inferior;
   var index_inferior = 4;
   
   // Funcion que cambia el spam inferior
   function next_spam_inferior ()
   {
      var selector = selector_spam [index_inferior % 3];
      $("#" + selector).slideUp (200, function () 
      {
         this.children [0].innerText = carrusel_inferior.spam_i [index_inferior % carrusel_inferior.spam_i.length].titulo;
         this.children [1].innerText = carrusel_inferior.spam_i [index_inferior % carrusel_inferior.spam_i.length].apoderado;
         index_inferior++;
         $("#" + selector).slideDown (200);
         if ((index_inferior % 3) == 0)
            setTimeout (next_spam_inferior, 20000);
         else
            setTimeout (next_spam_inferior, 10000);
      });
   }
   
   // Cargamos el spam de la base de datos con JSON
   $.ajax (
   {
      type: "POST",
      url: "./php/getSpamInferior.php",
      success: function (data)
      {
         if (data == '' || data.search ("ERROR") > -1)
         {
            spam_secundario_izquierda.children [0].innerText = 'No se pueden mostrar los comentarios';
            spam_secundario_izquierda.children [1].innerText = ':(';
            spam_secundario_centro.children [0].innerText = 'No se pueden mostrar los comentarios';
            spam_secundario_centro.children [1].innerText = ':(';
            spam_secundario_derecha.children [0].innerText = 'No se pueden mostrar los comentarios';
            spam_secundario_derecha.children [1].innerText = ':(';
            if (data.search ("ERROR") > -1)
               alert (data);
         }
         else
         {
            carrusel_inferior = JSON.parse (data);
            spam_secundario_izquierda.children [0].innerText = carrusel_inferior.spam_i [0].titulo;
            spam_secundario_izquierda.children [1].innerText = carrusel_inferior.spam_i [0].apoderado;
            spam_secundario_centro.children [0].innerText = carrusel_inferior.spam_i [1].titulo;
            spam_secundario_centro.children [1].innerText = carrusel_inferior.spam_i [1].apoderado;
            spam_secundario_derecha.children [0].innerText = carrusel_inferior.spam_i [2].titulo;
            spam_secundario_derecha.children [1].innerText = carrusel_inferior.spam_i [2].apoderado;
            next_spam_inferior ();
         }
      }
   });
});
