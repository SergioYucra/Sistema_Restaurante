<?php 
$id = 1;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
include("../conexion/conexiondb.php");
$cosulta=mysqli_query($conex,"SELECT * FROM comida WHERE id_comida = '$id' "); 
$row = mysqli_fetch_array($cosulta);
$estado = $row['estado'];
if ($estado == "DISPONIBLE") {
    $novo = "NO DISPONIBLE";
    $orden = "UPDATE comida set estado='$novo' WHERE id_comida = $id";
    mysqli_query($conex,$orden);
}else{
    $novo = "DISPONIBLE";
    $orden = "UPDATE comida set estado='$novo' WHERE id_comida = $id";
    mysqli_query($conex,$orden);
}	
$_SESSION['message']='El estado de la comida se cambio!!';
$_SESSION['message_type']='success';
header("Location: reg_menu.php");

?>