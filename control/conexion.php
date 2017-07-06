<?php 

function getConexion()
{

$USUARIO_BD="root";
$CONTRASENA_BD="";
$BASE_DATOS="inventario_papeleria";
$SERVIDOR_BD="localhost";
$conexion = mysqli_connect($SERVIDOR_BD,$USUARIO_BD,$CONTRASENA_BD,$BASE_DATOS);
mysqli_set_charset($conexion, "utf8");
return $conexion;
}

function select($consulta)
{
	return  mysqli_query(getConexion(),$consulta);
}

function insert($consulta)
{
	return  mysqli_query(getConexion(),$consulta);
}

function update($consulta)
{
	return mysqli_query(getConexion(),$consulta);
}

function delete($consulta)
{
	return mysqli_query(getConexion(),$consulta);
}


 ?>