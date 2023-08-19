<?php 
$id = 3;
if (isset($_GET['del'])) {
    $id = $_GET['del'];
}
include("../conexion/conexiondb.php");
$cosulta=mysqli_query($conex,"SELECT * FROM bebida WHERE id_bebida = '$id' "); 
$row = mysqli_fetch_array($cosulta);
$novo = "1";
$orden = "UPDATE bebida set id_status='$novo' WHERE id_bebida = $id";
mysqli_query($conex,$orden);

$_SESSION['message']='Se Habilito el resgistro!!';
$_SESSION['message_type']='success';
header("Location: reg_bebida_hab.php");

?>