<!-- Modal -->
<div class="modal fade" id="modal_actualizar_clasif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Clasificacion</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="frm_actualizar_clasificacion" class="form-style-5" >
		<input type="hidden" name="id_clasif_prod" id="txt_id_clasif_prod" value="">
		<label class="lbl_form">Nombre de la Clasificacion</label>
		<br>
		<input type="text" name="desc_clasif_prod" id="txt_desc_clasif_prod"required>
		<br>
		<input type="submit">
		</form>
      </div>
    </div>
  </div>
</div>