<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/fpdf181/fpdf.php';


$boleto_url=file_get_contents('http://www.google.com');

//echo $boleto_url;

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$boleto_url);
$pdf->Output();

?>