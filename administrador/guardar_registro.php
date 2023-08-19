<?php 
$iduser = 1;
include("../conexion/conexiondb.php");
date_default_timezone_set("America/La_Paz");
if (isset($_POST['entrale'])) {	
	$nombre= trim($_POST['nombre']);
	$apellido = trim($_POST['apellido']);
	$ci = trim($_POST['ci']);
	$genero = trim($_POST['genero']);
	$celular = trim($_POST['celular']);
	$empleado = trim($_POST['empleado']);
	$usuario = trim($_POST['usuario']);
	$contrasena = trim($_POST['contrasena']);

	//consulta si existe ese usuario registrado
	$cosulta=mysqli_query($conex,"SELECT * FROM personal WHERE ci = '$ci' AND usuario = '$usuario' ");
    if(mysqli_num_rows($cosulta)==1){
		//en caso de que exista el registro
        $_SESSION['message']='Error el usuario ya existe !!';
		    $_SESSION['message_type']='danger';
		    header("Location: form_reg_pers.php");
    }
    else{
		$reg = "INSERT INTO personal(ci, nombre, apellido, genero, telefono, id_cat_empleado, usuario, password, id_status) 
        VALUES ( '$ci','$nombre','$apellido','$genero','$celular','$empleado','$usuario','$contrasena','1')";
		$resul= @mysqli_query($conex,$reg);
		if (!$resul) {
			die("Fallo al ingresar registro");
		}
		$cosulta=mysqli_query($conex,"SELECT * FROM personal WHERE ci = '$ci' "); 
		$rew = mysqli_fetch_array($cosulta);
		$idpers = $rew['id_personal'];
		
		switch ($empleado) {
			case 1:
				$var= @mysqli_query($conex,"INSERT INTO administrador(id_personal) VALUES ('$idpers')");
				break;
			case 2:
				$var= @mysqli_query($conex,"INSERT INTO cajero(id_personal) VALUES ('$idpers')");
				break;
			case 3:
				$var= @mysqli_query($conex,"INSERT INTO chef(id_personal) VALUES ('$idpers')");
				break;
			case 4:
				$var= @mysqli_query($conex,"INSERT INTO camarero(id_personal) VALUES ('$idpers')");
				break;			
		}       
		$_SESSION['message']='Registro guardado correctamente!!';
		$_SESSION['message_type']='success';
		header("Location: form_reg_pers.php");
    }	
}
?>

<?php  require_once "vistas/parte_inf_sis.php" ?>