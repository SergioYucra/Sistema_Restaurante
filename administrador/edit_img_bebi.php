<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php";  
//sacar datos
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM bebida WHERE id_bebida = $id";
    $resultado = mysqli_query($conex,$query);
    $row = mysqli_fetch_array($resultado);
}
if(isset($_POST['actualizacion'])){
    $id = $_GET['id'];
    $imagen = addslashes(file_get_contents($_FILES['imge']['tmp_name']));
	$orden = "UPDATE bebida SET img_bebida='$imagen' WHERE id_bebida = $id";
    mysqli_query($conex,$orden);

    $_SESSION['message']='Registro Editado Satisfactoriamente';
    $_SESSION['message_type']='success';
    header("Location: reg_bebida.php");
}
?>

<div class=" container" id='form'>
	<br>
	<!-- Formulario -->
	<form method="POST" action="edit_img_bebi.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
		
        <div class="form-row">
            
			<div class="form-group col-md-6 col-lg-6">
            <label for="">Imagen Actual</label> <br>
            <img src="data:image/jpg;base64,<?php echo base64_encode($row['img_bebida']);?>" width="100%">
            </div>             
	   	</div>  
        <div class="form-row">
			<div class="custom-file col-md-6">			    	
				<label for="inputImagen">Subir Nueva Imagen</label>
				<div class="custom-file">
					<input type="file" name="imge" class="custom-file-input" id="customFileLang" required>
					<label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
				</div>
			</div>              
	   	</div>    
        <br><br>	    
		  <input type="submit" class="btn btn-success" name="actualizacion" value="Actualizar"> 
		  <button type="button" class="btn btn-danger" onclick="location.href='reg_bebida.php'">Cancelar</button>
	</form>
</div>


<?php  require_once "vistas/parte_inf_sis.php" ?>