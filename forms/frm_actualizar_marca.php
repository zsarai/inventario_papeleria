<!-- Modal -->
<div class="modal fade" id="modal_actualizar_marca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar marca</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="frm_actualizar_marca" class="form-style-5" >
		<input type="hidden" name="id_marca_prod" id="txt_id_marca_prod" value="">
		<label class="lbl_form">Descripción de la marca</label>
		<br>
		<input type="text" name="desc_marca_prod" id="txt_desc_marca_prod"required>
		<br>
		<input type="submit">
		</form>
      </div>
    </div>
  </div>
</div>