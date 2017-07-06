<?php 
include "conexion.php";
switch ($_GET['e']) {
	case 'selectUnidades': selectUnidades(); break;
	case 'searchUnidades': searchUnidades(); break;
	case 'insertUnidad': insertUnidad(); break;
	case 'getUnidad': getUnidad(); break;
	case 'updateUnidad': updateUnidad(); break;
	case 'deleteUnidad': deleteUnidad(); break;
}
function selectUnidades()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>Código</td>
	<td>Unidad de Medida</td>
	<td>
	Opciones
	</td>
	</tr>";
	$datos = select("SELECT * FROM unidad_de_med_prod");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['cod_uni_med']."</td>
		<td>".$fila['desc_uni_med']."</td>
		<td>
		<button title='Actualizar' onclick='updateUnidad(".$fila['id_uni_de_med'].");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteUnidad(".$fila['id_uni_de_med'].");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}

function getUnidad()
{
	$datos =select("SELECT * FROM unidad_de_med_prod WHERE id_uni_de_med=".$_GET['id_uni_de_med']);
	if($fila=mysqli_fetch_array($datos))
	{
		echo json_encode(array(
			'id_uni_de_med' => $fila['id_uni_de_med'],
			'cod_uni_med' => $fila ['cod_uni_med'],
			'desc_uni_med' => $fila['desc_uni_med'],
			'error' => '0'
			));
	}else{
		echo json_encode(array('error'=>'1','msg'=>'ocurrio un error'));
	}
}

function insertUnidad()
{
	if(insert("INSERT INTO unidad_de_med_prod (cod_uni_med,desc_uni_med) VALUES ('$_POST[cod_uni_med]','$_POST[desc_uni_med]');"))
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

function updateUnidad()
{
	if(update("UPDATE unidad_de_med_prod SET cod_uni_med ='$_POST[cod_uni_med]', desc_uni_med='$_POST[desc_uni_med]' WHERE id_uni_de_med = $_POST[id_uni_de_med];"))
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
function deleteUnidad()
{
	if(update("DELETE FROM unidad_de_med_prod WHERE id_uni_de_med=$_GET[id_uni_de_med]"))
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

function searchUnidades()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>Código</td>
	<td>Marca</td>
	<td>
	Opciones
	</td>
	</tr>";
	$datos = select("SELECT * FROM unidad_de_med_prod WHERE desc_uni_med LIKE '%$_GET[valor]%'");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['cod_uni_med']."</td>
		<td>".$fila['desc_uni_med']."</td>
		<td>
		<button title='Actualizar' onclick='updateUnidad(".$fila['id_uni_de_med'].");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteUnidad(".$fila['id_uni_de_med'].");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}


 ?>