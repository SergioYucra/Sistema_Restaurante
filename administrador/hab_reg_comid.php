<?php 
$id = 3;
if (isset($_GET['del'])) {
    $id = $_GET['del'];
}
include("../conexion/conexiondb.php");
$cosulta=mysqli_query($conex,"SELECT * FROM comida WHERE id_comida = '$id' "); 
$row = mysqli_fetch_array($cosulta);
$novo = "1";
$orden = "UPDATE comida set id_status='$novo' WHERE id_comida = $id";
mysqli_query($conex,$orden);

$_SESSION['message']='Se Habilito la comida!!';
$_SESSION['message_type']='success';
header("Location: reg_comida_hab.php");

?>