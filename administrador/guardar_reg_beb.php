<?php 
$iduser = 1;
if (isset($_GET['id'])) {
    $iduser = $_GET['id'];
}

include("../conexion/conexiondb.php");
date_default_timezone_set("America/La_Paz");
if (isset($_POST['entrale'])) {	
	$nombre= trim($_POST['nombre_b']);
	$precio = trim($_POST['precio']);
	$estado = trim($_POST['estado']);
	$tipo = trim($_POST['tipo_b']);	
	$imagen = addslashes(file_get_contents($_FILES['imge']['tmp_name']));
	$status = "1";
	$query = "INSERT INTO bebida(nom_bebida, img_bebida, tipo_bebida, estado, precio_bebida, id_proveedor, id_administrador, id_status) VALUES ('$nombre','$imagen','$tipo','$estado','$precio','1','$iduser','1')";
	$resultado = @mysqli_query($conex,$query);
	if (!$resultado) {
		die("Fallo al ingresar registro");
	} 
	$_SESSION['message']='Registro guardado correctamente!!';
	$_SESSION['message_type']='success';
	header("Location: form_reg_bebida.php");
	/*27-11-2004*/
}
?>