<?php  include("../conexion/conexiondb.php");
$iduser = 1;
require_once "vistas/parte_sup_sis.php";
if (isset($_SESSION['mensaje'])) {
	$iduser=$_SESSION['mensaje'];
    $query = "SELECT * FROM personal WHERE id_personal = $iduser";
    $resultado = mysqli_query($conex,$query);
    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);        
        $nom= $row['nombre']; 
		$ape= $row['apellido'];
    }   
	echo "<h1>BIENVENIDO: $nom $ape</h1>";
}?>


<?php  require_once "vistas/parte_inf_sis.php" ?>