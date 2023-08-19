<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php"; 
//sacar datos
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM comida WHERE id_comida = $id";
    $resultado = mysqli_query($conex,$query);
    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);        
        $nom_comida= $row['nom_comida'];
        $precio= $row['precio'];
        $estado = $row['estado'];
        $detalle = $row['detalle'];
        $categoria=$row['id_cat_comida'];       
    }    
}
//meter datos
if(isset($_POST['actualizacion'])){
    $id = $_GET['id'];
    $nombre= trim($_POST['nombre_c']);
	$precio = trim($_POST['precio']);
	$estado = trim($_POST['estado']);
	$categoria = trim($_POST['categoria']);	
	$detalle = trim($_POST['detalle']);
	$orden = "UPDATE comida SET nom_comida='$nombre',precio='$precio',estado='$estado',
	detalle='$detalle',id_cat_comida='$categoria' WHERE id_comida = $id";
    mysqli_query($conex,$orden);

    $_SESSION['message']='Registro Editado Satisfactoriamente';
    $_SESSION['message_type']='success';
    header("Location: reg_comida.php");
}

?>
<div class=" container" id='form'>
	<br>
	<!-- Formulario -->
	<form method="POST" action="edit_comi_admin.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
		<h4 class="subtitulo" align="center">Registro de Comida</h4>		
		<!-- Fila 1-->
		<div class="form-row">
			<div class="form-group col-md-4 col-lg-4">
		      <label for="inputNombre_c">Nombre Comida</label>
		      <input type="text"  class="form-control" id="inputNombre_c" name="nombre_c" value="<?php echo $nom_comida; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: FRICASE" required >
		    </div>
		    <div class="form-group col-md-4 col-lg-4">
		      <label for="inputPrecio">Precio</label>
		      <input type="number" class="form-control" id="inputPrecio" name="precio" value="<?php echo $precio; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
              pattern="[0-9]+"  title="Error! Ejemplo: 30" required>
		    </div>
		    <div class="form-group col-md-4">
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
		   </div>
	   	    <!-- Fila 2-->
	   	    <div class="form-row">
			    <div class="form-group col-md-6">
			    	<label for="inputCategoria">Categoria</label>
	 				<select class="form-control " id="inputCategoria" name="categoria" required> 
						<?php
						switch ($categoria) {
							case 1:
								?> 
								<option type="text" selected value="1" >PLATILLO</option>
								<option type="text" value="2" >POSTRE</option>
								<option type="text" value="3" >ESPECIAL</option>
								<?php
								break;
							case 2:
								?> 
								<option type="text" value="1" >PLATILLO</option>
								<option type="text" selected value="2" >POSTRE</option>
								<option type="text" value="3" >ESPECIAL</option>
								<?php
								break;
							case 3:
								?> 
								<option type="text" value="1" >PLATILLO</option>
								<option type="text" value="2" >POSTRE</option>
								<option type="text" selected value="3" >ESPECIAL</option>
								<?php
								break;
						} 
						?>   
					</select>
 				</div>				    			 
	   	    </div>
	   	    <div class="form-row">
	   	    <div class="form-group col-md-12">
				<label for="Observaciones">Detalles</label>
				<textarea type="text" class="form-control" id="Observaciones" rows="3" name="detalle" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
				pattern="^[A-Z0-9 -?]+$"  title="Ingrese algun tipo de detalle"><?php echo $detalle; ?></textarea>
				</div>	
			</div>
	   	    <br>   	    
		  <input type="submit" class="btn btn-success" name="actualizacion" value="Actualizar"> 
		  <button type="button" class="btn btn-danger" onclick="location.href='reg_comida.php'">Cancelar</button>
	</form>
</div>
    
<?php  require_once "vistas/parte_inf_sis.php" ?>