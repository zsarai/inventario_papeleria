function cargarRecursos()
{
	$.ajax({
		url:"control/ctrl_recurso.php?e=selectRecursos",
		type:"POST",
		data:null,
		contentType:false,
		processData:false,
		beforeSend:function(){
			$("#contenedor_buscador").html('<input type="text" name="busca" id="busqueda" onkeyup="buscarRecurso(this.value);" placeholder="Buscar ... ">');
			$.post('forms/frm_new_recurso.php',{},function(data){ 
				$("#contenedor_formulario").html(data); 
				crearFormularioRecurso();
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

function updateRecurso(id_recurso)
{
	$.ajax({
		url:"control/ctrl_recurso.php?e=getRecurso&id_recurso="+id_recurso,
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
				$("#txt_id_recurso").prop('value',json.id_recurso);
				$("#txt_nombre_recurso").prop('value',json.nombre_recurso);
				$("#modal_actualizar_recurso").modal('show');
			}
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
}
function deleteRecurso(id_recurso)
{
	if(confirm("¿Realmente desea eliminar este registro?"))
	{
		$.ajax({
		url:"control/ctrl_recurso.php?e=deleteRecurso&id_recurso="+id_recurso,
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
				cargarRecursos();
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
	}
}

function buscarRecurso(valor)
{
	$.ajax({
		url:"control/ctrl_recurso.php?e=searchRecursos&valor="+valor,
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