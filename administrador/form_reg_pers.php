<?php 
$iduser = 1;
include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
<style type="text/css">
	#font-variant-numeric: {
		padding: 5em;
		width: 60em;
	}
	.subtitulo{
		color: #556B2F;
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
	<button class="btn btn-danger pull-right" onclick="location.href='reg_personal.php'">x</button>
	
	<br>
	<!-- Formulario -->
	<form method="POST" action="guardar_registro.php">
				  <!-- Iniciando DATOS DE IDENTIFICACION-->
		  <h4 class="subtitulo">I. Datos de Registro Personal:</h4>
		  <!-- Fila 1-->
		  <div class="form-row">
		    <div class="form-group col-md-4 col-lg-4">
		      <label for="inputNombre">Nombre</label>
		      <input type="text"  class="form-control" id="inputNombre" name="nombre" 
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: SERGIO" required >
		    </div>
		    <div class="form-group col-md-4 col-lg-4">
		      <label for="inputApellido">Apellido</label>
		      <input type="text" class="form-control" id="inputApellido" name="apellido" 
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
              pattern="[a-zA-Z\s]+"  title="Error! Ejemplo: QUISPE" required>
		    </div>
		    <div class="form-group col-md-4 col-lg-4">
		      <label for="inputCi">CI</label>
		      <input type="text" class="form-control" id="inputCi" name="ci" pattern="[0-9]+" 
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
              minlength="7" maxlength="11"  title="Error! Ejemplo: 87451232"  required>
		    </div>
		   </div>
	   	    <!-- Fila 2-->
	   	    <div class="form-row">
			    <div class="form-group col-md-4">
			    	<label for="inputGenero">Genero</label>
	 				<select class="form-control " id="inputGenero" name="genero" required>				       
					   <option type="text" value="MASCULINO" >MASCULINO</option>
					   <option type="text" value="FEMENINO" >FEMENINO</option>
					</select>
 				</div>	
			    <div class="form-group col-md-4">
			      <label for="inputCelular">Celular</label>
			      <input type="text" class="form-control" id="inputCelular" name="celular" 
                  onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                  pattern="[0-9]{8}" minlength="8" maxlength="8" title="Error! Ejemplo: 78452123" required>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="inputEmpleado">Tipo de Empleado</label>
			      <select class="form-control " id="inputEmpleado" name="empleado" required>
			        <option value="1">ADMINISTRADOR</option>
			        <option value="2">CAJERO</option>
			        <option value="3">CHEF</option>
                    <option value="4">CAMARERO</option>
			      </select>			     		      
			    </div>
	   	    </div>
	   	    <!-- Fila 2-->
	   	    <h4 class="subtitulo">II. Datos de Usuario</h4>
	   	    <div class="form-row">	   	    	
			    <div class="form-group col-md-6 col-lg-6">
			      <label for="inputUser">Usuario</label>
			      <input type="text" class="form-control" id="inputUser" name="usuario" 
                  pattern="[a-z]+"  title="Error! Ejemplo: novour" required>
			    </div>
                <div class="form-group col-md-6 col-lg-6">
			      <label for="inputPass">Password</label>
			      <input type="text" class="form-control" id="inputPass" name="contrasena" 
                  pattern="[a-z0-9]+"  title="Error! longitud de 8" required>
			    </div>			   
	   	    </div>
		  <input type="submit" class="btn btn-success" name="entrale" > 
		  <button type="button" class="btn btn-danger" onclick="location.href='reg_personal.php'">Cancelar</button>
	</form>
</div>
</body>
</html>

<?php  require_once "vistas/parte_inf_sis.php" ?>