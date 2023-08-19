<?php 
include("../conexion/conexiondb.php");
date_default_timezone_set("America/La_Paz");
$iduser = 1;
if (isset($_GET['id'])) {
    $iduser = $_GET['id'];
	$query = "SELECT * FROM administrador WHERE id_personal = $iduser";
    $resultado = mysqli_query($conex,$query);
    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);        
        $idadmin= $row['id_administrador']; 
    }   
}


if (isset($_POST['entrale'])) {	
	$nombre= trim($_POST['nombre_c']);
	$precio = trim($_POST['precio']);
	$estado = trim($_POST['estado']);
	$categoria = trim($_POST['categoria']);	
	$detalle = trim($_POST['detalle']);
	$imagen = addslashes(file_get_contents($_FILES['imge']['tmp_name']));
	$status = "1";
	$query = "INSERT INTO comida(img_comida, nom_comida, precio, estado, detalle, id_administrador, id_cat_comida, id_status) 
	VALUES ('$imagen','$nombre','$precio','$estado','$detalle','$idadmin','$categoria','$status')";
	$resultado = @mysqli_query($conex,$query);
	if (!$resultado) {
		die("Fallo al ingresar registro");
	} 
	$_SESSION['message']='Registro guardado correctamente!!';
	$_SESSION['message_type']='success';
	header("Location: form_reg_comida.php");
	
}
?>