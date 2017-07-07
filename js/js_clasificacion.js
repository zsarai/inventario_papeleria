function cargarClasificaciones()
{
	$.ajax({
		url:"control/ctrl_clasif.php?e=selectClasificaciones",
		type:"POST",
		data:null,
		contentType:false,
		processData:false,
		beforeSend:function(){
			$("#contenedor_buscador").html('<input type="text" name="busca" id="busqueda" onkeyup="buscarClasificacion(this.value);" placeholder="Buscar ... ">');
			$.post('forms/frm_new_clasificacion.php',{},function(data){ 
				$("#contenedor_formulario").html(data); 
				crearFormularioClasificacion();
			});
			

		},
		success:function(data){//se ejecuta si todo salio correctamente

			if(data=='invalid')//si la respuesta del servidor es invalida se imprime un mensaje en el elemento con id err
			{
				$("#err").html('invalid file!');
			}else{//si no se imprime la informacion en el elemendo con id contenedor
				$("#contenedor").html(data);
			}
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
}

function updateClasificacion(id_clasif_prod)
{
	$.ajax({
		url:"control/ctrl_clasif.php?e=getClasificacion&id_clasif_prod="+id_clasif_prod,
		type:"POST",//método de envio de informacion  POST/GET
		data:null,//datos q se van a enviar
		contentType:false,
		processData:false,
		beforeSend:function(){//se ejecuta antes de enviar la información

		},
		success:function(data){//se ejecuta si todo salio correctamente
			
			if(data=='invalid')//si la respuesta del servidor es invalida se imprime un mensaje en el elemento con id err
			{
				$("#err").html('invalid file!');
			}else{//si no se imprime la informacion en el elemendo con id contenedor
				var json = $.parseJSON(data);
				$("#txt_id_clasif_prod").prop('value',json.id_clasif_prod);
				$("#txt_desc_clasif_prod").prop('value',json.desc_clasif_prod);
				$("#modal_actualizar_clasif").modal('show');
			}
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
}
function deleteClasificacion(id_clasif_prod)
{
	if(confirm("¿Realmente desea eleminar este registro?"))
	{
		$.ajax({
		url:"control/ctrl_clasif.php?e=deleteClasificacion&id_clasif_prod="+id_clasif_prod,
		type:"POST",//método de envio de informacion  POST/GET
		data:null,//datos q se van a enviar
		contentType:false,
		processData:false,
		beforeSend:function(){//se ejecuta antes de enviar la información
			showMensaje("Enviando información...");
		},
		success:function(data){//se ejecuta si todo salio correctamente
			var json = $.parseJSON(data);
				if(json.error<=0)
				{
					$("#err").html(json.msg);
					$("#err").css('background-color', 'green');
				}else{
					$("#err").html(json.msg);					
					$("#err").css('background-color', 'orange');
				}
				showMensaje(json.msg);
				cargarClasificaciones();
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
	}
}

function buscarClasificacion(valor)
{
	$.ajax({
		url:"control/ctrl_clasif.php?e=searchClasificaciones&valor="+valor,
		type:"POST",
		data:null,
		contentType:false,
		processData:false,
		beforeSend:function(){

		},
		success:function(data){
			$("#contenedor").html(data);
		},
		error:function(error){
			$("#err").html(error);
		}

	});
}