<?php include'../control/conexion.php'; ?>

    <table border="0" align="center">
    	<tr>
        	<td width="335"><input type="text" placeholder="Busca un producto por: Nombre o Tipo" id="bs-prod"/></td>
            <td><input type="date" id="bd-desde"/></td>
            <td>Hasta&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="date" id="bd-hasta"/></td>
            <td width="200"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar Busqueda a PDF</a></td>
        </tr>
    </table>
 