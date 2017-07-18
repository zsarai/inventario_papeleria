function cargarGenerarSolicitudes()
{
	$.post('forms/frm_generar_solicitudes.php',{},function(data){ 
		$("#contenedor_formulario").html(data);
		$("#contenedor_buscador").html('<input type="text" name="busca" id="busqueda" onkeyup="buscarProductoSolicitud(this.value);" placeholder="Buscar ... ">');
		var id_area = $("#cbo_areas").prop('value');
		$.post('control/ctrl_solicitud.php?e=cargarUsuarios',{id_area:id_area},function(data){ 
			$("#cbo_users").html(data); 
		});
		$.post('control/ctrl_solicitud.php?e=sesionUsuario',{
			pers_cod:$("#cbo_users").prop('value'),
			are_cod:$("#cbo_areas").prop('value')

			},function(data){ });
		$.post('control/ctrl_solicitud.php?e=selectProductos',{},function(data){
			$("#contenedor").html(data);
		});
	});
}
function cargarUsuarios(id_area)
{
	$.post('control/ctrl_solicitud.php?e=cargarUsuarios',{id_area:id_area},function(data){ $("#cbo_users").html(data); });
}
function selectUsuario(pers_cod)
{
	$.post('control/ctrl_solicitud.php?e=sesionUsuario',{
			pers_cod:pers_cod,
			are_cod:$("#cbo_areas").prop('value')
		},function(data){  });
}
function buscarProductoSolicitud(valor)
{
	$.post('control/ctrl_solicitud.php?e=buscarProductoSolicitud',{valor:valor},function(data){
			$("#contenedor").html(data);
		});
}
var contadorProducto=0;
function agregarProducto(cod_producto)
{
	var cantidad=$("#txt_cant_prd_"+cod_producto).prop('value');
	$.post('control/ctrl_solicitud.php?e=agregarProducto',{
		contadorProducto:contadorProducto,
		cod_producto:cod_producto,
		cantidad:cantidad
	},function(data){
		showMensaje("Producto agregado");
		contadorProducto++;
	});
	
}
function verSolicitud()
{
	if(contadorProducto<=0)
	{
		showMensaje("No hay productos seleccionados.");
	}else{
		$.post('control/ctrl_solicitud.php?e=verProductos',{},function(data){
		$("#contenedor_solicitud").html(data);
		$("#modal_ver_solicitud").modal('show');
	});
}
}
function imprimirSolicitud()
{
	if(confirm("¿Confirmar el envio de información?"))
	{
		$.post('control/ctrl_solicitud.php?e=insertSolicitud',{},function(data){
			window.open("control/pdf_solicitud.php?id_resguardo="+data);
			$.post('control/ctrl_solicitud.php?e=eliminarSesion',{
			},function(data){
				$("#modal_ver_solicitud").modal('hide');
				contadorProducto=0;
				cargarGenerarSolicitudes();
			});
			
		});
	}
}
function eliminarItem(valor)
{
	$.post('control/ctrl_solicitud.php?e=eliminarItem',{valor:valor},function(data){
		verSolicitud();
		contadorProducto--;
	});

	
}
function cancelarSolicitud()
{
	if(confirm("¿Neta?"))
	{
		$.post('control/ctrl_solicitud.php?e=eliminarSesion',{
		},function(data){
			$("#modal_ver_solicitud").modal('hide');
			showMensaje("La solicitud ha sido cancelada!!!");
			contadorProducto=0;
			cargarGenerarSolicitudes();
		});
	}
	
}