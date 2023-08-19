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
	<form method="POST" action="guardar_reg_com.php?id=<?php echo $iduser ?>" enctype="multipart/form-data">
		<h4 class="subtitulo" align="center">Registro de Comida</h4>
		<!-- Fila 1-->
		<div class="form-row">
			<div class="form-group col-md-4 col-lg-4">
		      <label for="inputNombre_c">Nombre Comida</label>
		      <input type="text"  class="form-control" id="inputNombre_c" name="nombre_c" 
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: FRICASE" required >
		    </div>
		    <div class="form-group col-md-4 col-lg-4">
		      <label for="inputPrecio">Precio</label>
		      <input type="number" class="form-control" id="inputPrecio" name="precio" 
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
              pattern="[0-9]+"  title="Error! Ejemplo: 30" required>
		    </div>
		    <div class="form-group col-md-4">
			   	<label for="inputEstado">Estado</label>
	 			<select class="form-control " id="inputEstado" name="estado" required>	       
				   <option type="text" value="DISPONIBLE" >DISPONIBLE</option>
				   <option type="text" value="NO DISPONIBLE" >NO DISPONIBLE</option>
				</select>
 			</div>	
		   </div>
	   	    <!-- Fila 2-->
	   	    <div class="form-row">
			    <div class="form-group col-md-6">
			    	<label for="inputCategoria">Categoria</label>
	 				<select class="form-control " id="inputCategoria" name="categoria" required>       
					   <option type="text" value="1" >PLATILLO</option>
					   <option type="text" value="2" >POSTRE</option>
					   <option type="text" value="3" >ESPECIAL</option>
					</select>
 				</div>	
			    <div class="custom-file col-md-6">			    	
				    <label for="inputImagen">Imagen de Comida</label>
				    <div class="custom-file">
						<input type="file" name="imge" class="custom-file-input" id="customFileLang" required>
						<label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
					</div>
				 </div>
	   	    </div>
	   	    <div class="form-row">
	   	    <div class="form-group col-md-12">
				<label for="Observaciones">Detalles</label>
				<textarea type="text" class="form-control" id="Observaciones" rows="3" name="detalle" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z0-9 -?]+$"  title="Ingrese algun tipo de detalle"></textarea>
				</div>	
			</div>
	   	    <br>   	    
		  <input type="submit" class="btn btn-success" name="entrale" value="Registrar"> 
		  <button type="button" class="btn btn-danger" onclick="location.href='reg_comida.php'">Cancelar</button>
	</form>
</div>
</body>
</html>
<?php  require_once "vistas/parte_inf_sis.php" ?>