$(document).ready(init);

function init()
{
	
	cargarMarcas();

	//Formulario de Insertar clasificacion
	$("#frm_new_clasificacion").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_clasif.php?e=insertClasificacion',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarClasificaciones();
				$("#frm_new_clasificacion")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});

	//Formulario de actualizar clasificacion
	$("#frm_actualizar_clasificacion").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_clasif.php?e=updateClasificacion',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				$("#modal_actualizar_clasif").modal('hide');
				showMensaje(json.msg);
				cargarClasificaciones();
				$("#frm_actualizar_clasificacion")[0].reset();

			},
			error:function(error){
				$("#err").html(error);
					$("#err").css('background-color', 'green');
			}
		});
	});	

	//Formulario de Insertar unidad de medida
	$("#frm_new_unimed").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_uni_med.php?e=insertUnidad',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarUnidades();
				$("#frm_new_unimed")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});

	//Formulario de actualizar unidad de medida
	$("#frm_actualizar_unimed").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_uni_med.php?e=updateUnidad',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				$("#modal_actualizar_unidad").modal('hide');
				showMensaje(json.msg);
				cargarUnidades();
				$("#frm_actualizar_unidad")[0].reset();

			},
			error:function(error){
				$("#err").html(error);
					$("#err").css('background-color', 'green');
			}
		});
	});	


	//Formulario de InsertarRecurso
	$("#frm_new_recurso").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_recurso.php?e=insertRecurso',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarRecursos();
				$("#frm_new_recurso")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});

	//Formulario de actualizar recurso
	$("#frm_actualizar_recurso").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_recurso.php?e=updateRecurso',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				$("#modal_actualizar_recurso").modal('hide');
				showMensaje(json.msg);
				cargarRecursos();
				$("#frm_actualizar_recurso")[0].reset();

			},
			error:function(error){
				$("#err").html(error);
					$("#err").css('background-color', 'green');
			}
		});
	});	

	//Formulario de actualizar tipo
	$("#frm_actualizar_tipo").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_tipo.php?e=updateTipo',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				$("#modal_actualizar_tipo").modal('hide');
				showMensaje(json.msg);
				cargarTipos();
				$("#frm_actualizar_tipo")[0].reset();

			},
			error:function(error){
				$("#err").html(error);
					$("#err").css('background-color', 'green');
			}
		});
	});	
	//inicializa el formulario de insertTipo
	$("#frm_new_tipo").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_tipo.php?e=insertTipo',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarTipos();
				$("#frm_new_tipo")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});
		//Formulario de actualizar modelo
	$("#frm_actualizar_modelo").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_modelo.php?e=updateModelo',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				//console.log(data);
				var json = $.parseJSON(data);
				$("#modal_actualizar_modelo").modal('hide');
				showMensaje(json.msg);
				cargarModelos();
				$("#frm_actualizar_modelo")[0].reset();

			},
			error:function(error){
				$("#err").html(error);
					$("#err").css('background-color', 'green');
			}
		});
	});	

	//inicializa el formulario de insertModelo
	$("#frm_new_modelo").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_modelo.php?e=insertModelo',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarModelos();
				$("#frm_new_marca")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});
	//__________________________________________
	//inicializa el formulario de insertMarca
	$("#frm_new_marca").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_marca.php?e=insertMarca',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarMarcas();
				$("#frm_new_marca")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});
	//__________________________________________
	//Formulario de actualizar marca
	$("#frm_actualizar_marca").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_marca.php?e=updateMarca',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				var json = $.parseJSON(data);
				$("#modal_actualizar_marca").modal('hide');
				showMensaje(json.msg);
				cargarMarcas();
				$("#frm_actualizar_marca")[0].reset();

			},
			error:function(error){
				$("#err").html(error);
					$("#err").css('background-color', 'green');
			}
		});
	});	
}

function showMensaje(texto)
{
	$("#lbl_mensaje").text(texto);
	$("#modal_mensaje").modal('show');
	setTimeout(function(){
		$("#lbl_mensaje").text('');
		$("#modal_mensaje").modal('hide');
	},2000);
}

function crearFormularioMarca()
{
	$("#frm_new_marca").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_marca.php?e=insertMarca',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarMarcas();
				$("#frm_new_marca")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});
	//__________________________________________
}
function crearFormularioModelo()
{
	//inicializa el formulario de insertModelo
	$("#frm_new_modelo").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_modelo.php?e=insertModelo',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarModelos();
				$("#frm_new_modelo")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});
	//__________________________________________
}
function crearFormularioTipo()
{
	//inicializa el formulario de insertModelo
	$("#frm_new_tipo").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_tipo.php?e=insertTipo',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarTipos();
				$("#frm_new_tipo")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});	
}

//__________________________________________
function crearFormularioRecurso()
{
	$("#frm_new_recurso").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_recurso.php?e=insertRecurso',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarRecursos();
				$("#frm_new_recurso")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});
}

//________________________________________________

function crearFormularioUnidad()
{
	$("#frm_new_unimed").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_uni_med.php?e=insertUnidad',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarUnidades();
				$("#frm_new_unimed")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});
}
//__________________________________________
function crearFormularioClasificacion()
{
	$("#frm_new_clasificacion").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'control/ctrl_clasif.php?e=insertClasificacion',
			type: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			beforeSend:function(){
				showMensaje('Enviando información...');
			},
			success:function(data){
				console.log(data);
				var json = $.parseJSON(data);
				showMensaje(json.msg);
				cargarClasificaciones();
				$("#frm_new_clasificacion")[0].reset();
			},
			error:function(error){
				console.log(error);
			}
		});
	});
}