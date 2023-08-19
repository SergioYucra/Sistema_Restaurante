<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php"; 
//sacar datos
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM bebida WHERE id_bebida = $id";
    $resultado = mysqli_query($conex,$query);
    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);        
        $nom_comida= $row['nom_bebida'];
        $precio= $row['precio_bebida'];
        $estado = $row['estado'];
        $tipo=$row['tipo_bebida'];       
    }    
}
//meter datos
if(isset($_POST['actualizacion'])){
    $id = $_GET['id'];
    $nombre= trim($_POST['nombre_b']);
	$precio = trim($_POST['precio']);
	$estado = trim($_POST['estado']);
	$tipo = trim($_POST['tipo_b']);	

	$orden = "UPDATE bebida SET nom_bebida='$nombre',precio_bebida='$precio',estado='$estado',
	tipo_bebida='$tipo' WHERE id_bebida = $id";
    mysqli_query($conex,$orden);

    $_SESSION['message']='Registro Editado Satisfactoriamente';
    $_SESSION['message_type']='success';
    header("Location: reg_bebida.php");
}

?>
<div class=" container" id='form'>
	<br>
	<!-- Formulario -->
	<form method="POST" action="edit_bebi_admin.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
		<h4 class="subtitulo" align="center">Actualizacion de Registro de Bebida</h4>		
		<!-- Fila 1-->
		<div class="form-row">
			<div class="form-group col-md-6 col-lg-6">
		      <label for="inputNombre_c">Nombre Bebida</label>
		      <input type="text"  class="form-control" id="inputNombre_c" name="nombre_b" value="<?php echo $nom_comida; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: FRICASE" required >
		    </div>
		    <div class="form-group col-md-6 col-lg-6">
		      <label for="inputPrecio">Precio</label>
		      <input type="number" class="form-control" id="inputPrecio" name="precio" value="<?php echo $precio; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
              pattern="[0-9]+"  title="Error! Ejemplo: 30" required>
		    </div>		    
		   </div>
	   	    <!-- Fila 2-->
	   	    <div class="form-row">
	   	    	<div class="form-group col-md-6">
			   	<label for="inputEstado">Estado</label>
	 			<select class="form-control " id="inputEstado" name="estado" required>	 
				 		<?php if ($estado == "DISPONIBLE") {
	 				   		?>
	 				   		<option selected value="DISPONIBLE" >DISPONIBLE</option>
	 				   		<option value="NO DISPONIBLE" >NO DISPONIBLE</option>
	 				   		<?php
	 				   }else{?>
							<option value="DISPONIBLE" >DISPONIBLE</option>
	 				   		<option selected value="NO DISPONIBLE" >NO DISPONIBLE</option>
	 				   	<?php
	 				   } ?>	
				</select>
 			</div>	
			    <div class="form-group col-md-6">
			    	<label for="inputCategoria">Tipo de Bebida</label>
	 				<select class="form-control " id="inputCategoria" name="tipo_b" required> 
						<?php
						switch ($tipo) {
							case 'GASEOSA':
								?> 
								   <option type="text" selected value="GASEOSA" >GASEOSA</option>
								   <option type="text" value="JUGO" >JUGO</option>
								   <option type="text" value="REFRESCO" >REFRESCO</option>
								   <option type="text" value="VINO" >VINO</option>
								   <option type="text" value="COCTEL" >COCTEL</option>
								<?php
								break;
							case 'JUGO':
								?> 
								   <option type="text" value="GASEOSA" >GASEOSA</option>
								   <option type="text" selected value="JUGO" >JUGO</option>
								   <option type="text" value="REFRESCO" >REFRESCO</option>
								   <option type="text" value="VINO" >VINO</option>
								   <option type="text" value="COCTEL" >COCTEL</option>
								<?php
								break;
							case 'REFRESCO':
								?> 
								   <option type="text" value="GASEOSA" >GASEOSA</option>
								   <option type="text" value="JUGO" >JUGO</option>
								   <option type="text" selected value="REFRESCO" >REFRESCO</option>
								   <option type="text" value="VINO" >VINO</option>
								   <option type="text" value="COCTEL" >COCTEL</option>
								<?php
								break;
							case 'VINO':
								?> 
								   <option type="text" value="GASEOSA" >GASEOSA</option>
								   <option type="text" value="JUGO" >JUGO</option>
								   <option type="text" value="REFRESCO" >REFRESCO</option>
								   <option type="text" selected value="VINO" >VINO</option>
								   <option type="text" value="COCTEL" >COCTEL</option>
								<?php
								break;
							case 'COCTEL':
								?> 
								   <option type="text" value="GASEOSA" >GASEOSA</option>
								   <option type="text" value="JUGO" >JUGO</option>
								   <option type="text" value="REFRESCO" >REFRESCO</option>
								   <option type="text" value="VINO" >VINO</option>
								   <option type="text" selected value="COCTEL" >COCTEL</option>
								<?php
								break;
							} ?>   
					</select>
 				</div>				    			 
	   	    </div>
	   	    
	   	    <br>   	    
		  <input type="submit" class="btn btn-success" name="actualizacion" value="Actualizar"> 
		  <button type="button" class="btn btn-danger" onclick="location.href='reg_bebida.php'">Cancelar</button>
	</form>
</div>
    
<?php  require_once "vistas/parte_inf_sis.php" ?>