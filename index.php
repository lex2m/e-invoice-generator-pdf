<?php
#
require('fpdf/fpdf.php');
class PDF extends FPDF
{

	//[ Başlık ]
	function Header()
	{
		$uretilen_sayi = rand(100000, 999999);
		$grup1 = substr($uretilen_sayi, 0, 2);
		$grup2 = substr($uretilen_sayi, 2, 2);
		$grup3 = substr($uretilen_sayi, 4, 2);
		$harf1 = chr(rand(65, 90));
		$harf2 = chr(rand(65, 90));
		$serino = $grup1 . $harf1 . $grup2 . $harf2 . $grup3 . "";
		$faturabarkod = $harf2 . $grup2 . $grup3 . $harf1 . $grup1 . "";
		$vergino = $uretilen_sayi;

		$date = date('d/m/Y');
		$this->Setfont('arial', 'B', 20);
		$this->Image('LOGO.png', 15, 10, 20);
		$this->Cell(147);
		$this->Cell(30, 10, 'E-INVOICE', 0, 1, 'C');
		$this->Setfont('arial', '', 15);
		$this->Cell(147);
		$this->Cell(30, 10, 'INVOICE NO : ' . $faturabarkod, 0, 1, 'C');
		$this->Cell(147);
		$this->Cell(30, 10, 'SERIAL NO : ' . $serino, 0, 1, 'C');
		$this->Cell(18);
		$this->Cell(30, 10, 'DEAR: Onder OZTURK', 0, 0, 'C');
		$this->Cell(99);
		$this->Cell(30, 10, 'DATE : ' . $date, 0, 1, 'C');
		$this->Cell(16);
		$this->Cell(30, 10, 'TAX NO: ' . $vergino . $grup2 . $grup1, 0, 1, 'C');
		$this->Ln(10);


	}
	//[ Başlık  Bitiş]

	//[ Tablo Üst Bilgi]
	function HeaderTable()
	{
		$this->Setfont('arial', 'B', 16);
		$this->Cell(20, 6, 'ID', 1, 0, 'C');
		$this->Cell(30, 6, 'CODE', 1, 0, 'C');
		$this->Cell(40, 6, 'NAME', 1, 0, 'C');
		$this->Cell(50, 6, 'AMOUNT', 1, 0, 'C');
		$this->Cell(50, 6, 'PRICE', 1, 1, 'C');
	}

	//[ Tablo Üst Bilgi Bitiş]

	//[ Tablo  Bilgi ]
	function MainTable()
	{
		$this->Setfont('arial', 'i', 13);
		for ($i = 1; $i < 15; $i++) {

			$this->Cell(20, 6, $i, 1, 0, 'C');
			$this->Cell(30, 6, $i . 'B3' . $i . '', 1, 0, 'C');
			$this->Cell(40, 6, "PRODUCT" . $i, 1, 0, 'C');
			$this->Cell(50, 6, $i + 43, 1, 0, 'C');
			$this->Cell(50, 6, $i + 121, 1, 1, 'C');
		}
	}
	//[ Tablo  Bilgi  Bitiş]

	//[ Tablo Alt Bilgi]
	function FooterTable()
	{
		$this->Setfont('arial', 'B', 13);
		for ($i = 0; $i < 1; $i++) {

			$this->Cell(20, 6, "Total", 1, 0, 'C');
			$this->Cell(30, 6, "14 Codes", 1, 0, 'C');
			$this->Cell(40, 6, "14 Products", 1, 0, 'C');
			$this->Cell(50, 6, "707 Amounts", 1, 0, 'C');
			$this->Cell(50, 6, "1934 EUR", 1, 1, 'C');
		}
	}

	//[ Tablo Alt Bilgi Bitiş]


	//[Alt Başlık]
	function Footer()
	{
		$this->SetY(-130);
		$this->Setfont('Arial', 'B', 20);
		$this->Cell(200, 10, 'SAVE YOUR INVOICE', 0, 0, 'C');
		$this->Cell(40);
		$this->Image('QR.png', 80, 180, 50);
		$this->Cell(120);
		$this->SetY(275);
		$this->Setfont('Arial', 'B', 14);
		$this->Cell(55, 20, 'Namaste sample e-invoice.', 0, 0, 'C');
		$this->SetY(275);
		$this->Setfont('Arial', 'B', 14);
		$this->Cell(300, 20, 'All your rights are reserved.', 0, 0, 'C');

	}
	//[Alt Başlık Bitiş]
}


$pdf = new PDF();
$pdf->AddPage('P', 'A4');
$pdf->HeaderTable();
$pdf->MainTable();
$pdf->FooterTable();
$pdf->Output();



?>