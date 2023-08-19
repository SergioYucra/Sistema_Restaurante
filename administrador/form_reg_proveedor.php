<?php 
$iduser = 1; 
if (isset($_GET['id'])) {
    $iduser = $_GET['id'];
}
include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
	<meta charset="utf-8">
<style type="text/css">
	#font-variant-numeric: {
		padding: 5em;
		width: 60em;
	}
	.subtitulo{
		color: #2A322E;
		font-weight: bold;
	}
	label{
		color: #556B2F;
	}
</style>
</head>
<body>
	
<div class=" container" id='form'>
	<?php if(isset($_SESSION['message'])){ ?> 
		<div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
			<strong></strong>  <?= $_SESSION['message']?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php session_unset(); } ?>
	<!-- Boton para volver -->
	<button class="btn btn-danger pull-right" onclick="location.href='reg_comida.php'">x</button>
	
	<br>
	<!-- Formulario -->
	<form method="POST" action="guardar_reg_prov.php?id=<?php echo $iduser ?>" enctype="multipart/form-data">
		<h4 class="subtitulo" align="center">Registro de Proveedor</h4>
		<!-- Fila 1-->
		<div class="form-row">
			<div class="form-group col-md-4 col-lg-6">
		      <label for="inputNombre_c">Nombre Proveedor</label>
		      <input type="text"  class="form-control" id="inputNombre_c" name="nombre_p" 
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: JUAN" required >
		    </div>
		    <div class="form-group col-md-4 col-lg-6">
		      <label for="inputPrecio">Apellido Proveedor</label>
		      <input type="text" class="form-control" id="inputPrecio" name="apellido_p" 
               onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: QUISPE" required>
		    </div>		    
		   </div>
	   	    <!-- Fila 2-->
	   	    <div class="form-row">
	   	    	<div class="form-group col-md-4 col-lg-6">
			      <label for="inputDireccion">Direccion</label>
			      <input type="text"  class="form-control" id="inputDireccion" name="direccion" 
	              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
	               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: AV. MONTES" required >
			    </div>
			    <div class="form-group col-md-4 col-lg-6">
			      <label for="inputTelefono">Telefono</label>
			      <input type="number" class="form-control" id="inputTelefono" name="telefono" 
	               onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
	               pattern="[0-9]+" title="Error! Ejemplo: 78564512" required>
			    </div>	
	   	    </div>  	    
	   	    <br>   	    
		  <input type="submit" class="btn btn-success" name="entrale" value="Registrar"> 
		  <button type="button" class="btn btn-danger" onclick="location.href='reg_proveedor.php'">Cancelar</button>
	</form>
</div>
</body>
</html>
<?php  require_once "vistas/parte_inf_sis.php" ?>