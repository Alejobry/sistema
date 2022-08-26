<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(90,10,'Reporte de ingreso de medicinas',1,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(50,10,'Descripcion', 1, 0, 'C', 0);
    $this->Cell(70,10,'Fecha de elaboracion', 1, 0, 'C', 0);
    $this->Cell(70,10,'Fecha de vencimiento', 1, 1, 'C', 0);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'conexion.php';
$consulta = "select * from producto";
$resultado = mysqli_query($conectar, $consulta);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(50,10,$row['name_medicine'], 1, 0, 'C', 0);
    $pdf->Cell(70,10,$row['fech_ela'], 1, 0, 'C', 0);
    $pdf->Cell(70,10,$row['fech_ven'], 1, 1, 'C', 0);
}



$pdf->Output();
?>
