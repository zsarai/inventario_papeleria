function cargarUnidades()
{
	$.ajax({
		url:"control/ctrl_uni_med.php?e=selectUnidades",
		type:"POST",
		data:null,
		contentType:false,
		processData:false,
		beforeSend:function(){
			$("#contenedor_buscador").html('<input type="text" name="busca" id="busqueda" onkeyup="buscarUnidad(this.value);" placeholder="Buscar ... ">');
			$.post('forms/frm_new_unimed.php',{},function(data){ 
				$("#contenedor_formulario").html(data); 
				crearFormularioUnidad();
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

function updateUnidad(id_uni_de_med)
{
	$.ajax({
		url:"control/ctrl_uni_med.php?e=getUnidad&id_uni_de_med="+id_uni_de_med,
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
				$("#txt_id_uni_de_med").prop('value',json.id_uni_de_med);
				$("#txt_desc_uni_med").prop('value',json.desc_uni_med);
				$("#modal_actualizar_unidad").modal('show');
			}
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
}
function deleteUnidad(id_uni_de_med)
{
	if(confirm("¿Realmente desea eliminar este registro?"))
	{
		$.ajax({
		url:"control/ctrl_uni_med.php?e=deleteUnidad&id_uni_de_med="+id_uni_de_med,
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
				cargarUnidades();
		},
		error:function(error){//se ejecuta en caso de un error
			$("#err").html(error);//se imprime el error en el elemento con id err
		}

	});
	}
}

function buscarUnidad(valor)
{
	$.ajax({
		url:"control/ctrl_uni_med.php?e=searchUnidades&valor="+valor,
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