<?php //include'scontrol/conexion.php'; ?>

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
            <td>Desde&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="date" id="bd-desde"/></td>
            <td>Hasta&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="date" id="bd-hasta"/></td>
            <td width="200"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar Busqueda a PDF</a></td>
        </tr>
    </table>
 