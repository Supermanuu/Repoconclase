window.onload = function() {

 	 var aInfoAlumnos = function(){
		location.href='detalles_alumnos.php';
	 };


 	 var aInfoProfes = function(){
		location.href='detalles_profesores.php';
	 };

	 document.getElementById("#index_loginForm2 > form").onsubmit = function(event) {
		dni = document.getElementById("#index_entradas > input["dni"]").value;
		password = document.getElementById("#index_entradas > input["pass"]").value;		

		if ( !(/^\d{8}[A-Z]$/.test(dni)) ) {
		   event.preventdefault();
 		};

		if (password == null || password.length == 0 || !(/^\[A-Za-z0-9]{8}$/.test(password))) {
		   event.preventdefault();
		};
	 };

	 document.getElementById("index_toAlumnos").addEventListener('click', aInfoAlumnos);
 	 document.getElementById("index_toProfes").addEventListener('click', aInfoProfes);
};
