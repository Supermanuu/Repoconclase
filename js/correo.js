$(function(){

   setInterval(load,50);

   var cargaDetalles = function(bandeja) {
	pagina = "php/clienteDetalles.php?" + "bandeja=" + bandeja;
	if ($("header").attr('class') == "blue"){
	    $("#correo_detallesCorreo_azul").load(pagina);
        }
	else {
	    $("#correo_detallesCorreo_verde").load(pagina);
	}
   };


   $("#correo_tipoCorreo > select").change(function(){

	option = $(this).val();
 	if (option == "recibidos"){
	   cargaDetalles ('1');
        }
	else if(option == "enviados"){
	   cargaDetalles ('2');
        }
	else{
	   cargaDetalles ('3');
	}
		
   });

   function load(){

   $("#correo_nuevo").click(function() {
	
	if ($("header").attr('class') == "blue"){
	    $("#correo_mostrarMensaje_azul").load("correo_enviar.php");
        }
	else {
	    $("#correo_mostrarMensaje_verde").load("correo_enviar.php");
        }

   });

   $("#correo_detallesCorreo_azul > p").click(function() {
	
	option = $("#correo_tipoCorreo > select").val();
        var bandeja;

        if (option == "recibidos"){
           bandeja = 1;
        }
        else if(option == "enviados"){
           bandeja = 2;
        }
	else {
	   bandeja = 3;
 	}

        pagina = "php/clienteMensaje.php?" + "idMensaje=" + $(this).attr('id') + "&bandeja=" + bandeja;
	$("#correo_mostrarMensaje_azul").load(pagina);
   });

   $("#correo_detallesCorreo_azul > p").mouseover(function(){

       $(this).css("background-color", "#376092");
   });

   $("#correo_detallesCorreo_azul > p").mouseleave(function(){
    
       $(this).css("background-color", "#4F81BD");
   });

   $("#correo_detallesCorreo_verde > p").click(function() {
	option = $("#correo_tipoCorreo > select").val();
	var bandeja;
   
        if (option == "recibidos"){
           bandeja = 1;
        }
        else if(option == "enviados"){
           bandeja = 2;
        }
        else {
	   bandeja = 3;
        }
	
	pagina = "php/clienteMensaje.php?" + "idMensaje=" + $(this).attr('id') + "&bandeja=" + bandeja;
	$("#correo_mostrarMensaje_verde").load(pagina);
   });

   $("#correo_detallesCorreo_verde > p").mouseover(function(){

       $(this).css("background-color", "#118E56");
   });

   $("#correo_detallesCorreo_verde > p").mouseleave(function(){

       $(this).css("background-color", "#6AC46E");
   });


   $("#correo_entradas > select").change(function(){

	$("#invis > input").val($("#de option:selected").text());

   });

   $("#eliM").click(function(){

	option = $("#correo_tipoCorreo > select").val();
        var bandeja;

        if (option == "recibidos"){
           bandeja = 1;
        }
        else {
           bandeja = 2;
        }

	pagina = 'php/correo_elimina.php?bandeja=' + bandeja + '&idMensaje=' + $("#invis > input").val(); 
	$(location).attr('href', pagina);

   });


   };


});

