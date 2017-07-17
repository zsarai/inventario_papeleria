function cargarGenerarSolicitudes()
{
	$.post('forms/frm_generar_solicitudes.php',{},function(data){ 
		$("#contenedor").html(data);
		$("#contenedor_formulario").html('');
		$("#contenedor_buscador").html('<input type="text" name="busca" id="busqueda" onkeyup="buscarProductoSolicitud(this.value);" placeholder="Buscar ... ">');
		var id_area = $("#cbo_areas").prop('value');
		$.post('control/ctrl_solicitud.php?e=cargarUsuarios',{id_area:id_area},function(data){ 
			$("#cbo_users").html(data); 
		});
		//setTimeout(function(){
		$.post('control/ctrl_solicitud.php?e=sesionUsuario',{
			pers_cod:$("#cbo_users").prop('value'),
			are_cod:$("#cbo_areas").prop('value')

			},function(data){ console.log(data);});
		//},1000);
	});
}
function cargarUsuarios(id_area)
{
	$.post('control/ctrl_solicitud.php?e=cargarUsuarios',{id_area:id_area},function(data){ $("#cbo_users").html(data); });
}
function selectUsuario()
{
	setTimeout(function(){
	$.post('control/ctrl_solicitud.php?e=sesionUsuario',{
			pers_cod:$("#cbo_users").prop('value'),
			are_cod:$("#cbo_areas").prop('value')
		},function(data){ console.log(data); });
	},1000);
}
function buscarProductoSolicitud(valor)
{

}