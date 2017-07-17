<?php 
include "fpdf/fpdf.php"; 

class Pdf extends FPDF
{

	function Header()
	{
		$this->Image('../img/logo_neza.png',10,5,50,30);
		$this->Image('../img/dgsc2.png',170,5,30,30);
	}
	function Footer()
	{

	}
	 
}

$pdf=new Pdf();
$pdf->OutPut('Solicitud.pdf',"I");
?>