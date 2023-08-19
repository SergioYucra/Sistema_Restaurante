<?php 
	include("../conexion/conexiondb.php");

	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$query = "DELETE FROM comida WHERE id_comida = $id";
		$resultado = mysqli_query($conex,$query);
		if(!$resultado){
			die("Fallo");
		}

		$_SESSION['message']='Registro eliminado Satisfactoriamente';
		$_SESSION['message_type']='danger';
		header("Location: reg_comida.php");
	} 
 ?>