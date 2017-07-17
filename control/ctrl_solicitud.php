<?php 
include "conexion.php";
switch ($_GET['e']) {
	case 'cargarUsuarios': cargarUsuarios();  break;
	case 'sesionUsuario': sesionUsuario(); break;
	case 'selectProductos': selectProductos(); break;
	case 'buscarProductoSolicitud': buscarProductoSolicitud(); break;
	case 'agregarProducto': agregarProducto(); break;
	case 'verProductos': verProductos(); break;
	case 'eliminarSesion': eliminarSesion(); break;
	case 'eliminarItem': eliminarItem(); break;
}
function cargarUsuarios()
{
	$datos=select("SELECT * FROM users WHERE id_area=$_POST[id_area]");
	while($fila=mysqli_fetch_array($datos))
	{
		echo"<option value='$fila[pers_cod]'>$fila[nombre]</option>";
	}
}
function sesionUsuario()
{
	session_start();
	$_SESSION['pers_cod']=$_POST['pers_cod'];
	$_SESSION['are_cod']=$_POST['are_cod'];
	echo $_POST['pers_cod']."_".$_POST['are_cod'];
}
function agregarProducto()
{
	session_start();
	$_SESSION['producto_'.$_POST['contadorProducto']]=$_POST['cod_producto']."/".$_POST['cantidad'];
	//verProductos();
}
function eliminarItem()
{
	session_start();
	unset($_SESSION[$_POST['valor']]);
	echo "Listo ".$_POST['valor'];
}
function verProductos()
{
	session_start();
	echo "<table>";
	echo "<tr>";
	echo "<td>";
	echo "Cantidad";
	echo "</td>";
	echo "<td>";
	echo "Unidad";
	echo "</td>";
	echo "<td>";
	echo "Descripción";
	echo "</td>";
	echo "<td>";
	echo "Opciones";
	echo "</td>";
	echo "</tr>";
	for ($i=0; $i < count($_SESSION); $i++) { 
		if(isset($_SESSION["producto_".$i]))
		{
			$porciones = explode("/",$_SESSION["producto_".$i]);
			$datos = select("SELECT * FROM producto p LEFT JOIN unidad_de_med_prod udmp ON p.id_uni_de_med=udmp.id_uni_de_med WHERE p.cod_producto='$porciones[0]'");
			if($fila=mysqli_fetch_array($datos))
			{
				echo "<tr>";
				echo "<td>";
				echo $porciones[1];
				echo "</td>";
				echo "<td>";
				echo $fila['desc_uni_med'];
				echo "</td>";
				echo "<td>";
				echo $fila['desc_producto'];
				echo "</td>";
				echo "<td>";
				echo "<button onclick='eliminarItem(\"producto_".$i."\");'><span class='icon-bin'></span></button>";
				echo "</td>";
				echo "</tr>";
			}
			
		}		
	}
	echo "</table>";
}
function insertSolicitud()
{
	for ($i=0; $i < count($_SESSION); $i++) { 
		if(isset($_SESSION["producto_".$i]))
		{
			$porciones = explode("/",$_SESSION["producto_".$i]);
			$datos = select("SELECT * FROM producto p LEFT JOIN unidad_de_med_prod udmp ON p.id_uni_de_med=udmp.id_uni_de_med WHERE p.cod_producto='$porciones[0]'");
			if($fila=mysqli_fetch_array($datos))
			{
				//$porciones[0] es el cod producto
				//$posciones[1] es la cantidad
				//date('Y-m-d H:i:s'); '9999-12-31 23:59:59'
				//$_SESSION['pers_cod'] // id del solicitande
				//$_SESSION['are_cod'] // del solicitante
			}
			
		}		
	}
}
function eliminarSesion()
{
	session_start();
	session_destroy();
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
		LEFT JOIN recurso_prod rp ON p.id_recurso=rp.id_recurso ");
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
		<input type='number' style='width:40px;' value='1' min='1' id='txt_cant_prd_".$fila['cod_producto']."'>
		<button title='Agregar' onclick='agregarProducto(\"".$fila['cod_producto']."\");'>
		<span class='icon-plus'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}
function buscarProductoSolicitud()
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
		LEFT JOIN recurso_prod rp ON p.id_recurso=rp.id_recurso  WHERE p.desc_producto LIKE '%$_POST[valor]%'");
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
		<input type='number' style='width:40px;' value='1' min='1' id='txt_cant_prd_".$fila['cod_producto']."'>
		<button title='Agregar' onclick='agregarProducto(\"".$fila['cod_producto']."\");'>
		<span class='icon-plus'></span>
		</button>
		</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}
 ?>