<!-- Modal -->
<div class="modal fade" id="modal_actualizar_unidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Unidad de Medida</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="frm_actualizar_unimed" class="form-style-5" >
		<input type="hidden" name="id_uni_de_med" id="txt_id_uni_de_med" value="">
		<label class="lbl_form">Descripción de la Unidad de Medida</label>
		<br>
		<input type="text" name="desc_uni_med" id="txt_desc_uni_med"required>
		<br>
		<input type="submit">
		</form>
      </div>
    </div>
  </div>
</div>