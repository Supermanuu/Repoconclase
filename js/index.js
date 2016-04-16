window.onload = function(){

	var login = function mostrarLogin(){
  		c = document.getElementById("loginForm2");
  		if (c.style["visibility"] == "hidden" || c.style["visibility"] == "")
			c.style["visibility"] = "initial";
  		else
			c.style["visibility"] = "hidden";

 	 };

 	 document.getElementById("login").addEventListener('click', login);

};