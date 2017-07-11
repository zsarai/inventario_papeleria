<!-- Modal -->
<div class="modal fade" id="modal_actualizar_producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Producto</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="frm_actualizar_producto" class="form-style-5" >
			<input type="text" id="txt_cod_producto" name="cod_producto">

        	<select name="id_modelo_prod" id="cbo_id_modelo_prod" class="form-control" style="background-color:#002E67; color: white;">
			
			<?php 
			$datos=select("SELECT * FROM modelo_prod");
			while($fila=mysqli_fetch_array($datos))
			{
				echo"<option value='$fila[id_modelo_prod]'>$fila[desc_modelo_prod]</option>";
			}
			 ?>
			</select>
			<br>

			<select name="id_uni_de_med" id="cbo_id_uni_de_med" class="form-control" style="background-color:#002E67; color: white;">
			
			<?php 
			$datos=select("SELECT * FROM unidad_de_med_prod");
			while($fila=mysqli_fetch_array($datos))
			{
				echo"<option value='$fila[id_uni_de_med]'>$fila[desc_uni_med]</option>";
			}
			 ?>
			 </select>
			 <br>

			<select name="id_recurso" id="cbo_id_recurso" class="form-control" style="background-color:#002E67; color: white;">
			
			<?php 
			$datos=select("SELECT * FROM recurso_prod");
			while($fila=mysqli_fetch_array($datos))
			{
				echo"<option value='$fila[id_recurso]'>$fila[nombre_recurso]</option>";
			}
			 ?>
			 </select>

		<label class="lbl_form">Descripción del Producto</label>
		<br>
		<input type="text" id="txt_desc_producto"  name="desc_producto" id="txt_desc_producto"required>
		<br>
		<label class="lbl_form">Observación del Producto</label>
		<br>
		<input type="text" id="txt_obser_producto"  name="obser_producto" id="txt_obser_producto"required>
		<br>
		<label class="lbl_form">Recepción del Producto</label>
		<br>
		<input type="text" id="txt_recep_cant_proc"  name="recep_cant_proc" id="txt_recep_cant_proc"required>
		<br>
		<label class="lbl_form">Estatus del Producto</label>
		<br>
		<input type="text" id="txt_prod_rec_status"  name="prod_rec_status" id="txt_prod_rec_status"required>
		<br>
		<input type="submit">
		</form>
      </div>
    </div>
  </div>
</div>