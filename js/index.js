window.onload = function(){

	var login = function mostrarLogin(){
  		c = document.getElementById("loginForm2");
  		if (c.style["visibility"] == "hidden" || c.style["visibility"] == "")
			c.style["visibility"] = "initial";
  		else
			c.style["visibility"] = "hidden";

 	 };

 	 var aInfoAlumnos = function(){
		location.href='detalles_alumnos.html';
	 }


 	 var aInfoProfes = function(){
		location.href='detalles_profesores.html';
	 }

 	 document.getElementById("login").addEventListener('click', login);
	
	 document.getElementById("infoAlumnos").addEventListener('click', aInfoAlumnos);
 	 document.getElementById("infoProfes").addEventListener('click', aInfoProfes);


};