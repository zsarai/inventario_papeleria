<?php

include "conexion.php";

if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '__/__/____';
	$verHasta = '__/__/____';
}
require('fpdf/fpdf.php');
require('conexion.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'Almacen e Inventario de Papeleria', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE SOLICITUDES', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
$pdf->Cell(100, 8, 'Desde: '.$verDesde.' Hasta: '.$verHasta, 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'No Solicitud', 0);
$pdf->Cell(70, 8, 'Solicitante', 0);
$pdf->Cell(40, 8, 'Area', 0);
$pdf->Cell(25, 8, 'Fecha/Hora entrega', 0);
$pdf->Cell(25, 8, 'Distribuidor', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysql_query("SELECT * FROM resguardo_prod WHERE fecha_entrega BETWEEN '$desde' AND '$hasta' ");
/*$item = 0;
$totaluni = 0;
$totaldis = 0;*/
/*while($productos2 = mysql_fetch_array($productos)){
	$item = $item+1;
	$totaluni = $totaluni + $productos2['precio_unit'];
	$totaldis = $totaldis + $productos2['precio_dist'];
	$pdf->Cell(15, 8, $item, 0);
	$pdf->Cell(70, 8,$productos2['nomb_prod'], 0);
	$pdf->Cell(40, 8, $productos2['tipo_prod'], 0);
	$pdf->Cell(25, 8, 'S/. '.$productos2['precio_unit'], 0);
	$pdf->Cell(25, 8, 'S/. '.$productos2['precio_dist'], 0);
	$pdf->Cell(25, 8, date('d/m/Y', strtotime($productos2['fecha_reg'])), 0);
	$pdf->Ln(8);
}*/
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(104,8,'',0);
/*$pdf->Cell(31,8,'Total Unitario: S/. '.$totaluni,0);
$pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);*/

$pdf->Output('reporte.pdf','D');



function selectResguardos()
{
	$contador=0;
	echo "<table border='1'>";
	echo "<tr>
	<td>No de Solicitud</td>
	<td>Solicitante</td>
	<td>Area</td>
	<td>Fecha/Hora entrega</td>
	<td>Distribuidor</td>
	</tr>";
	$datos = select("SELECT * FROM resguardo_prod");
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
		echo "<tr>
		<td>".$fila['id_resguardo']."</td>
		<td>".$fila['pers_cod']."</td>
		<td>".$fila['are_cod']."</td>
		<td>".$fila['fecha_entrega']."</td>
		<td>".$fila['users_cod']."</td>
		</tr>";
	}
	if($contador <=0 ){echo"No hay datos para mostrar.";}
	echo "</table>";
}





?>