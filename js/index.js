$(function(){

 	 $("#index_toProfes").click(function(){
	     $(location).attr('href', 'detalles_alumnos.php');
	 });

         $("#index_toAlumnos").click(function(){ 
             $(location).attr('href', 'detalles_profesores.php'); 
         });
	 
});
