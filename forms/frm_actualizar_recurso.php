<!-- Modal -->
<div class="modal fade" id="modal_actualizar_recurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Recurso</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="frm_actualizar_recurso" class="form-style-5" >
		<input type="hidden" name="id_recurso" id="txt_id_recurso" value="">
		<label class="lbl_form">Descripción del recurso</label>
		<br>
		<input type="text" name="nombre_recurso" id="txt_nombre_recurso"required>
		<br>
		<input type="submit">
		</form>
      </div>
    </div>
  </div>
</div>