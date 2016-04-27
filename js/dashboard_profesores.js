$(this).ready (function (){

   // Para resaltar los cuadros del dashboard al pasar sobre ellos con el raton
   $(".dashboard").mouseover (function (){
      $(this).css ("border-style", "double");
      $(this).css ("background-color", "#94AFCB");
   });
   $(".dashboard").mouseleave (function (){
      $(this).css ("border-style", "groove");
      $(this).css ("background-color", "#6C8DBC");
   });
   $("#tuInfo").mouseleave (function (){
      $(this).css ("border-style", "groove");
      $(this).css ("background-color", "#376092");
   });

 // ACCIONES AL PULSAR SOBRE LOS PANELES 
   // pulsar en logout
   $("#buscaUsuario").mousedown (function ()
   {
      console.log ("Panel de Buscar Usuarios");
   });

   $("#buscaAlumno").mousedown (function ()
   {
      console.log ("Buscar Alumnos");
   });

   $("#promocionarse").mousedown (function ()
   {
      console.log ("Crear nuevo Anuncio");
   });

   $("#infoPersonal").mousedown (function ()
   {
      console.log ("Panel de Informacion Personal");
   });

   $("#editarInfo").mousedown (function ()
   {
      console.log ("Editar Informacion Personal");
   });

   $("#opiniones").mousedown (function ()
   {
      console.log ("Panel de Opiniones y Valoraciones");
   });

   $("#verValoraciones").mousedown (function ()
   {
      console.log ("Ver tus Valoraciones de Alumnos");
   });

   $("#tusAlumnos").mousedown (function ()
   {
      console.log ("Panel de Tus Alumnos");
   });

   $("#gestionaAlumnos").mousedown (function ()
   {
      console.log ("Gestionar Alumnos");
   });

   $("#listaCursos").mousedown (function ()
   {
      console.log ("Lista de tus cursos");
   });

   $("#nuevoCurso").mousedown (function ()
   {
      console.log ("crear nuevo curso");
   });

   $("#tusGrupos").mousedown (function ()
   {
      console.log ("Panel de Tus Grupos");
   });

   $("#gestionaGrupos").mousedown (function ()
   {
      console.log ("Gestionar Grupos");
   });

   $("#nuevoGrupo").mousedown (function ()
   {
      console.log ("Crear nuevo Grupo");
   });

   $("#ranking").mousedown (function ()
   {
      console.log ("Panel de Ranking");
   });

   $("#verTop").mousedown (function ()
   {
      console.log ("Ver TOP 10 de Profesores");
   });

   $("#correo").mousedown (function ()
   {
      console.log ("Panel de Correo");
   });

   $("#redactarMensaje").mousedown (function ()
   {
      console.log ("Redactar Nuevo Mensaje");
   });

   $("#entradaMensajes").mousedown (function ()
   {
      console.log ("Ver Buzon de Entrada de tus Mensajes");
   });

   $("#estadisticas").mousedown (function ()
   {
      console.log ("Panel de Estadisticas");
   });

   $("#estadsAlumnos").mousedown (function ()
   {
      console.log ("Ver Estadisticas de Tus Alumnos");
   });

   $("#estadsGrupos").mousedown (function ()
   {
      console.log ("Ver Estadisticas de Tus Grupos");
   });

   $("#video").mousedown (function ()
   {
      console.log ("Ver video de uso de la web");
   });

});