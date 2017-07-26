<?php 
include "fpdf/fpdf.php"; 

class Pdf extends FPDF
{
	
	
	function Header()
	{
		setlocale(LC_TIME, 'es_ES.UTF-8');
		date_default_timezone_set('America/Mexico_City');
		$this->Image('../img/logo_neza.png',10,5,50,30);
		$this->Image('../img/dgsc2.png',170,5,30,30);
		$this->SetTextColor(0,0,0);
		$this->SetFont('Arial','B',10,0,1);
		$this->Cell(0,10,utf8_decode('DIRECCIÓN GENERAL DE SEGURIDAD CIUDADANA'),0,1,'C');
		$this->SetFont('Arial','',10,0,1);
		$this->Cell(0,50,utf8_decode('Nezahualcóyotl, Estado de México a '.strftime("%d de ".$this->getMes(date("m"))." de %Y .")),0,1,'R');
		
		
		
	}
	function getMes($mes)
	{
		switch ($mes) {
			case '01':return "Enero";break;
			case '02':return "Febrero";break;
			case '03':return "Marzo";break;
			case '04':return "Abril";break;
			case '05':return "Mayo";break;
			case '06':return "Junio";break;
			case '07':return "Julio";break;
			case '08':return "Agosto";break;
			case '09':return "Septiembre";break;
			case '10':return "Octubre";break;
			case '11':return "Noviembre";break;
			case '12':return "Dicienbre";break;
			default: return $mes; break;
		}
	}
	function Footer()
	{
		$this->SetY(-22);
   		$this->Image('../img/footer.png',10,280,190,15);
		$this->SetFont('Arial','B',12);
		$this->Cell(0,10,utf8_decode('"2017 , Año del Centenario de las Constituciones Mexicana y Mexiquense de 1917"'),0,0,'C');
		$this->Ln(11);
		$this->SetFont('Arial','',6);
		$this->SetTextColor(255);
		$this->Cell(0,10,utf8_decode('Av. Chimalhuacan s/n, entre Caballo Bayo y Faisan, Col. Benito Juárez, C.P, 57000'),0,0,'C');
		$this->Ln(3);
		$this->Cell(0,10,utf8_decode('Nezahualcóyotl, Estado de México, Conmutador 5716-9070'),0,0,'C');
    	//$this->Cell(0,10,utf8_decode('Página '.$this->PageNo()),0,0,'C');
	}
}
$pdf=new Pdf();
$pdf->AddPage();

$pdf->SetFont('Arial','B',14,0,1);
$pdf->Cell(0,10,utf8_decode('Listado de solicitudes'),0,1,'C');

$pdf->SetFont('Arial','',10);

$pdf->SetFillColor(216,216,216);
$pdf->Cell(20,5,utf8_decode('Id resguardo'),1,0,'C',true);
$pdf->Cell(40,5,utf8_decode('Código de persona'),1,0,'C',true);
$pdf->Cell(50,5,utf8_decode('Área'),1,0,'C',true);
$pdf->Cell(30,5,utf8_decode('Fecha de entrega'),1,0,'C',true);
$pdf->Cell(50,5,utf8_decode('Distribuidor'),1,1,'C',true);


include "conexion.php";
$datos = select("SELECT * FROM resguardo_prod 
	WHERE fecha_entrega BETWEEN '$_GET[desde] 00:00:00' AND '$_GET[hasta] 23:59:59' 
	AND are_cod = $_GET[are_cod]
	ORDER BY fecha_entrega");
while($fila=mysqli_fetch_array($datos))
{
$fecha = explode(' ',$fila['fecha_entrega']);
$areaDatos = select("SELECT * FROM areas WHERE id_area=".$fila['are_cod']);
if($filaArea=mysqli_fetch_array($areaDatos))
{
	$areaName=$filaArea['area'];
}
$pdf->Cell(20,5,utf8_decode($fila['id_resguardo']),1,0,'C',false);
$pdf->Cell(40,5,utf8_decode($fila['pers_cod']),1,0,'C',false);
$pdf->Cell(50,5,utf8_decode($areaName),1,0,'C',false);
$pdf->Cell(30,5,utf8_decode($fecha[0]),1,0,'C',false);
$pdf->Cell(50,5,utf8_decode($fila['users_cod']),1,1,'C',false);
}

$pdf->OutPut('Reporte.pdf',"I");
?>