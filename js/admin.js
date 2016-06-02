$(document).ready(function() {

	$("#admin_gestionUsuarios").click(function(){

		//Peticion al servidor - AJAX
		$("#admin_principal").load("admin_Usuarios.txt");
	});

	$("#admin_gestionUsuarios").mouseover(function(){
		
		$(this).css ("background-color", "#CE93D8");
		
	});

	$("#admin_gestionUsuarios").mouseleave(function(){

		$(this).css ("background-color", "#AB47BC");

	});

	$("#admin_bandejaEntrada > p").click(function(){
		
		pagina = "php/admin_Mensaje.php?" + "idMensaje=" + $(this).attr('id');
		$("#admin_informacionMensajes").load(pagina);
	});

	var datos = $.ajax({
	    url:'php/admin_grafica.php',
	    type:'post',
	    dataType:'json',
	    async:false
	}).responseText;

	var datos2 = $.ajax({
	    url:'php/admin_grafica2.php',
	    type:'post',
	    dataType:'json',
	    async:false
	}).responseText;

	google.load('visualization', '1.0', {'packages':['corechart'], 'callback': dibujaGrafico});
	google.load('visualization', '1.0', {'packages':['geochart'], 'callback': dibujaGrafico2});

	function dibujaGrafico(){
	    var data = new google.visualization.DataTable(datos);
	    
	    var opciones = {
 		title: 'Estado de la web',
		is3D: 'true',
		backgroundColor: 'white',
		width:500,
		height:200
	    };

	    var grafico = new google.visualization.AreaChart(document.querySelector('#grafica'));
	    grafico.draw(data, opciones);
        };

	function dibujaGrafico2(){
	    var data = new google.visualization.DataTable(datos2);
	   
	    var opciones = {
 		region: 'ES',
		displayMode: 'markers',
		resolution: 'provinces',
		colorAxis: {colors: ['#00853f', 'black', '#e31b23']},
		backgroundColor: '#81d4fa',
		datalessRegionColor: '#f8bbd0',
		defaultColor: '#f5f5f5',
		width: '500',
		height: '300',
	    };

	    var grafico = new google.visualization.GeoChart(document.querySelector('#grafica2'));
	    grafico.draw(data, opciones);
        };

});
