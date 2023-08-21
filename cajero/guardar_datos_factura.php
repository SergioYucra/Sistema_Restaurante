<?php 
$iduser = 1;
include("../conexion/conexiondb.php");
$sum=0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];	
	$consult = "SELECT * FROM pedido_comida WHERE id_pedido = $id" ;                      
	$result = mysqli_query($conex,$consult); 
	while ($row = mysqli_fetch_array($result)) {
		$x = $row['id_comida'];
		$consul = "SELECT * FROM comida WHERE id_comida = $x" ; 
		$res_comida = mysqli_query($conex,$consul); 
		$rew =mysqli_fetch_array($res_comida);
		$precio = $rew['precio'];
		$sub = (int) $precio;
		$cantidad = $row['cantidad'];
		$can = (int)$cantidad;
		$total_plato = $sub*$cantidad;
		$sum=$sum+$total_plato;
	}
}

date_default_timezone_set("America/La_Paz");
if (isset($_POST['ingresa'])) {	
	$razon_social = trim($_POST['rsocial']);
    $nit = trim($_POST['nit']);
    $fecha = date("d/m/y");
	$hora = date("H:i A");
    $metodo_pago = trim($_POST['metodo']);
    
		$reg = "INSERT INTO factura_venta(razon_social_cliente, nit, fecha_factura_venta, hora_factura_venta, metodo_pago, total_pago, id_cajero, id_pedido) 
		VALUES ('$razon_social', '$nit', '$fecha','$hora', '$metodo_pago','$sum','$iduser','$id')";
		$resul= @mysqli_query($conex,$reg);
		if (!$resul) {
			die("Fallo al ingresar registro");
		}		
		$_SESSION['message']='Registro guardado correctamente!!';
		$_SESSION['message_type']='success';
		header("Location: facturacion.php");
    }	
?>

<?php  require_once "vistas/parte_inf_sis.php" ?>