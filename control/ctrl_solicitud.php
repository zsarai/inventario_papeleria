<?php 
include "conexion.php";
switch ($_GET['e']) {
	case 'cargarUsuarios': cargarUsuarios();  break;
	case 'sesionUsuario': sesionUsuario(); break;

}
function cargarUsuarios()
{
	$datos=select("SELECT * FROM users WHERE id_area=$_POST[id_area]");
	while($fila=mysqli_fetch_array($datos))
	{
		echo"<option value='$fila[pers_code]'>$fila[nombre]</option>";
	}
}
function sesionUsuario()
{
	session_start();
	$_SESSION['pers_cod']=$_POST['pers_cod'];
	$_SESSION['are_cod']=$_POST['are_cod'];
	echo $_POST['pers_cod']."_".$_POST['are_cod'];
}
 ?>