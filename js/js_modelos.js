function cargarModelos()
{
	$.ajax({
		url:"control/ctrl_modelo.php?e=selectModelos",
		type:"POST",//método de envio de informacion  POST/GET
		data:null,//datos q se van a enviar
		contentType:false,
		processData:false,
		beforeSend:function(){//se ejecuta antes de enviar la información
			$("#contenedor_buscador").html('<input type="text" name="busca" id="busqueda" onkeyup="buscarModelo(this.value);" placeholder="Buscar ... ">');
			$.post('forms/frm_new_modelo.php',{},function(data){ 
				$("#contenedor_formulario").html(data); 
				crearFormularioModelo();
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

function buscarModelo(valor)
{
	$.ajax({
		url:"control/ctrl_modelo.php?e=searchModelos&valor="+valor,
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
				$("#contenedor").html(data);
			}
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
}

function updateModelo(id_modelo_prod)
{
	$.ajax({
		url:"control/ctrl_modelo.php?e=getModelo&id_modelo_prod="+id_modelo_prod,
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
				$("#txt_id_modelo_prod").prop('value',json.id_modelo_prod);
				$("#cbo_id_marca_prod").prop('value',json.id_marca_prod);
				$("#cbo_id_tipo_prod").prop('value',json.id_tipo_prod);
				$("#txt_desc_modelo_prod").prop('value',json.desc_modelo_prod);
				$("#modal_actualizar_modelo").modal('show');
			}
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
}
function deleteModelo(id_modelo_prod)
{
	if(confirm("¿Realmente desea eleminar este registro?"))
	{
		$.ajax({
		url:"control/ctrl_modelo.php?e=deleteModelo&id_modelo_prod="+id_modelo_prod,
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
				cargarModelos();
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
	}
}
