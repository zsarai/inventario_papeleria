<?php include'../control/conexion.php'; ?>
<table>
<tr>
<td>
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
<td>
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
<td>
<button class="input_submit_btn" onclick="verSolicitud();"><span class="icon-eye"> </span> Ver solicitud</button>
</td>
</tr>
</table>
