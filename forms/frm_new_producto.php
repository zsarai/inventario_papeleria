<?php include'../control/conexion.php'; ?>
<form method="POST" id="frm_new_producto">
<table>

<tr>
<td>
<input type="text" name="cod_producto" placeholder="Ingrese Codigo del Producto" class="input_text" required>
</td>
	<td>
		<select name="id_modelo_prod" class="form-control" style="background-color:#002E67; color: white;">
			<option value="0">--Selecciona Modelo--</option>
			<?php 
			$datos=select("SELECT * FROM modelo_prod");
			while($fila=mysqli_fetch_array($datos))
			{
				echo"<option value='$fila[id_modelo_prod]'>$fila[desc_modelo_prod]</option>";
			}
			 ?>
		</select>
	</td>
	<td>
		<select name="id_uni_de_med" class="form-control" style="background-color:#002E67; color: white;">
		<option value="0">--Selecciona Unidad de Medida--</option>
		<?php 
			$datos=select("SELECT * FROM unidad_de_med_prod");
			while($fila=mysqli_fetch_array($datos))
			{
				echo"<option value='$fila[id_uni_de_med]'>$fila[desc_uni_med]</option>";
			}
			 ?>
			 </select>
	</td>
	<td>
		<select name="id_recurso" class="form-control" style="background-color:#002E67; color: white;">
		<option value="0">--Selecciona Recurso--</option>
		<?php 
			$datos=select("SELECT * FROM recurso_prod");
			while($fila=mysqli_fetch_array($datos))
			{
				echo"<option value='$fila[id_recurso]'>$fila[nombre_recurso]</option>";
			}
			 ?>
			 </select>
	</td>
	<tr>
<td>
<input type="text" name="desc_producto" placeholder="Ingrese Descripcion del Producto" class="input_text" required>
</td>
<td>
<input type="text" name="obser_producto" placeholder="Ingrese Observaciones del Producto" class="input_text" required>
</td>
<td>
<input type="text" name="recep_cant_proc" placeholder="Ingrese Cantidad de Recepcion" class="input_text" required>
</td>
<td>
<input type="text" name="prod_rec_status" placeholder="Seleccione Estatus" class="input_text" required>
</td>

<td><input type="submit" class="input_submit_btn" value="Insertar Producto"></td>
</tr>

</table>
</form>