<?php 
include "conexion.php";
switch ($_GET['e']) {
	case 'selectClasificaciones': selectClasificaciones(); break;
	case 'searchClasificaciones': searchCalsificaciones(); break;
	case 'insertClasificacion': insertClasificacion(); break;
	case 'getClasificacion': getClasificacion(); break;
	case 'updateClasificacion': updateClasificacion(); break;
	case 'deleteClasificacion': deleteClasificacion(); break;
}
function selectClasificaciones()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>Código de Clasificacion</td>
	<td>Nombre de la Clasificacion</td>
	<td>
	Opciones
	</td>
	</tr>";
	$datos = select("SELECT * FROM clasif_del_prod");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['id_clasif_prod']."</td>
		<td>".$fila['desc_clasif_prod']."</td>
		<td>
		<button title='Actualizar' onclick='updateClasificacion(".$fila['id_clasif_prod'].");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteClasificacion(".$fila['id_clasif_prod'].");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}

function getClasificacion()
{
	$datos =select("SELECT * FROM clasif_del_prod WHERE id_clasif_prod=".$_GET['id_clasif_prod']);
	if($fila=mysqli_fetch_array($datos))
	{
		echo json_encode(array(
			'id_clasif_prod' => $fila['id_clasif_prod'],
			'desc_clasif_prod' => $fila['desc_clasif_prod'],
			'error' => '0'
			));
	}else{
		echo json_encode(array('error'=>'1','msg'=>'ocurrio un error'));
	}
}

function insertClasificacion()
{
	if(insert("INSERT INTO clasif_del_prod (desc_clasif_prod) VALUES ('$_POST[desc_clasif_prod]');"))
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

function updateClasificacion()
{
	if(update("UPDATE clasif_del_prod SET desc_clasif_prod='$_POST[desc_clasif_prod]' 
		WHERE id_clasif_prod = $_POST[id_clasif_prod];"))
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
function deleteClasificacion()
{
	if(update("DELETE FROM clasif_del_prod WHERE id_clasif_prod=$_GET[id_clasif_prod]"))
	{
		echo json_encode(array(
			'msg'=>'Se elimino con éxito',
			'error' =>'0'
		));
	}else{
		echo json_encode(array(
			'msg'=>'Ocurrió un error durante la operación',
			'error' =>'1'
		));
	}
}

function searchClasificaciones()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>Clasificacion</td>
	<td>
	Opciones
	</td>
	</tr>";
	$datos = select("SELECT * FROM clasif_del_prod WHERE desc_clasif_prod LIKE '%$_GET[valor]%'");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['desc_clasif_prod']."</td>
		<td>
		<button title='Actualizar' onclick='updateClasificacion(".$fila['id_clasif_prod'].");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteClasificacion(".$fila['id_clasif_prod'].");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}


 ?>