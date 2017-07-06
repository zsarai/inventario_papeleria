<?php 
include "conexion.php";
switch ($_GET['e']) {
	case 'selectModelos': selectModelos(); break;
	case 'searchModelos': searchModelos(); break;
	case 'insertModelo': insertModelo(); break;
	case 'getModelo': getModelo(); break;
	case 'updateModelo': updateModelo(); break;
	case 'deleteModelo': deleteModelo(); break;
}
function selectModelos()
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
	$datos = select("SELECT * FROM modelo_prod mop 
		LEFT JOIN marca_prod map ON mop.id_marca_prod=map.id_marca_prod
		LEFT JOIN tipo_prod tp ON mop.id_tipo_prod=tp.id_tipo_prod");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['desc_marca_prod']."</td>
		<td>".$fila['desc_tipo_prod']."</td>
		<td>".$fila['cod_modelo_prod']."</td>
		<td>".$fila['desc_modelo_prod']."</td>
		<td>
		<button title='Actualizar' onclick='updateModelo(".$fila['id_modelo_prod'].");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteModelo(".$fila['id_modelo_prod'].");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}

function getModelo()
{
	$datos = select("SELECT * FROM modelo_prod mop 
		LEFT JOIN marca_prod map ON mop.id_marca_prod=map.id_marca_prod
		LEFT JOIN tipo_prod tp ON mop.id_tipo_prod=tp.id_tipo_prod WHERE id_modelo_prod=$_GET[id_modelo_prod]");
	if($fila=mysqli_fetch_array($datos))
	{
		echo json_encode(array(
			'id_modelo_prod' => $fila['id_modelo_prod'],
			'id_marca_prod' => $fila['id_marca_prod'],
			'id_tipo_prod' => $fila['id_tipo_prod'],
			'cod_modelo_prod' => $fila ['cod_modelo_prod'],
			'desc_modelo_prod' => $fila['desc_modelo_prod'],
			'error' => '0'
			));
	}else{
		echo json_encode(array('error'=>'1','msg'=>'ocurrio un error'));
	}
}

function insertModelo()
{
	if(insert("INSERT INTO modelo_prod (id_marca_prod,id_tipo_prod, cod_modelo_prod, desc_modelo_prod) VALUES ($_POST[id_marca_prod],$_POST[id_tipo_prod],'$_POST[cod_modelo_prod]','$_POST[desc_modelo_prod]');"))
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

function updateModelo()
{
	if(update("UPDATE modelo_prod SET 
		id_marca_prod =$_POST[id_marca_prod], 
		id_tipo_prod =$_POST[id_tipo_prod],
		cod_modelo_prod ='$_POST[cod_modelo_prod]', 
		desc_modelo_prod='$_POST[desc_modelo_prod]'
		WHERE id_modelo_prod = $_POST[id_modelo_prod];"))
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
function deleteModelo()
{
	if(update("DELETE FROM modelo_prod WHERE id_modelo_prod=$_GET[id_modelo_prod]"))
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

function searchModelos()
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
	$datos = select("SELECT * FROM modelo_prod mop 
		LEFT JOIN marca_prod map ON mop.id_marca_prod=map.id_marca_prod
		LEFT JOIN tipo_prod tp ON mop.id_tipo_prod=tp.id_tipo_prod WHERE desc_modelo_prod LIKE '%$_GET[valor]%'");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['desc_marca_prod']."</td>
		<td>".$fila['desc_tipo_prod']."</td>
		<td>".$fila['cod_modelo_prod']."</td>
		<td>".$fila['desc_modelo_prod']."</td>
		<td>
		<button title='Actualizar' onclick='updateModelo(".$fila['id_modelo_prod'].");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteModelo(".$fila['id_modelo_prod'].");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}


 ?>