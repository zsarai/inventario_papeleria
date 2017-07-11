function cargarProductos()
{
	$.ajax({
		url:"control/ctrl_producto.php?e=selectProductos",
		type:"POST",//método de envio de informacion  POST/GET
		data:null,//datos q se van a enviar
		contentType:false,
		processData:false,
		beforeSend:function(){//se ejecuta antes de enviar la información
			$("#contenedor_buscador").html('<input type="text" name="busca" id="busqueda" onkeyup="buscarProducto(this.value);" placeholder="Buscar ... ">');
			$.post('forms/frm_new_producto.php',{},function(data){ 
				$("#contenedor_formulario").html(data); 
				crearFormularioProducto();
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

function buscarProducto(valor)
{
	$.ajax({
		url:"control/ctrl_producto.php?e=searchProductos&valor="+valor,
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

function updateProducto(cod_producto)
{
	$.ajax({
		url:"control/ctrl_producto.php?e=getProducto&cod_producto="+cod_producto,
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
				$("#txt_cod_producto").prop('value',json.cod_producto);
				$("#cbo_id_modelo_prod").prop('value',json.id_modelo_prod);
				$("#cbo_id_uni_de_med").prop('value',json.id_uni_de_med);
				$("#txt_id_recurso").prop('value',json.id_recurso);
				$("#txt_desc_producto").prop('value',json.desc_producto);
				$("#cbo_obser_producto").prop('value',json.obser_producto);
				$("#cbo_recep_cant_proc").prop('value',json.recep_cant_proc);
				$("#txt_prod_rec_status").prop('value',json.prod_rec_status);
				$("#modal_actualizar_producto").modal('show');
			}
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
}
function deleteProducto(cod_producto)
{
	if(confirm("¿Realmente desea eleminar este registro?"))
	{
		$.ajax({
		url:"control/ctrl_producto.php?e=deleteProducto&cod_producto="+cod_producto,
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
				cargarProductos();
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
	}
}
