<!-- Modal -->
<div class="modal fade" id="modal_actualizar_tipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar tipo</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="frm_actualizar_tipo" class="form-style-5" >
		<input type="hidden" name="id_tipo_prod" id="txt_id_tipo_prod" value="">
		<select name="id_clasif_prod" id="cbo_id_clasif_prod" class="form-control" style="background-color:#002E67; color: white;">
			
			<?php 
			$datos=select("SELECT * FROM clasif_del_prod");
			while($fila=mysqli_fetch_array($datos))
			{
				echo"<option value='$fila[id_clasif_prod]'>$fila[desc_clasif_prod]</option>";
			}
			 ?>
		</select>
		<br>
		<label class="lbl_form">Descripción del tipo</label>
		<br>
		<input type="text" name="desc_tipo_prod" id="txt_desc_tipo_prod"required>
		<br>
		<input type="submit">
		</form>
      </div>
    </div>
  </div>
</div>