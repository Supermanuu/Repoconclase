window.onload = function() {

 	 var aInfoAlumnos = function(){
		location.href='detalles_alumnos.php';
	 };


 	 var aInfoProfes = function(){
		location.href='detalles_profesores.php';
	 };

	 var general = function(){
		location.href='all.html';
	 };

	 document.getElementById("general").addEventListener('click', general);
	 document.getElementById("index_toAlumnos").addEventListener('click', aInfoAlumnos);
 	 document.getElementById("index_toProfes").addEventListener('click', aInfoProfes);

};