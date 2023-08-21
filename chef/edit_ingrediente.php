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
    $estado = trim($_POST['estado']);
    $orden = "UPDATE comida set estado='$estado' WHERE id_comida = $id";
    mysqli_query($conex,$orden);

    $_SESSION['message']='Registro Editado Satisfactoriamente';
    $_SESSION['message_type']='success';
    header("Location: reg_menu.php");
}

?>
<div class=" container" id='form'>
	<br>
	<!-- Formulario -->
	<form  action="edit_reg_menu.php?id=<?php echo $_GET['id']; ?>" method="POST">	  
		  <!-- Iniciando DATOS DE IDENTIFICACION-->
		  <h4 class="subtitulo">I. Datos de comida:</h4>
		  <!-- Fila 1-->
		  <div class="form-row">
		    <div class="form-group col-md-4 col-lg-4 col-sm-12">
		      <label for="inputNombre">Nombre Comida </label>
		      <input type="text"  class="form-control" id="inputNombre" name="nom_comida" 
              value="<?php echo $nom_comida; ?>" 
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
              pattern="[A-Z]+" title="Error! Ejemplo: FRICASE" disabled>
		    </div>
		    <div class="form-group col-md-4 col-lg-4 col-sm-12">
		      <label for="inputPrecio">Precio </label>
		      <input type="text" class="form-control" id="inputPrecio" name="precio" value="<?php echo $precio; ?>" 
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
              pattern="[0-9]+"  title="Error! Ejemplo: 20" disabled>
		    </div>
		    <div class="form-group col-md-4 col-lg-4 col-sm-12">
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
                 	    
		  <button class="btn btn-success" name="actualizacion">Actualizar</button> 
	</form>
</div>
    
<?php  require_once "vistas/parte_inf_sis.php" ?>