
 <!-- Modal -->
<div class="modal fade" id="modal_frm_reporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <form action="control/pdf_reporte.php" method="GET"> 
        <table border="0" align="center">
            <tr>
                <td>
                <select id="cbo_areas" name="are_cod" class="form-control" style="background-color:#002E67; color: white;">
                <?php 
                $datos=select("SELECT * FROM areas");
                while($fila=mysqli_fetch_array($datos))
                {
                echo"<option value='$fila[id_area]'>$fila[area]</option>";
                }
                 ?>
                </select>
                </td>
            </tr>
            <tr>
                <td> 
                Desde: <input type="date" name="desde" id="bd-desde"/> Hasta: <input type="date" name="hasta" id="bd-hasta"/>
                </td>
            </tr>

            <tr>
                <td> 
            <input type="submit" class="btn btn-danger" value="Exportar Busqueda a PDF"/>
                </td>
            </tr>
        </table>
    </form>
      </div>
    </div>
  </div>
</div>