<?php 

include "control/conexion.php";

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM resguardo_prod WHERE fecha_entrega >= '$start_date' AND fecha_entrega <= '$end_date'";
	
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>No de Solicitud</th>
			<th>Solicitante </th>
			<th>Area </th>
			<th>Fecha/Hora de entrega</th>
			<th>Entrego </th>
		</tr>

		<tr>';
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['id_resguardo'].'</center></td>
				<td><center>'.$result['pers_cod'].'</center></td>
				<td><center>'.$result['are_cod'].'</center></td>
				<td><center>'.$result['fecha_entrega'].'</center></td>
				<td><center>'.$result['users_cod'].'</center></td>
			</tr>';	
		}
		$table .= '
		</tr>

	</table>
	';	

	echo $table;

}

?>