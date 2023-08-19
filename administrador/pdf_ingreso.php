<?php
require('../fpdf/fpdf.php');
include("../conexion/conexiondb.php");

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../img/logo.png',10,8,30);
        // Arial bold 15
        $this->SetFont('Arial','B',18);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(50,20,'INGRESO DE RESTAURANT WEBSITE',0,1,'C');
        $this->Cell(200,5,' HAMBRE Y SED',0,1,'C');
        // Salto de línea
        $this->Ln(20);
        // tabla
        $this->SetFont('Arial','B',10);
        $this->Cell(30,8,'NRO.',1,0,'C',0);
        $this->Cell(50,8,'RAZON SOCIAL',1,0,'C',0);
        $this->Cell(30,8,'FECHA',1,0,'C',0);
        $this->Cell(30,8,'HORA',1,0,'C',0);
        $this->Cell(30,8,'METODO',1,1,'C',0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',10);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ') .$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF('P','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12); 
$pdf->Line(12,45,200,45);
$pdf->Line(12,46,200,46);

$query = "SELECT * FROM factura_venta";
$resultado_reg = mysqli_query($conex,$query);
while ($row = mysqli_fetch_array($resultado_reg)) {
    $iden = $row['id_factura_venta'];
    $rsocial = $row['razon_social_cliente'];
    $nit = $row['nit'];
    $fecha = $row['fecha_factura_venta'];    
    $hora = $row['hora_factura_venta'];
    $metodo = $row['metodo_pago']; 
   
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30,8,$iden,1,0,'C',0);
    $pdf->Cell(50,8,$rsocial,1,0,'C',0);
    $pdf->Cell(30,8,$fecha,1,0,'C',0);
    $pdf->Cell(30,8,$hora,1,0,'C',0);
    $pdf->Cell(30,8,$metodo,1,1,'C',0);
}


$pdf->Output();
?>