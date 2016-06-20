$(function(){
	$('#search_form').submit(function(e){
		e.preventDefault();
	})
	$('#search').keyup(function(){
		var envio = $('#search').val();
		$('#resultados').html();
		$.ajax({
			type: 'POST',
			url: 'php/busqueda2.php',
			data: ('search'+envio),
			success: function(resp){
				if (resp!=""){
					$('#resultados').html(resp);
				}
			}
		})
	})
})
