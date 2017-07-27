<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte_Personal_usuarios.xls");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE USUARIOS</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>INVENTARIO DE PRODUCTOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>Codigo del producto</strong></td>
    <td><strong>Modelo</strong></td>
    <td><strong>Unidad de Medida</strong></td>
    <td><strong>Recurso</strong></td>
    <td><strong>Descripcion</strong></td>
    <td><strong>Observaciones</strong></td>
    <td><strong>Cantidad</strong></td>
    <td><strong>Estatus</strong></td>
  </tr>

<?php 
include "conexion.php";
$datos = select("SELECT * FROM producto p 
		LEFT JOIN modelo_prod mop ON p.id_modelo_prod=mop.id_modelo_prod
		LEFT JOIN unidad_de_med_prod ump ON p.id_uni_de_med=ump.id_uni_de_med
		LEFT JOIN recurso_prod rp ON p.id_recurso=rp.id_recurso");
while($fila=mysqli_fetch_array($datos))
{
	echo 
"<tr>
    <td><strong>".$fila['cod_producto']."</strong></td>
	<td><strong>".$fila['desc_modelo_prod']."</strong></td>
	<td><strong>".$fila['desc_uni_med']."</strong></td>
	<td><strong>".$fila['nombre_recurso']."</strong></td>
	<td><strong>".$fila['desc_producto']."</strong></td>
	<td><strong>".$fila['obser_producto']."</strong></td>
	<td><strong>".$fila['recep_cant_proc']."</strong></td>
	<td><strong>".$fila['prod_rec_status']."</strong></td>
  </tr>";
}
 ?> 
</table>
</body>
</html>