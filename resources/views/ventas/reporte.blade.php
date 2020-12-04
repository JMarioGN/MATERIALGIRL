<?php
require 'fpdf';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logol.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(70,10,'Reporte de ventas',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagína ').$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!') );
$pdf->Output();
?>