<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php"; 
//sacar datos
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM cliente WHERE id_cliente = $id";
    $resultado = mysqli_query($conex,$query);
    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);        
        $ci= trim($_POST['ci_cliente']);
        $razonsocial = trim($_POST['razon_social_cliente']);
        $nombre = trim($_POST['nom_cliente']);
        $apellido = trim($_POST['ap_cliente']);
        $telefono = trim($_POST['telefono_cliente']);
        $correo = trim($_POST['correo_cliente']);
        $usuario = trim($_POST['usuario']);
        $password = trim($_POST['password']);
    }    
}
//meter datos
if(isset($_POST['actualizacion'])){
    $id = $_GET['id'];
    $ci= trim($_POST['ci_cliente']);
	$razonsocial = trim($_POST['razon_social_cliente']);
	$nombre = trim($_POST['nom_cliente']);
    $apellido = trim($_POST['ap_cliente']);
    $telefono = trim($_POST['telefono_cliente']);
    $correo = trim($_POST['correo_cliente']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
	$orden = "UPDATE cliente SET `ci`='$ci', `razon_social_cliente`='$razonsocial', `nom_cliente`='$nombre', `ap_cliente`='$apellido', `telefono_cliente`='$telefono', `correo_cliente`='$correo', `usuario`='$usuario', `password`='$password'";
    mysqli_query($conex,$orden);

    $_SESSION['message']='Registro Editado Satisfactoriamente';
    $_SESSION['message_type']='success';
    header("Location: reg_cliente.php");
}

?>
<div class=" container" id='form'>
	<br>
	<!-- Formulario -->
	<form method="POST" action="editar_cliente.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
		<h4 class="subtitulo" align="center">Editar Cliente</h4>		
		<!-- Fila 1-->
		<div class="form-row">
            <div class="form-group col-md-4 col-lg-4">
		      <label for="inputCi">CI</label>
		      <input type="text"  class="form-control" id="inputCi" name="ci" value="<?php echo $ci; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: 1234453" required >
		    </div>
            <div class="form-group col-md-4 col-lg-4">
		      <label for="inputRazonSocial">Razon Social</label>
		      <input type="text"  class="form-control" id="inputRazonSocial" name="razon_social_cliente" value="<?php echo $razonsocial; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: TORREZ" required >
		    </div>
			<div class="form-group col-md-4 col-lg-4">
		      <label for="inputNombre">Nombre</label>
		      <input type="text"  class="form-control" id="inputNombre" name="nom_cliente" value="<?php echo $nombre; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: MARIA" required >
		    </div>
            <div class="form-group col-md-4 col-lg-4">
		      <label for="inputApellido">Apellido</label>
		      <input type="text"  class="form-control" id="inputApellido" name="ap_cliente" value="<?php echo $apellido; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: MAMANI PEREZ" required >
		    </div>
            <div class="form-group col-md-4 col-lg-4">
		      <label for="inputTel">Telefono</label>
		      <input type="text"  class="form-control" id="inputTel" name="telefono_cliente" value="<?php echo $telefono; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: 67542113" required >
		    </div>
            <div class="form-group col-md-4 col-lg-4">
		      <label for="inputCorreo">Correo</label>
		      <input type="text"  class="form-control" id="inputTel" name="correo_cliente" value="<?php echo $correo; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: example@gmail.com" required >
		    </div>
            <div class="form-group col-md-4 col-lg-4">
		      <label for="inputUsuario">Usuario</label>
		      <input type="text"  class="form-control" id="inputUsuario" name="usuario" value="<?php echo $usuario; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: example@gmail.com" required >
		    </div>
            <div class="form-group col-md-4 col-lg-4">
		      <label for="inputPass">Password</label>
		      <input type="text"  class="form-control" id="inputPass" name="password" value="<?php echo $password; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: ***************" required >
		    </div>
	   	    <br>   	    
		  <input type="submit" class="btn btn-success" name="actualizacion" value="Actualizar"> 
		  <button type="button" class="btn btn-danger" onclick="location.href='reg_cliente.php'">Cancelar</button>
	</form>
</div>
    
<?php  require_once "vistas/parte_inf_sis.php" ?>