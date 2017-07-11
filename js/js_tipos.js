function cargarTipos()
{
	$.ajax({
		url:"control/ctrl_tipo.php?e=selectTipos",
		type:"POST",
		data:null,
		contentType:false,
		processData:false,
		beforeSend:function(){
			$("#contenedor_buscador").html('<input type="text" name="busca" id="busqueda" onkeyup="buscarTipo(this.value);" placeholder="Buscar ... ">');
			$.post('forms/frm_new_tipo.php',{},function(data){ 
				$("#contenedor_formulario").html(data); 
				crearFormularioTipo();
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

function updateTipo(id_tipo_prod)
{
	$.ajax({
		url:"control/ctrl_tipo.php?e=getTipo&id_tipo_prod="+id_tipo_prod,
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
				//console.log(json);
				$("#txt_id_tipo_prod").prop('value',json.id_tipo_prod);
				$("#cbo_id_clasif_prod").prop('value',json.id_clasif_prod);
				$("#txt_desc_tipo_prod").prop('value',json.desc_tipo_prod);
				$("#modal_actualizar_tipo").modal('show');
			}
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
}
function deleteTipo(id_tipo_prod)
{
	if(confirm("¿Realmente desea eliminar este registro?"))
	{
		$.ajax({
		url:"control/ctrl_tipo.php?e=deleteTipo&id_tipo_prod="+id_tipo_prod,
		type:"POST",//método de envio de informacion  POST/GET
		data:null,//datos q se van a enviar
		contentType:false,
		processData:false,
		beforeSend:function(){//se ejecuta antes de enviar la información
			showMensaje("Enviando información...");
		},
		success:function(data){//se ejecuta si todo salio correctamente
			var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarTipos();
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
	}
}

function buscarTipo(valor)
{
	$.ajax({
		url:"control/ctrl_tipo.php?e=searchTipos&valor="+valor,
		type:"POST",
		data:null,
		contentType:false,
		processData:false,
		beforeSend:function(){

		},
		success:function(data){
			console.log(data);
			$("#contenedor").html(data);
		},
		error:function(error){
			$("#err").html(error);
		}

	});
}