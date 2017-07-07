<?php 
include "conexion.php";
switch ($_GET['e']) {
	case 'selectTipos': selectTipos(); break;
	case 'searchTipos': searchTipos(); break;
	case 'insertTipo': insertTipo(); break;
	case 'getTipo': getTipo(); break;
	case 'updateTipo': updateTipo(); break;
	case 'deleteTipo': deleteTipo(); break;
}
function selectTipos()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>Clasificación</td>
	<td>Codigo</td>
	<td>Tipo</td>
	<td>
	Opciones
	</td>
	</tr>";
	$datos = select("SELECT * FROM tipo_prod tp LEFT JOIN clasif_del_prod cdp ON tp.id_clasif_prod=cdp.id_clasif_prod");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['desc_clasif_prod']."</td>
		<td>".$fila['id_tipo_prod']."</td>
		<td>".$fila['desc_tipo_prod']."</td>
		<td>
		<button title='Actualizar' onclick='updateTipo(".$fila['id_tipo_prod'].");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteTipo(".$fila['id_tipo_prod'].");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}

function getTipo()
{
	$datos = select("SELECT * FROM tipo_prod tp LEFT JOIN clasif_del_prod cdp ON tp.id_clasif_prod=cdp.id_clasif_prod WHERE id_tipo_prod=$_GET[id_tipo_prod]");
	if($fila=mysqli_fetch_array($datos))
	{
		echo json_encode(array(
			'id_tipo_prod' => $fila['id_tipo_prod'],
			'id_clasif_prod' => $fila['id_clasif_prod'],
			'desc_tipo_prod' => $fila ['desc_tipo_prod'],
			'error' => '0'
			));
	}else{
		echo json_encode(array('error'=>'1','msg'=>'ocurrio un error'));
	}
}

function insertTipo()
{
	if(insert("INSERT INTO tipo_prod (id_clasif_prod,cod_tipo_prod,desc_tipo_prod) VALUES (
		$_POST[id_clasif_prod],'$_POST[desc_tipo_prod]')"))
	{
		echo json_encode(array(
			'msg'=>'Se insertó con éxito',
			'error' =>'0'
		));
	}else{
		echo json_encode(array(
			'msg'=>'Ocurrió un error durante la operación',
			'error' =>'1'
		));
	}
}

function updateTipo()
{
	if(update("UPDATE tipo_prod SET 
		id_clasif_prod =$_POST[id_clasif_prod], 
		desc_tipo_prod ='$_POST[desc_tipo_prod]'
		WHERE id_tipo_prod = $_POST[id_tipo_prod];"))
	{
		echo json_encode(array(
			'msg'=>'Se actualizo con éxito',
			'error' =>'0'
		));
	}else{
		echo json_encode(array(
			'msg'=>'Ocurrió un error durante la operación',
			'error' =>'1'
		));
	}
}
function deleteTipo()
{
	if(update("DELETE FROM tipo_prod WHERE id_tipo_prod=$_GET[id_tipo_prod]"))
	{
		echo json_encode(array(
			'msg'=>'Se elimino con éxito',
			'error' =>'0'
		));
	}else{
		echo json_encode(array(
			'msg'=>'Ocurrió un error durante la operación',
			'error' =>'1','consulta'=>"DELETE FROM modelo_prod WHERE id_modelo_prod=$_GET[id_modelo_prod]"
		));
	}
}

function searchTipos()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>Marca</td>
	<td>Tipo</td>
	<td>Código</td>
	<td>Modelo</td>
	<td>
	Opciones
	</td>
	</tr>";
	$datos = select("SELECT * FROM tipo_prod tp LEFT JOIN clasif_del_prod cdp ON tp.id_clasif_prod=cdp.id_clasif_prod WHERE desc_tipo_prod LIKE '%$_GET[valor]%'");

	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['desc_clasif_prod']."</td>
		<td>".$fila['desc_tipo_prod']."</td>
		<td>
		<button title='Actualizar' onclick='updateTipo(".$fila['id_tipo_prod'].");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteTipo(".$fila['id_tipo_prod'].");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}


 ?>