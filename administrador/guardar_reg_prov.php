<?php 
$iduser = 1;
if (isset($_GET['id'])) {
    $iduser = $_GET['id'];
}

include("../conexion/conexiondb.php");
date_default_timezone_set("America/La_Paz");
if (isset($_POST['entrale'])) {	
	$nombre = trim($_POST['nombre_p']);
	$apellido = trim($_POST['apellido_p']);
	$direccion = trim($_POST['direccion']);
	$telefono = trim($_POST['telefono']);	
	$query = "INSERT INTO proveedor(nom_proveedor, ap_proveedor, direc_proveedor, telefono) VALUES ('$nombre','$apellido','$direccion','$telefono')";
	$resultado = @mysqli_query($conex,$query);
	if (!$resultado) {
		die("Fallo al ingresar registro");
	} 
	$_SESSION['message']='Registro guardado correctamente!!';
	$_SESSION['message_type']='success';
	header("Location: reg_proveedor.php");
	
}
?>