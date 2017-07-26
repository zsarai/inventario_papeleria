//$(document).ready(pagination(1));
function cargarReportes()
{
	$.post('forms/frm_reporte.php',{},function(data){ 
		$("#contenedor_formulario").html(data);
		$("#contenedor_buscador").html('<input type="text" name="busca" id="busqueda" onkeyup="buscarResguardo(this.value);" placeholder="Buscar ... ">');
		
		$.post('control/ctrl_reportes.php?e=selectResguardos',{},function(data){
			$("#contenedor").html(data);
		});
	});
}

$(function(){
	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = 'control/buscaReportes.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
});


function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('control/ctrl_reportes.php?desde='+desde+'&hasta='+hasta);
}

/*function pagination(partida){
	var url = '../php/paginarProductos.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}*/



