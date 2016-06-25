$(function(){
	
	setInterval(load,50);

	var cargaDetalles = function(vista) {
	pagina = "php/ranking_info.php?" + "view=" + vista;

	$("#rank").load(pagina);
   };

   $("#buscador_rank > select").change(function(){

	option = $(this).val();
 	if (option == "asignaturas"){
	   cargaDetalles ('1');
    }
	else if(option == "total"){
	   cargaDetalles ('2');
    }
		
   });

   function load(){

   };
   

})