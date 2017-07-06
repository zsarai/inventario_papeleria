<?php include'../control/conexion.php'; ?>
<form method="POST" id="frm_new_modelo">
<table>

<tr>
	<td>
		<select name="id_marca_prod" class="form-control" style="background-color:#002E67; color: white;">
			<option value="0">--Selecciona Marca--</option>
			<?php 
			$datos=select("SELECT * FROM marca_prod");
			while($fila=mysqli_fetch_array($datos))
			{
				echo"<option value='$fila[id_marca_prod]'>$fila[desc_marca_prod]</option>";
			}
			 ?>
		</select>
	</td>
	<td>
		<select name="id_tipo_prod" class="form-control" style="background-color:#002E67; color: white;">
		<option value="0">--Selecciona Tipo--</option>
		<?php 
			$datos=select("SELECT * FROM tipo_prod");
			while($fila=mysqli_fetch_array($datos))
			{
				echo"<option value='$fila[id_tipo_prod]'>$fila[desc_tipo_prod]</option>";
			}
			 ?>
			 </select>
	</td>
<td>
<input type="text" name="cod_modelo_prod" placeholder="Ingrese Codigo de Modelo" class="input_text" required>
</td>
<td>
<input type="text" name="desc_modelo_prod" placeholder="Ingrese Descripcion de Modelo" class="input_text" required>
</td>
<td><input type="submit" class="input_submit_btn" value="Insertar Modelo"></td>
</tr>

</table>
</form>