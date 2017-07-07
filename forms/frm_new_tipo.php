<?php include'../control/conexion.php'; ?>
<form  id="frm_new_tipo">
<table>
<tr>
<td>
<select name="id_clasif_prod" class="form-control" style="background-color:#002E67; color: white;">
<option value="0">--Selecciona Clasificacion--</option>
<?php 
$datos=select("SELECT * FROM clasif_del_prod");
while($fila=mysqli_fetch_array($datos))
{
	echo"<option value='$fila[id_clasif_prod]'>$fila[desc_clasif_prod]</option>";
}
?>
</select>
</td>
<td>
<input type="text" name="desc_tipo_prod" placeholder="Ingrese Descripcion de Tipo" class="input_text" required>
</td>
<td><input type="submit" class="input_submit_btn" value="Insertar Tipo"></td>
</tr>
</table>
</form>