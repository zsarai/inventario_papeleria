<?php 
include "conexion.php";
switch ($_GET['e']) {
	case 'selectRecursos': selectRecursos(); break;
	case 'searchRecursos': searchRecursos(); break;
	case 'insertRecurso': insertRecurso(); break;
	case 'getRecurso': getRecurso(); break;
	case 'updateRecurso': updateRecurso(); break;
	case 'deleteRecurso': deleteRecurso(); break;
}
function selectRecursos()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>Código</td>
	<td>Recurso</td>
	<td>
	Opciones
	</td>
	</tr>";
	$datos = select("SELECT * FROM recurso_prod");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['id_recurso']."</td>
		<td>".$fila['nombre_recurso']."</td>
		<td>
		<button title='Actualizar' onclick='updateRecurso(".$fila['id_recurso'].");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteRecurso(".$fila['id_recurso'].");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}

function getRecurso()
{
	$datos =select("SELECT * FROM recurso_prod WHERE id_recurso=".$_GET['id_recurso']);
	if($fila=mysqli_fetch_array($datos))
	{
		echo json_encode(array(
			'id_recurso' => $fila['id_recurso'],
			'nombre_recurso' => $fila['nombre_recurso'],
			'error' => '0'
			));
	}else{
		echo json_encode(array('error'=>'1','msg'=>'ocurrio un error'));
	}
}

function insertRecurso()
{
	if(insert("INSERT INTO recurso_prod (nombre_recurso) VALUES ('$_POST[nombre_recurso]');"))
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

function updateRecurso()
{
	if(update("UPDATE recurso_prod SET nombre_recurso='$_POST[nombre_recurso]' WHERE id_recurso = $_POST[id_recurso];"))
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
function deleteRecurso()
{
	if(update("DELETE FROM recurso_prod WHERE id_recurso=$_GET[id_recurso]"))
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

function searchRecursos()
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
	$datos = select("SELECT * FROM recurso_prod WHERE nombre_recurso LIKE '%$_GET[valor]%'");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['nombre_recurso']."</td>
		<td>
		<button title='Actualizar' onclick='updateRecurso(".$fila['id_recurso'].");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteRecurso(".$fila['id_recurso'].");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}


 ?>