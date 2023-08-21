<?php 
$iduser = 1;
include("../conexion/conexiondb.php");
date_default_timezone_set("America/La_Paz");
if (isset($_POST['ingresa'])) {	
	$concepto = trim($_POST['concepto']);
	$cantidad = trim($_POST['cantidad']);
    $fecha = trim($_POST['fecha']);

	
		$reg = "INSERT INTO `ingresos`( `concepto`, `cantidad`, `fecha`, `id_cajero`)
        VALUES ( '$concepto','$cantidad','$fecha','1')";
		$resul= @mysqli_query($conex,$reg);
		if (!$resul) {
			die("Fallo al ingresar registro");
		}		
		$_SESSION['message']='Registro guardado correctamente!!';
		$_SESSION['message_type']='success';
		header("Location: reg_ingreso.php");
    }	
?>


<?php  require_once "vistas/parte_inf_sis.php" ?>