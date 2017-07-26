<?php
include('conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
	$desde = $hasta;
}

if(isset($hasta)==false){
	$hasta = $desde;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM resguardo_prod WHERE fecha_entrega BETWEEN '$desde' AND '$hasta' ORDER BY id_resguardo ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">No Solicitud</th>
                <th width="200">Solicitante</th>
                <th width="150">Area</th>
                <th width="150">Fecha/Hora entregado</th>
                <th width="150">Usuario</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['id_resguardo'].'</td>
				<td>'.$registro2['pers_cod'].'</td>
				<td>S/. '.$registro2['are_cod'].'</td>
				<td>'.fechaNormal($registro2['fecha_entrega']).'</td>
				<td>S/. '.$registro2['users_cod'].'</td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>