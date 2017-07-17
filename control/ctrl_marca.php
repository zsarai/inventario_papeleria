<?php 
include "conexion.php";
switch ($_GET['e']) { 
	case 'selectMarcas': selectMarcas(); break;
	case 'searchMarcas': searchMarcas(); break;
	case 'insertMarca': insertMarca(); break;
	case 'getMarca': getMarca(); break;
	case 'updateMarca': updateMarca(); break;
	case 'deleteMarca': deleteMarca(); break;
}
function selectMarcas()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>Código de la Marca</td> 
	<td>Nombre de la Marca</td>
	<td>
	Opciones 
	</td>
	</tr>";
	$datos = select("SELECT * FROM marca_prod"); 
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['id_marca_prod']."</td> 
		<td>".$fila['desc_marca_prod']."</td>
		<td>
		<button title='Actualizar' onclick='updateMarca(".$fila['id_marca_prod'].");'> 
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteMarca(".$fila['id_marca_prod'].");'> 
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}

function getMarca()
{
	$datos =select("SELECT * FROM marca_prod WHERE id_marca_prod=".$_GET['id_marca_prod']);
	if($fila=mysqli_fetch_array($datos))
	{
		echo json_encode(array(
			'id_marca_prod' => $fila['id_marca_prod'],
			'desc_marca_prod' => $fila['desc_marca_prod'],
			'error' => '0'
			));
	}else{
		echo json_encode(array('error'=>'1','msg'=>'ocurrio un error'));
	}
}

function insertMarca()
{
	if(insert("INSERT INTO marca_prod (desc_marca_prod) VALUES ('$_POST[desc_marca_prod]');"))
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

function updateMarca()
{
	if(update("UPDATE marca_prod SET desc_marca_prod='$_POST[desc_marca_prod]' WHERE id_marca_prod = $_POST[id_marca_prod];"))
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
function deleteMarca()
{
	if(update("DELETE FROM marca_prod WHERE id_marca_prod=$_GET[id_marca_prod]"))
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

function searchMarcas()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>Marca</td>
	<td>
	Opciones
	</td>
	</tr>";
	$datos = select("SELECT * FROM marca_prod WHERE desc_marca_prod LIKE '%$_GET[valor]%'");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['desc_marca_prod']."</td>
		<td>
		<button title='Actualizar' onclick='updateMarca(".$fila['id_marca_prod'].");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteMarca(".$fila['id_marca_prod'].");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}


 ?>