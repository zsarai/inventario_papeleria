<?php include'../control/conexion.php'; ?>
<table>
<tr>
<td width="30%">
<select id="cbo_areas" name="are_cod" class="form-control" onchange="cargarUsuarios(this.value);" style="background-color:#002E67; color: white;">
<?php 
$datos=select("SELECT * FROM areas");
while($fila=mysqli_fetch_array($datos))
{
echo"<option value='$fila[id_area]'>$fila[area]</option>";
}
 ?>
</select>
</td>
<td width="30%">
<select id="cbo_users" name="pers_cod" class="form-control" onchange="selectUsuario(this.value);" style="background-color:#002E67; color: white;">
<?php 
$datos=select("SELECT * FROM users");
while($fila=mysqli_fetch_array($datos))
{
echo"<option value='$fila[pers_cod]'>$fila[nombre]</option>";
}
 ?>
</select>
</td>
<td width="20%">
<button class="input_submit_btn" onclick="verSolicitud();"><span class="icon-eye"> </span> Ver solicitud</button>

</td>
<td width="20%"><button class="input_submit_btn" style="background-color:#088A08;" onclick="window.location='control/reporte_excel.php';"><span class="icon-file-excel"> </span> Generar excel</button></td>
</tr>
</table>
