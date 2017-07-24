<?php 
include "conexion.php";
switch ($_GET['e']) {
	case 'selectProductos': selectProductos(); break;
	case 'searchProductos': searchProductos(); break;
	case 'insertProducto': insertProducto(); break;
	case 'getProducto': getProducto(); break;
	case 'updateProducto': updateProducto(); break;
	case 'deleteProducto': deleteProducto(); break;
}
function selectProductos()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>Codigo del Producto</td>
	<td>Modelo</td>
	<td>Unidad de Medida</td>
	<td>Recurso</td>
	<td>Descripcion</td>
	<td>Observaciones</td>
	<td>Cantidad</td>
	<td>Estatus</td>
	<td>
	Opciones
	</td>
	</tr>";
	$datos = select("SELECT * FROM producto p 
		LEFT JOIN modelo_prod mop ON p.id_modelo_prod=mop.id_modelo_prod
		LEFT JOIN unidad_de_med_prod ump ON p.id_uni_de_med=ump.id_uni_de_med
		LEFT JOIN recurso_prod rp ON p.id_recurso=rp.id_recurso");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['cod_producto']."</td>
		<td>".$fila['desc_modelo_prod']."</td>
		<td>".$fila['desc_uni_med']."</td>
		<td>".$fila['nombre_recurso']."</td>
		<td>".$fila['desc_producto']."</td>
		<td>".$fila['obser_producto']."</td>
		<td>".$fila['recep_cant_proc']."</td>
		<td>".$fila['prod_rec_status']."</td>
		<td>
		<button title='Actualizar' onclick='updateProducto(\"".$fila['cod_producto']."\");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteProducto(\"".$fila['cod_producto']."\");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}

function getProducto()
{
	$datos = select("SELECT * FROM producto p 
		LEFT JOIN modelo_prod mop ON p.id_modelo_prod=mop.id_modelo_prod
		LEFT JOIN unidad_de_med_prod ump ON p.id_uni_de_med=ump.id_uni_de_med
		LEFT JOIN recurso_prod rp ON p.id_recurso=rp.id_recurso WHERE cod_producto=$_GET[cod_producto]");
	if($fila=mysqli_fetch_array($datos))
	{
		echo json_encode(array(
			'cod_producto' => $fila['cod_producto'],
			'id_modelo_prod' => $fila['id_modelo_prod'],
			'id_uni_de_med' => $fila['id_uni_de_med'],
			'id_recurso' => $fila['id_recurso'],
			'desc_producto' => $fila['desc_producto'],
			'obser_producto' => $fila['obser_producto'],
			'recep_cant_proc' => $fila['recep_cant_proc'],
			'prod_rec_status' => $fila['prod_rec_status'],
			'error' => '0'
			));
	}else{
		echo json_encode(array('error'=>'1','msg'=>'ocurrio un error'));
	}
}

function insertProducto()
{
	$consulta="INSERT INTO producto (cod_producto, id_modelo_prod, id_uni_de_med, id_recurso, desc_producto, obser_producto, recep_cant_proc, prod_rec_status) 
		VALUES ('$_POST[cod_producto]',
			$_POST[id_modelo_prod],
			$_POST[id_uni_de_med],
			$_POST[id_recurso],
			'$_POST[desc_producto]',
			'$_POST[obser_producto]',
			$_POST[recep_cant_proc],
			'$_POST[prod_rec_status]');";
	if(insert($consulta))
	{
		echo json_encode(array(
			'msg'=>'Se insertó con éxito',
			'error' =>'0'
		));
	}else{
		echo json_encode(array(
			'msg'=>'Ocurrió un error durante la operación '.$consulta,
			'error' =>'1'
		));
	}
}

function updateProducto()
{
	if(update("UPDATE producto SET 
		cod_producto ='$_POST[cod_producto]',
		id_modelo_prod =$_POST[id_modelo_prod],
		id_uni_de_med =$_POST[id_uni_de_med],
		id_recurso =$_POST[id_recurso],
		desc_producto ='$_POST[desc_producto]', 
		obser_producto ='$_POST[obser_producto]',
		recep_cant_proc =$_POST[recep_cant_proc],
		prod_rec_status='$_POST[prod_rec_status]'
		WHERE cod_producto = '$_POST[cod_producto]';"))
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
function deleteProducto()
{
	if(update("DELETE FROM producto WHERE cod_producto='$_GET[cod_producto]';"))
	{
		echo json_encode(array(
			'msg'=>'Se elimino con éxito',
			'error' =>'0'
		));
	}else{
		echo json_encode(array(
			'msg'=>'Ocurrió un error durante la operación',
			'error' =>'1','consulta'=>"DELETE FROM producto WHERE cod_producto=$_GET[cod_producto];"
		));
	}
}

function searchProductos()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>Codigo del Producto</td>
	<td>Modelo</td>
	<td>Unidad de Medida</td>
	<td>Recurso</td>
	<td>Descripcion</td>
	<td>Observaciones</td>
	<td>Cantidad</td>
	<td>Estatus</td>
	<td>
	Opciones
	</td>
	</tr>";
	$datos = select("SELECT * FROM producto p 
		LEFT JOIN modelo_prod mop ON p.id_modelo_prod=mop.id_modelo_prod
		LEFT JOIN unidad_de_med_prod ump ON p.id_uni_de_med=ump.id_uni_de_med
		LEFT JOIN recurso_prod rp ON p.id_recurso=rp.id_recurso WHERE desc_producto LIKE '%$_GET[valor]%'");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['cod_producto']."</td>
		<td>".$fila['desc_modelo_prod']."</td>
		<td>".$fila['desc_uni_med']."</td
		<td>".$fila['nombre_recurso']."</td>
		<td>".$fila['desc_producto']."</td
		<td>".$fila['obser_producto']."</td>
		<td>".$fila['recep_cant_proc']."</td>
		<td>".$fila['prod_rec_status']."</td
		<td>
		<button title='Actualizar' onclick='updateProducto(\"".$fila['cod_producto']."\");'>
		<span class='icon-loop2'></span>
		</button>
		<button title='Eliminar' onclick='deleteProducto(\"".$fila['cod_producto']."\");'>
		<span class='icon-bin'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}


 ?>