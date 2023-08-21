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
        $this->Cell(50,20,'FACTURA DE COMPRA ',0,1,'C');
        $this->Cell(200,5,' PROOVEDORES ',0,1,'C');
        // Salto de línea
        $this->Ln(20);
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
        //01-09-1999
    }
}



$pdf = new PDF('P','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage('portrait', array(200,230));
$pdf->SetFont('Arial','B',12); 
$pdf->Line(12,45,185,45);
$pdf->Line(12,46,185,46);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM factura_compra WHERE id_factura_compra = $id";
    $resultado = mysqli_query($conex,$query);
    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);
        $rsocial = $row['razon_social_cliente'];
        $nit= $row['nit'];
        $fecha= $row['fecha_factura_compra'];
        $hora = $row['hora_factura_compra'];
        $mpago = $row['metodo_pago'];
        $total = $row['total_pago'];
    }  
}

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-7,"                                                                               NIT: 154578021",0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,17,"                                                                               FACTURA No.: $id",0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-7,"                                                             AUTORIZACION No: 34854121554215",0,1);

//linea de separacion
$pdf->Line(12,65,185,65);
$pdf->SetFont('Arial','B',11);  
$pdf->Cell(60,40,utf8_decode("FECHA:                      HORA:                       NIT:  ") ,0,1);

$pdf->SetFont('Arial','',11);  
$pdf->Cell(60,-40,utf8_decode("               $fecha                  $hora                $nit  ") ,0,1);

$pdf->SetFont('Arial','B',11);  
$pdf->Cell(60,55,utf8_decode("SEÑORES:                              NIT/CI:  ") ,0,1);

$pdf->SetFont('Arial','',11);  
$pdf->Cell(60,-55,utf8_decode("                    $rsocial                            $nit  ") ,0,1);

$pdf->SetFont('Arial','B',11);  
$pdf->Cell(60,70,utf8_decode("METODO DE PAGO: ") ,0,1);

$pdf->SetFont('Arial','',11);  
$pdf->Cell(60,-70,utf8_decode("                                    $mpago  ") ,0,1);

//linea de separacion
$pdf->Line(12,97,185,97);

$pdf->SetFont('Arial','',11);  
$pdf->Cell(60,90,utf8_decode(" PAGO TOTAL:  $total") ,0,1);



$pdf->Output();
?>