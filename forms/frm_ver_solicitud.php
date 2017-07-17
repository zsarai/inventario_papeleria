<!-- Modal -->
<div class="modal fade" id="modal_ver_solicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Solicitud</h4>
      </div>
      <div class="modal-body" id="contenedor_solicitud">
        Contenid
      </div>
      <div class="modal-footer">
        <table style="width:100%" border="">
          <tr>
            <td>
            <button class="input_submit_btn" onclick="enviarSolicitud();">
              <span class="icon-file-pdf"></span>
              Imprimir solicitud
            </button>
            </td>
            <td>
            <button class="input_submit_btn" onclick="cancelarSolicitud();" style="background-color:#FE2E2E;">
              <span class="icon-cross"></span>
              Cancelar solicitud
            </button>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>