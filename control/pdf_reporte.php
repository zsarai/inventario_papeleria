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
/*$pdf->Cell(20,5,utf8_decode('Id resguardo'),1,0,'C',true);
$pdf->Cell(40,5,utf8_decode('Código de persona'),1,0,'C',true);
$pdf->Cell(50,5,utf8_decode('Área'),1,0,'C',true);
$pdf->Cell(30,5,utf8_decode('Fecha de entrega'),1,0,'C',true);
$pdf->Cell(50,5,utf8_decode('Distribuidor'),1,1,'C',true);*/


include "conexion.php";
//Se ejecuta si no hay area selecionada
if($_GET['are_cod']<=0)//si no se seleciono area se imprimen todas
{
	
	$sqlAreas = "SELECT * FROM areas";
	$datosAreas = select($sqlAreas);
	while($filaAreas=mysqli_fetch_array($datosAreas))
	{
		$pdf->SetFillColor(216,216,216);
		$pdf->Cell(190,5,utf8_decode('Area: '.$filaAreas['area']),1,1,'C',true);
		$pdf->Ln(5);
		if($_GET['desde']=='' OR $_GET['hasta']=='')
		{// se ejecuta si no hay area ni fechas selecionadas (muestra todo)
			//Se imprime cada area
			//se imprimen los resguardios de cada área y todas las fechas si estan vacias
			$sqlResguardo="SELECT * FROM resguardo_prod WHERE are_cod=".$filaAreas['id_area'];
			$datosResguardo=select($sqlResguardo);
			while($filaResguardo=mysqli_fetch_array($datosResguardo))
			{
				$fecha = explode(' ',$filaResguardo['fecha_entrega']);
				//Se imprimen todos los resguardos por area
				$pdf->SetFillColor(0,128,255);
				$pdf->Cell(190,5,utf8_decode('Resguardo: '.$filaResguardo['id_resguardo']),1,1,'C',true);
				$pdf->SetFillColor(216,216,216);
				$pdf->Cell(20,5,utf8_decode('Id resguardo'),1,0,'C',true);
				$pdf->Cell(40,5,utf8_decode('Código de persona'),1,0,'C',true);
				$pdf->Cell(50,5,utf8_decode('Área'),1,0,'C',true);
				$pdf->Cell(30,5,utf8_decode('Fecha de entrega'),1,0,'C',true);
				$pdf->Cell(50,5,utf8_decode('Distribuidor'),1,1,'C',true);

				$pdf->Cell(20,5,utf8_decode($filaResguardo['id_resguardo']),1,0,'C',false);
				$pdf->Cell(40,5,utf8_decode($filaResguardo['pers_cod']),1,0,'C',false);
				$pdf->Cell(50,5,utf8_decode($filaAreas['area']),1,0,'C',false);
				$pdf->Cell(30,5,utf8_decode($fecha[0]),1,0,'C',false);
				$pdf->Cell(50,5,utf8_decode($filaResguardo['users_cod']),1,1,'C',false);
				$pdf->SetFillColor(0,128,255);
				$pdf->Cell(190,5,utf8_decode('Productos'),1,1,'C',true);
				$pdf->SetFillColor(216,216,216);
				$sqlProductos="SELECT * FROM romp r 
				LEFT JOIN resguardo_prod rp ON r.id_resguardo_fk=rp.id_resguardo 
				LEFT JOIN gencod_producto gp ON r.id_gencod_prod_fk=gp.id_gencod_prod 
				LEFT JOIN producto p ON gp.cod_producto=p.cod_producto 
				LEFT JOIN unidad_de_med_prod up ON up.id_uni_de_med=p.id_uni_de_med 
				LEFT JOIN recurso_prod rec ON rec.id_recurso=p.id_recurso 
				WHERE rp.id_resguardo=".$filaResguardo['id_resguardo'];
				$datosProductos=select($sqlProductos);
				while($filaProductos=mysqli_fetch_array($datosProductos))
				{
					$pdf->Cell(20,5,utf8_decode('Código'),1,0,'C',true);
					$pdf->Cell(40,5,utf8_decode('Unidad de medida'),1,0,'C',true);
					$pdf->Cell(50,5,utf8_decode('Recurso'),1,0,'C',true);
					$pdf->Cell(30,5,utf8_decode('Descripción'),1,0,'C',true);
					$pdf->Cell(50,5,utf8_decode('Cantidad'),1,1,'C',true);
					$pdf->Cell(20,5,utf8_decode($filaProductos['cod_producto']),1,0,'C',false);
					$pdf->Cell(40,5,utf8_decode($filaProductos['desc_uni_med']),1,0,'C',false);
					$pdf->Cell(50,5,utf8_decode($filaProductos['nombre_recurso']),1,0,'C',false);
					$pdf->Cell(30,5,utf8_decode($filaProductos['desc_producto']),1,0,'C',false);
					$pdf->Cell(50,5,utf8_decode($filaProductos['cant_prod']),1,1,'C',false);
				}
				$pdf->Ln(5);
			}
			$pdf->Ln(5);
		}else
		{//se ejecuta si no hay area seleccionada, pero si hay fechas
			$sqlResguardo=
			"SELECT * FROM resguardo_prod 
			WHERE fecha_entrega BETWEEN '$_GET[desde] 00:00:00' AND '$_GET[hasta] 23:59:59' 
			ORDER BY fecha_entrega";
			$datosResguardo=select($sqlResguardo);
			while($filaResguardo=mysqli_fetch_array($datosResguardo))
			{
				$fecha = explode(' ',$filaResguardo['fecha_entrega']);
				//Se imprimen todos los resguardos por area
				$pdf->SetFillColor(0,128,255);
				$pdf->Cell(190,5,utf8_decode('Resguardo: '.$filaResguardo['id_resguardo']),1,1,'C',true);
				$pdf->SetFillColor(216,216,216);
				$pdf->Cell(20,5,utf8_decode('Id resguardo'),1,0,'C',true);
				$pdf->Cell(40,5,utf8_decode('Código de persona'),1,0,'C',true);
				$pdf->Cell(50,5,utf8_decode('Área'),1,0,'C',true);
				$pdf->Cell(30,5,utf8_decode('Fecha de entrega'),1,0,'C',true);
				$pdf->Cell(50,5,utf8_decode('Distribuidor'),1,1,'C',true);

				$pdf->Cell(20,5,utf8_decode($filaResguardo['id_resguardo']),1,0,'C',false);
				$pdf->Cell(40,5,utf8_decode($filaResguardo['pers_cod']),1,0,'C',false);
				$pdf->Cell(50,5,utf8_decode($filaAreas['area']),1,0,'C',false);
				$pdf->Cell(30,5,utf8_decode($fecha[0]),1,0,'C',false);
				$pdf->Cell(50,5,utf8_decode($filaResguardo['users_cod']),1,1,'C',false);
				$pdf->SetFillColor(0,128,255);
				$pdf->Cell(190,5,utf8_decode('Productos'),1,1,'C',true);
				$pdf->SetFillColor(216,216,216);
				$sqlProductos="SELECT * FROM romp r 
				LEFT JOIN resguardo_prod rp ON r.id_resguardo_fk=rp.id_resguardo 
				LEFT JOIN gencod_producto gp ON r.id_gencod_prod_fk=gp.id_gencod_prod 
				LEFT JOIN producto p ON gp.cod_producto=p.cod_producto 
				LEFT JOIN unidad_de_med_prod up ON up.id_uni_de_med=p.id_uni_de_med 
				LEFT JOIN recurso_prod rec ON rec.id_recurso=p.id_recurso 
				WHERE rp.id_resguardo=".$filaResguardo['id_resguardo'];
				$datosProductos=select($sqlProductos);
				while($filaProductos=mysqli_fetch_array($datosProductos))
				{
					$pdf->Cell(20,5,utf8_decode('Código'),1,0,'C',true);
					$pdf->Cell(40,5,utf8_decode('Unidad de medida'),1,0,'C',true);
					$pdf->Cell(50,5,utf8_decode('Recurso'),1,0,'C',true);
					$pdf->Cell(30,5,utf8_decode('Descripción'),1,0,'C',true);
					$pdf->Cell(50,5,utf8_decode('Cantidad'),1,1,'C',true);
					$pdf->Cell(20,5,utf8_decode($filaProductos['cod_producto']),1,0,'C',false);
					$pdf->Cell(40,5,utf8_decode($filaProductos['desc_uni_med']),1,0,'C',false);
					$pdf->Cell(50,5,utf8_decode($filaProductos['nombre_recurso']),1,0,'C',false);
					$pdf->Cell(30,5,utf8_decode($filaProductos['desc_producto']),1,0,'C',false);
					$pdf->Cell(50,5,utf8_decode($filaProductos['cant_prod']),1,1,'C',false);
				}
				$pdf->Ln(5);
			}
			$pdf->Ln(5);
		}
	}
}else{//se ejecuta si hay area seleccionada
	$sqlAreas = "SELECT * FROM areas WHERE id_area=".$_GET['are_cod'];
	$datosAreas = select($sqlAreas);
	while($filaAreas=mysqli_fetch_array($datosAreas))
	{
		$pdf->SetFillColor(216,216,216);
		$pdf->Cell(190,5,utf8_decode('Area: '.$filaAreas['area']),1,1,'C',true);
		$pdf->Ln(5);
		if($_GET['desde']=='' OR $_GET['hasta']=='')
		{//ejecuta si hay area seleccionada pero no hay fechas
			//Se imprime cada area
			//se imprimen los resguardios de cada área y todas las fechas si estan vacias
			$sqlResguardo="SELECT * FROM resguardo_prod WHERE are_cod=".$filaAreas['id_area'];
			$datosResguardo=select($sqlResguardo);
			while($filaResguardo=mysqli_fetch_array($datosResguardo))
			{
				$fecha = explode(' ',$filaResguardo['fecha_entrega']);
				//Se imprimen todos los resguardos por area
				$pdf->SetFillColor(0,128,255);
				$pdf->Cell(190,5,utf8_decode('Resguardo: '.$filaResguardo['id_resguardo']),1,1,'C',true);
				$pdf->SetFillColor(216,216,216);
				$pdf->Cell(20,5,utf8_decode('Id resguardo'),1,0,'C',true);
				$pdf->Cell(40,5,utf8_decode('Código de persona'),1,0,'C',true);
				$pdf->Cell(50,5,utf8_decode('Área'),1,0,'C',true);
				$pdf->Cell(30,5,utf8_decode('Fecha de entrega'),1,0,'C',true);
				$pdf->Cell(50,5,utf8_decode('Distribuidor'),1,1,'C',true);

				$pdf->Cell(20,5,utf8_decode($filaResguardo['id_resguardo']),1,0,'C',false);
				$pdf->Cell(40,5,utf8_decode($filaResguardo['pers_cod']),1,0,'C',false);
				$pdf->Cell(50,5,utf8_decode($filaAreas['area']),1,0,'C',false);
				$pdf->Cell(30,5,utf8_decode($fecha[0]),1,0,'C',false);
				$pdf->Cell(50,5,utf8_decode($filaResguardo['users_cod']),1,1,'C',false);
				$pdf->SetFillColor(0,128,255);
				$pdf->Cell(190,5,utf8_decode('Productos'),1,1,'C',true);
				$pdf->SetFillColor(216,216,216);
				$sqlProductos="SELECT * FROM romp r 
				LEFT JOIN resguardo_prod rp ON r.id_resguardo_fk=rp.id_resguardo 
				LEFT JOIN gencod_producto gp ON r.id_gencod_prod_fk=gp.id_gencod_prod 
				LEFT JOIN producto p ON gp.cod_producto=p.cod_producto 
				LEFT JOIN unidad_de_med_prod up ON up.id_uni_de_med=p.id_uni_de_med 
				LEFT JOIN recurso_prod rec ON rec.id_recurso=p.id_recurso 
				WHERE rp.id_resguardo=".$filaResguardo['id_resguardo'];
				$datosProductos=select($sqlProductos);
				while($filaProductos=mysqli_fetch_array($datosProductos))
				{
					$pdf->Cell(20,5,utf8_decode('Código'),1,0,'C',true);
					$pdf->Cell(40,5,utf8_decode('Unidad de medida'),1,0,'C',true);
					$pdf->Cell(50,5,utf8_decode('Recurso'),1,0,'C',true);
					$pdf->Cell(30,5,utf8_decode('Descripción'),1,0,'C',true);
					$pdf->Cell(50,5,utf8_decode('Cantidad'),1,1,'C',true);
					$pdf->Cell(20,5,utf8_decode($filaProductos['cod_producto']),1,0,'C',false);
					$pdf->Cell(40,5,utf8_decode($filaProductos['desc_uni_med']),1,0,'C',false);
					$pdf->Cell(50,5,utf8_decode($filaProductos['nombre_recurso']),1,0,'C',false);
					$pdf->Cell(30,5,utf8_decode($filaProductos['desc_producto']),1,0,'C',false);
					$pdf->Cell(50,5,utf8_decode($filaProductos['cant_prod']),1,1,'C',false);
				}
				$pdf->Ln(5);
			}
			$pdf->Ln(5);
		}else
		{//se ejecuta si hay area y fechas seleccionadas
			$sqlResguardo=
			"SELECT * FROM resguardo_prod 
			WHERE fecha_entrega BETWEEN '$_GET[desde] 00:00:00' AND '$_GET[hasta] 23:59:59' 
			AND are_cod= $_GET[are_cod]
			ORDER BY fecha_entrega";
			$datosResguardo=select($sqlResguardo);
			while($filaResguardo=mysqli_fetch_array($datosResguardo))
			{
				$fecha = explode(' ',$filaResguardo['fecha_entrega']);
				//Se imprimen todos los resguardos por area
				$pdf->SetFillColor(0,128,255);
				$pdf->Cell(190,5,utf8_decode('Resguardo: '.$filaResguardo['id_resguardo']),1,1,'C',true);
				$pdf->SetFillColor(216,216,216);
				$pdf->Cell(20,5,utf8_decode('Id resguardo'),1,0,'C',true);
				$pdf->Cell(40,5,utf8_decode('Código de persona'),1,0,'C',true);
				$pdf->Cell(50,5,utf8_decode('Área'),1,0,'C',true);
				$pdf->Cell(30,5,utf8_decode('Fecha de entrega'),1,0,'C',true);
				$pdf->Cell(50,5,utf8_decode('Distribuidor'),1,1,'C',true);

				$pdf->Cell(20,5,utf8_decode($filaResguardo['id_resguardo']),1,0,'C',false);
				$pdf->Cell(40,5,utf8_decode($filaResguardo['pers_cod']),1,0,'C',false);
				$pdf->Cell(50,5,utf8_decode($filaAreas['area']),1,0,'C',false);
				$pdf->Cell(30,5,utf8_decode($fecha[0]),1,0,'C',false);
				$pdf->Cell(50,5,utf8_decode($filaResguardo['users_cod']),1,1,'C',false);
				$pdf->SetFillColor(0,128,255);
				$pdf->Cell(190,5,utf8_decode('Productos'),1,1,'C',true);
				$pdf->SetFillColor(216,216,216);
				$sqlProductos="SELECT * FROM romp r 
				LEFT JOIN resguardo_prod rp ON r.id_resguardo_fk=rp.id_resguardo 
				LEFT JOIN gencod_producto gp ON r.id_gencod_prod_fk=gp.id_gencod_prod 
				LEFT JOIN producto p ON gp.cod_producto=p.cod_producto 
				LEFT JOIN unidad_de_med_prod up ON up.id_uni_de_med=p.id_uni_de_med 
				LEFT JOIN recurso_prod rec ON rec.id_recurso=p.id_recurso 
				WHERE rp.id_resguardo=".$filaResguardo['id_resguardo'];
				$datosProductos=select($sqlProductos);
				while($filaProductos=mysqli_fetch_array($datosProductos))
				{
					$pdf->Cell(20,5,utf8_decode('Código'),1,0,'C',true);
					$pdf->Cell(40,5,utf8_decode('Unidad de medida'),1,0,'C',true);
					$pdf->Cell(50,5,utf8_decode('Recurso'),1,0,'C',true);
					$pdf->Cell(30,5,utf8_decode('Descripción'),1,0,'C',true);
					$pdf->Cell(50,5,utf8_decode('Cantidad'),1,1,'C',true);
					$pdf->Cell(20,5,utf8_decode($filaProductos['cod_producto']),1,0,'C',false);
					$pdf->Cell(40,5,utf8_decode($filaProductos['desc_uni_med']),1,0,'C',false);
					$pdf->Cell(50,5,utf8_decode($filaProductos['nombre_recurso']),1,0,'C',false);
					$pdf->Cell(30,5,utf8_decode($filaProductos['desc_producto']),1,0,'C',false);
					$pdf->Cell(50,5,utf8_decode($filaProductos['cant_prod']),1,1,'C',false);
				}
				$pdf->Ln(5);
			}
			$pdf->Ln(5);
		}
	}
}

/*if($_GET['desde']=='' OR $_GET['hasta']=='')
{
	$datos = select("SELECT * FROM resguardo_prod 
	WHERE are_cod = $_GET[are_cod]
	ORDER BY fecha_entrega");
}else
{
	$datos = select("SELECT * FROM resguardo_prod 
	WHERE fecha_entrega BETWEEN '$_GET[desde] 00:00:00' AND '$_GET[hasta] 23:59:59' 
	AND are_cod = $_GET[are_cod]
	ORDER BY fecha_entrega");
}

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
}*/

$pdf->OutPut('Reporte.pdf',"I");
?>