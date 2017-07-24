<?php include "control/conexion.php"; ?>
<!-- Modal -->
<div class="modal fade" id="modal_actualizar_modelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar modelo</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="frm_actualizar_modelo" class="form-style-5" >
			<input type="text" id="txt_id_modelo_prod" name="id_modelo_prod">
        	
        	<select name="id_marca_prod" id="cbo_id_marca_prod" class="form-control" style="background-color:#002E67; color: white;">
			<?php 
			$datos=select("SELECT * FROM marca_prod");
			while($fila=mysqli_fetch_array($datos))
			{
				echo"<option value='$fila[id_marca_prod]'>$fila[desc_marca_prod]</option>";
			}
			?>
			</select>
			<br>
			
			<select name="id_tipo_prod" id="cbo_id_tipo_prod" class="form-control" style="background-color:#002E67; color: white;">
			<?php 
			$datos=select("SELECT * FROM tipo_prod");
			while($fila=mysqli_fetch_array($datos))
			{
				echo"<option value='$fila[id_tipo_prod]'>$fila[desc_tipo_prod]</option>";
			}
			 ?>
			 </select>

		<label class="lbl_form">Descripción de la marca</label>
		<br>
		<input type="text" id="txt_desc_modelo_prod"  name="desc_modelo_prod" id="txt_desc_marca_prod"required>
		<br>
		<input type="submit">
		</form>
      </div>
    </div>
  </div>
</div>