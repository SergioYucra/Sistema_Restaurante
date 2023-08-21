<?php 
$iduser = 1;
include("../conexion/conexiondb.php");
date_default_timezone_set("America/La_Paz");
if (isset($_POST['entrale'])) {	
	$nombre= trim($_POST['nom_ingrediente']);
	$tipo = trim($_POST['tipo_ingrediente']);
	$precio = trim($_POST['precio']);

	
		$reg = "INSERT INTO ingrediente(nom_ingrediente, tipo_ingrediente, precio_ingrediente,id_factura_compra, id_proveedor) 
        VALUES ( '$nombre','$tipo','$precio','1','1')";
		$resul= @mysqli_query($conex,$reg);
		if (!$resul) {
			die("Fallo al ingresar registro");
		}		
		$_SESSION['message']='Registro guardado correctamente!!';
		$_SESSION['message_type']='success';
		header("Location: reg_ingrediente.php");
    }	
?>

<?php  require_once "vistas/parte_inf_sis.php" ?>