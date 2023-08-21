<?php 
$iduser = 1;
include("../conexion/conexiondb.php");
date_default_timezone_set("America/La_Paz");
if (isset($_POST['ingresa'])) {	
	$ci= trim($_POST['ci']);
	$razonsocial = trim($_POST['razon_social_cliente']);
	$nombre = trim($_POST['nom_cliente']);
    $apellido = trim($_POST['ap_cliente']);
    $telefono = trim($_POST['telefono_cliente']);
    $correo = trim($_POST['correo_cliente']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
	
		$reg = "INSERT INTO cliente(`ci`, `razon_social_cliente`, `nom_cliente`, `ap_cliente`, `telefono_cliente`, `correo_cliente`, `usuario`, `password`) 
        VALUES ( '$ci','$razonsocial','$nombre','$apellido','$telefono','$correo','$usuario','$password')";
		$resul= @mysqli_query($conex,$reg);
		if (!$resul) {
			die("Fallo al ingresar registro");
		}		
		$_SESSION['message']='Registro guardado correctamente!!';
		$_SESSION['message_type']='success';
		header("Location: reg_cliente.php");
    }	
?>

<?php  require_once "vistas/parte_inf_sis.php" ?>