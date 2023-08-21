<?php 
	include("../conexion/conexiondb.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "DELETE FROM egresos WHERE id_egreso = $id";
		$resultado = mysqli_query($conex,$query);
		if(!$resultado){
			die("Fallo");
		}

		$_SESSION['message']='Registro eliminado Satisfactoriamente';
		$_SESSION['message_type']='danger';
		header("Location: reg_egreso.php");
	} 
 ?>