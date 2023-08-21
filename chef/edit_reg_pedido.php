<?php 
$id = 1;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
include("../conexion/conexiondb.php");
$cosulta=mysqli_query($conex,"SELECT * FROM pedido WHERE id_pedido = '$id' "); 
$row = mysqli_fetch_array($cosulta);
$estado = $row['estado'];
if ($estado == "ENTREGADO") {
    $novo = "NO ENTREGADO";
    $orden = "UPDATE pedido set estado='$novo' WHERE id_pedido = $id";
    mysqli_query($conex,$orden);
}else{
    $novo = "ENTREGADO";
    $orden = "UPDATE pedido set estado='$novo' WHERE id_pedido = $id";
    mysqli_query($conex,$orden);
}	
$_SESSION['message']='El estado de la comida se cambio!!';
$_SESSION['message_type']='success';
header("Location: reg_pedido.php");

?>