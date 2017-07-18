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
include "conexion.php";
$datos = select("SELECT * FROM romp ro 
	LEFT JOIN resguardo_prod rp 
	ON ro.id_resguardo_fk=rp.id_resguardo  
	LEFT JOIN users u 
	ON u.pers_cod=rp.pers_cod 
	LEFT JOIN areas ar 
	ON u.id_area=ar.id_area
	WHERE ro.id_resguardo_fk=".$_GET['id_resguardo']);
if($fila = mysqli_fetch_array($datos))
{


$pdf=new Pdf();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20,0,1);
$pdf->Cell(0,0,utf8_decode('RECIBO DE ENTREGA'),0,1,'C');
$pdf->SetFont('Arial','BU',10,0,1);
$pdf->Cell(0,20,utf8_decode('Solicitante: '.$fila['nombre']),0,1,'L');//SOLICITANTE
$pdf->SetFont('Arial','BU',0,0,1);
$pdf->Cell(0,0,utf8_decode('Adscripción: '.$fila['area']),0,1,'L');//ADSCRIPCION 
$pdf->SetFont('Arial','',12,0,1);
$pdf->Cell(0,20,utf8_decode('En cumplimiento a instrucciones superiores y con el firme propósito de apoyar el desempeño de sus'),0,1,'L');
$pdf->Cell(0,-10,utf8_decode('actividades, '),0,0,'L');
$pdf->SetFont('Arial','BI',12,0,1);
$pdf->Cell(-76,-10,utf8_decode(' se realiza la entrega del siguiente material.'),0,0,'R');
$pdf->SetFont('Arial','',12,0,1);
$pdf->Cell(-80,-10,utf8_decode('Así mismo se hace de su conocimiento'),0,1,'L');
$pdf->Cell(0,20,utf8_decode('que deberá ser utilizado en cuestiones de carácter   estrictamente oficial:'),0,1,'L');
$pdf->SetFillColor(216,216,216);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,5,utf8_decode('Cantidad'),1,0,'C',true);
$pdf->Cell(40,5,utf8_decode('Unidad'),1,0,'C',true);
$pdf->Cell(110,5,utf8_decode('Descripción'),1,1,'C',true);
$pdf->SetFont('Arial','',12);
$items = select("SELECT * FROM romp ro 
	LEFT JOIN gencod_producto gp 
	ON ro.id_gencod_prod_fk=gp.id_gencod_prod 
	LEFT JOIN producto p 
	ON gp.cod_producto=p.cod_producto 
	LEFT JOIN unidad_de_med_prod um 
	ON p.id_uni_de_med=um.id_uni_de_med
	WHERE ro.id_resguardo_fk=".$_GET['id_resguardo']);
while($filaItems=mysqli_fetch_array($items))//imprimendo items
{
	$pdf->Cell(40,5,utf8_decode($filaItems['cant_prod']),1,0,'C');
	$pdf->Cell(40,5,utf8_decode($filaItems['desc_uni_med']),1,0,'C');
	$pdf->Cell(110,5,utf8_decode($filaItems['desc_producto']),1,1,'C');
}
$pdf->Ln(10);
$pdf->Cell(95,5,utf8_decode('Recibe'),0,0,'C');
$pdf->Cell(95,5,utf8_decode('Entrega'),0,0,'C');
$pdf->Ln(20);
$pdf->Cell(95,5,utf8_decode('____________________________'),0,0,'C');
$pdf->Cell(95,5,utf8_decode('____________________________'),0,1,'C');
$pdf->Cell(95,5,utf8_decode('Nombre de la persona que recibe'),0,0,'C');
$pdf->Cell(95,5,utf8_decode($fila['users_cod']),0,1,'C');// usuario que entrega
$pdf->OutPut('Solicitud.pdf',"I");
}
?>