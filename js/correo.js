$(function(){

   setInterval(load,1000);

   var cargaDetalles = function(bandeja) {
	pagina = "./php/clienteDetalles.php?" + "bandeja=" + bandeja;
	if ($("#correo_detallesCorreo_azul").children().length > 0){
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
		
   });

   function load(){

   $("#correo_nuevo").click(function() {
	
	if ($("#correo_mostrarMensaje_azul").children().length > 0){
	    $("#correo_mostrarMensaje_azul").load("correo_enviar.php");
        }
	else {
	    $("#correo_mostrarMensaje_verde").load("correo_enviar.php");
	}

   });

   $("#correo_detallesCorreo_azul > p").click(function() {

        pagina = "./php/clienteMensaje.php?" + "idMensaje=" + $(this).attr('id');
	$("#correo_mostrarMensaje_azul").load(pagina);

   });

   $("#correo_detallesCorreo_azul > p").mouseover(function(){

       $(this).css("background-color", "#376092");
   });

   $("#correo_detallesCorreo_azul > p").mouseleave(function(){
    
       $(this).css("background-color", "#4F81BD");
   });

   $("#correo_detallesCorreo_verde > p").click(function() {

	pagina = "php/clienteMensaje.php?" + "idMensaje=" + $(this).attr('id');
	$("#correo_mostrarMensaje_verde").load(pagina);

   });

   $("#correo_detallesCorreo_verde > p").mouseover(function(){

       $(this).css("background-color", "#118E56");
   });

   $("#correo_detallesCorreo_verde > p").mouseleave(function(){

       $(this).css("background-color", "#6AC46E");
   });

   };

});

