<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php"; 
//sacar datos
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM ingresos WHERE id_ingreso = $id";
    $resultado = mysqli_query($conex,$query);
    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);        
        $concepto= $row['concepto'];
        $cantidad= $row['cantidad'];
    }    
}
//meter datos
if(isset($_POST['actualizacion'])){
    $id = $_GET['id'];
    $concepto  = trim($_POST['concepto']); 
	$cantidad = trim($_POST['cantidad']);
	$orden = "UPDATE ingresos SET concepto='$concepto',cantidad='$cantidad' WHERE id_ingreso = $id";
    mysqli_query($conex,$orden);

    $_SESSION['message']='Registro Editado Satisfactoriamente';
    $_SESSION['message_type']='success';
    header("Location: reg_ingreso.php");
}

?>
<div class=" container" id='form'>
	<br>
	<!-- Formulario -->
	<form method="POST" action="edit_ingreso.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
		<h4 class="subtitulo" align="center">Registro de Ingreso</h4>		
		<!-- Fila 1-->
		<div class="form-row">
			<div class="form-group col-md-4 col-lg-4">
		      <label for="inputNombre_c">CONCEPTO</label>
		      <input type="text"  class="form-control" id="inputNombre_c" name="concepto" value="<?php echo $concepto; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: nomIngreso">
		    </div>
		    <div class="form-group col-md-4 col-lg-4">
		      <label for="inputPrecio">Cantidad</label>
		      <input type="number" class="form-control" id="inputPrecio" name="cantidad" value="<?php echo $cantidad; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
              pattern="[0-9]+"  title="Error! Ejemplo: 30" required>
		    </div>
	   	    
	   	    <br>   	    
		  <input type="submit" class="btn btn-success" name="actualizacion" value="Actualizar"> 
		  <button type="button" class="btn btn-danger" onclick="location.href='reg_ingreso.php'">Cancelar</button>
	</form>
</div>
    
<?php  require_once "vistas/parte_inf_sis.php" ?>