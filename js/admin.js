$(function(){

	var muestraMensaje = function(){
		$("#informacionMensajes").css("visibility","initial");
		$("#informacionMensajes").fadeOut();
		$("#informacionMensajes").fadeIn(1000);
	};

	var muestraCorreo = function(){
		$("#informacionClases").css("visibility","initial");
		$("#informacionClases").fadeOut();
		$("#informacionClases").fadeIn(1000);
	};

	$("#correos > #mensajes > #fecha > p").click(function(event){
		muestraMensaje();
	});

	$("#correos > #mensajes > #tipo > p").click(function(event){
		muestraMensaje();
	});

	$("#correos > #mensajes > #emisor > p").click(function(event){
		muestraMensaje();
	});

	$("#altaClases > #mensajes > #fecha > p").click(function(event){
		muestraCorreo();
	});

	$("#altaClases > #mensajes > #nombre > p").click(function(event){
		muestraCorreo();
	});

	$("#altaClases > #mensajes > #profesor > p").click(function(event){
		muestraCorreo();
	});

	$(".cerrarVentana").click(function(event){
		$("#informacionClases").css("visibility","hidden");
		$("#informacionMensajes").css("visibility","hidden");
	});

});