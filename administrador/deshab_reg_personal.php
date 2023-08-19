<?php 
if (isset($_GET['del'])) {
    $id = $_GET['del'];
}
include("../conexion/conexiondb.php");
$cosulta=mysqli_query($conex,"SELECT * FROM personal WHERE id_personal = '$id' "); 
$row = mysqli_fetch_array($cosulta);
$novo = "2";
$orden = "UPDATE personal set id_status='$novo' WHERE id_personal = $id";
mysqli_query($conex,$orden);

//$_SESSION['message']='Se deshabilito el registro!!';
//$_SESSION['message_type']='success';
header("Location: reg_personal.php");

?>