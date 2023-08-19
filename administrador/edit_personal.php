<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php"; 
//sacar datos
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM personal WHERE id_personal = $id";
    $resultado = mysqli_query($conex,$query);
    if(mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);        
        $nombre= $row['nombre'];
        $apellido= $row['apellido'];
        $genero = $row['genero'];
        $telefono = $row['telefono'];
        $ci=$row['ci']; 
        $user=$row['usuario']; 
        $pass=$row['password'];
        $idcat=$row['id_cat_empleado']; 
    }    
}
if(isset($_POST['actualizacion'])){
    $id = $_GET['id'];
    $nombre= trim($_POST['nombre']);
    $apellido= trim($_POST['apellido']);
    $genero = trim($_POST['genero']);
    $telefono = trim($_POST['telefono']);
    $ci = trim($_POST['ci']);
    $user = trim($_POST['usuario']);
    $pass = trim($_POST['contrasena']);
    $idcat = trim($_POST['empleado']);

    $orden = "UPDATE personal SET ci ='$ci',nombre='$nombre',apellido='$apellido',genero='$genero',telefono='$telefono',usuario='$user',`password`='$pass',`id_cat_empleado`='$idcat' WHERE id_personal = $id";
    mysqli_query($conex,$orden);

    $_SESSION['message']='Registro Editado Satisfactoriamente';
    $_SESSION['message_type']='success';
    header("Location: reg_personal.php");
}
?>

<div class=" container" id='form'>    
    <!-- Boton para volver -->
    <button class="btn btn-danger pull-right" onclick="location.href='reg_personal.php'">x</button>
    
    <br>
    <!-- Formulario -->
    <form method="POST" action="edit_personal.php?id=<?php echo $_GET['id']; ?>">
                  <!-- Iniciando DATOS DE IDENTIFICACION-->
          <h4 class="subtitulo">I. Datos de Registro Personal:</h4>
          <!-- Fila 1-->
          <div class="form-row">
            <div class="form-group col-md-4 col-lg-4">
              <label for="inputNombre">Nombre</label>
              <input type="text"  class="form-control" id="inputNombre" name="nombre" value="<?php echo $nombre; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
               pattern="[a-zA-Z\s]+" title="Error! Ejemplo: SERGIO" required >
            </div>
            <div class="form-group col-md-4 col-lg-4">
              <label for="inputApellido">Apellido</label>
              <input type="text" class="form-control" id="inputApellido" name="apellido" value="<?php echo $apellido; ?>" 
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
              pattern="[a-zA-Z\s]+"  title="Error! Ejemplo: QUISPE" required>
            </div>
            <div class="form-group col-md-4 col-lg-4">
              <label for="inputCi">CI</label>
              <input type="text" class="form-control" id="inputCi" name="ci" pattern="[0-9]+" value="<?php echo $ci; ?>"
              onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
              minlength="7" maxlength="11"  title="Error! Ejemplo: 87451232"  required>
            </div>
           </div>
            <!-- Fila 2-->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputGenero">Genero</label>
                    <select class="form-control " id="inputGenero" name="genero" value="<?php echo $genero; ?>" required>
                        <?php if ($genero == "MASCULINO") {
                            ?>
                            <option selected value="MASCULINO" >MASCULINO</option>
                            <option value="FEMENINO" >FEMENINO</option>
                            <?php
                       }else{?>
                            <option value="MASCULINO" >MASCULINO</option>
                            <option selected value="FEMENINO" >FEMENINO</option>
                        <?php
                       } ?> 
                    </select>
                </div>  
                <div class="form-group col-md-4">
                  <label for="inputCelular">Celular</label>
                  <input type="text" class="form-control" id="inputCelular" name="telefono" value="<?php echo $telefono; ?>"
                  onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                  pattern="[0-9]{8}" minlength="8" maxlength="8" title="Error! Ejemplo: 78452123" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmpleado">Tipo de Empleado</label>
                  <select class="form-control " id="inputEmpleado" name="empleado" required>                    
                    <?php
                        switch ($idcat) {
                            case 1:
                                ?> 
                                <option value="1" selected>ADMINISTRADOR</option>
                                <option value="2">CAJERO</option>
                                <option value="3">CHEF</option>
                                <option value="4">CAMARERO</option>
                                <?php
                                break;
                            case 2:
                                ?> 
                                <option value="1">ADMINISTRADOR</option>
                                <option value="2" selected>CAJERO</option>
                                <option value="3">CHEF</option>
                                <option value="4">CAMARERO</option>
                                <?php
                                break;
                            case 3:
                                ?> 
                                <option value="1">ADMINISTRADOR</option>
                                <option value="2">CAJERO</option>
                                <option value="3" selected>CHEF</option>
                                <option value="4">CAMARERO</option>
                                <?php
                                break;
                             case 4:
                                ?> 
                                <option value="1">ADMINISTRADOR</option>
                                <option value="2">CAJERO</option>
                                <option value="3">CHEF</option>
                                <option value="4" selected>CAMARERO</option>
                                <?php
                                break;
                        } 
                        ?>  
                  </select>                           
                </div>
            </div>
            <!-- Fila 2-->
            <h4 class="subtitulo">II. Datos de Usuario</h4>
            <div class="form-row">              
                <div class="form-group col-md-6 col-lg-6">
                  <label for="inputUser">Usuario</label>
                  <input type="text" class="form-control" id="inputUser" name="usuario" value="<?php echo $user; ?>"
                  pattern="[a-z]+"  title="Error! Ejemplo: novour" required>
                </div>
                <div class="form-group col-md-6 col-lg-6">
                  <label for="inputPass">Password</label>
                  <input type="text" class="form-control" id="inputPass" name="contrasena" value="<?php echo $pass; ?>" 
                  pattern="[a-z0-9]+"  title="Error! longitud de 8" required>
                </div>             
            </div>
          <input type="submit" class="btn btn-success" name="actualizacion" value="Actualizar" > 
          <button type="button" class="btn btn-danger" onclick="location.href='reg_personal.php'">Cancelar</button>
    </form>
</div>