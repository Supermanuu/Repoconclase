$(document).ready(function()
{
   
   $("#spam_principal").mousedown (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=al&b=gr&c=mis');
   });
   
   $("#spam_secundario_izquierda").mousedown (function (event)
   {
      $(location).attr('href', 'estadisticas.html');
   });
   
   $("#spam_secundario_centro").mousedown (function (event)
   {
      $(location).attr('href', 'estadisticas.html');
   });
   
   $("#spam_secundario_derecha").mousedown (function (event)
   {
      $(location).attr('href', 'estadisticas.html');
   });
   
   $("#mis_notas").mousedown (function ()
   {
      console.log ("mis_notas");
   });
   
   $("#mis_cursos").mousedown (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=al&b=gr');
   });
   
   $("#mis_clases").mousedown (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=al&b=cl');
   });
   
   $("#buscar_profesor").mousedown (function ()
   {
      $(location).attr('href', 'buscador.html');
   });
   
   $("#contratar_profesor").mousedown (function ()
   {
      $(location).attr('href', 'contrata.html');
   });
   
   $("#mis_profesores").mousedown (function ()
   {
      $(location).attr('href', 'vista_lista.php?a=al&b=pr');
   });
   
   $("#correo_alumno").mousedown (function ()
   {
      $(location).attr('href', 'correo.php?a=al');
   });
   
   $("#top_10_profesores").mousedown (function ()
   {
      $(location).attr('href', 'ranking.php');
   });
   
   $("#ajustes_perfil").mousedown (function ()
   {
      console.log ("ajustes_perfil");
   });
   
   $("#video_tutorial").mousedown (function ()
   {
      console.log ("video_tutorial");
   });
   
   // Para cambiar despues de cierto tiempo el carousel
   var index = 0;
   var i_curso = 1;
   var i_profe = 3;
   var carouseles = ["#spam_principal", "#spam_secundario_izquierda", "#spam_secundario_centro", "#spam_secundario_derecha"];
   var ficheros = ["spam_curso", "spam_profe", "spam_profe", "spam_profe"];
   
   // Cargamos el spam
   $(carouseles [0]).load (ficheros [0] + "0.txt");
   $(carouseles [1]).load (ficheros [1] + "0.txt");
   $(carouseles [2]).load (ficheros [2] + "1.txt");
   $(carouseles [3]).load (ficheros [3] + "2.txt");
   
   var carousel_next = function ()
   {
	  index = (index + 1) % carouseles.length;
	  if (index == 0) { i = i_curso; i_curso++; }
	  else            { i = i_profe; i_profe++; }
      $(carouseles [index]).slideUp (200);
      $(carouseles [index]).load (ficheros [index] + i.toString () + ".txt", function (response, status, xhr)
	  {
		  if (status == "error")
		  {
           // Es importante que esten todos los indices rellenos
			  if (index == 0) { i_curso = 0; i = 0; }
			  else            { i_profe = 0; i = 0; }
			  $(carouseles [index]).load (ficheros [index] + i.toString () + ".txt");
		  }
	  });
      $(carouseles [index]).slideDown (200);
      setTimeout (carousel_next, 10000);
   }
   setTimeout (carousel_next, 5000);
});
