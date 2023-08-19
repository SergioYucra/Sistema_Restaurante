<?php
$iduser = 1;
include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>
		
		<div class="form-row">
			<div class="form-group col-md-12">
				<a href="form_reg_pers.php" class="btn btn-success">
					+ Nuevo Registro
				</a>
				<a href="reg_personal_hab.php" class="btn btn-danger">
					<i class="fa fa-database"></i> Habilitacion de Comida
				</a>			      
			</div>	
			
		<div>
	
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>		      
		      <th scope="col">NOMBRE</th>
		      <th scope="col">APELLIDO</th>
		      <th scope="col">CI</th>
			  <th scope="col">GENERO</th>
		      <th scope="col">TELEFONO</th>
			  <th scope="col">TIPO PERSONAL</th>
		      <th scope="col">USUARIO</th>
		      <th scope="col">CONTRASEÑA</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php 
				$query = "SELECT * FROM personal";
				$resultado_reg = mysqli_query($conex,$query);
				while ($row = mysqli_fetch_array($resultado_reg)) { 
					if ($row['id_status'] == "1") {	
						?>
					<tr>			      
					<td> <?php echo $row['nombre'] ?> </td>
					<td> <?php echo $row['apellido'] ?> </td>
					<td> <?php echo $row['ci'] ?> </td>
					<td> <?php echo $row['genero'] ?> </td>
					<td> <?php echo $row['telefono'] ?> </td>
					<td> <?php switch ($row['id_cat_empleado']) {
								case 1:
									echo "ADMINISTRADOR";
									break;
								case 2:
									echo "CAJERO";
									break;
								case 3:
									echo "CHEF";
									break;
								case 4:
									echo "CAMARERO";
									break;
							}  
					
					?> </td>
					<td> <?php echo $row['usuario'] ?> </td>
					<td> <?php echo $row['password'] ?> </td>
					<td align="center">
						<a href="edit_personal.php?id= <?php echo $row['id_personal'] ?> " class="btn btn-success" title="Editar Registro">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<a href="#" onclick="deshabilitarPer(<?php echo $row['id_personal'] ?>)" class="btn btn-warning" title="Deshabilitar Registro">
							<i class="fa fa-times" aria-hidden="true"></i>
						</a>							
					</td>
					</tr>
				<?php }} ?>    
		  </tbody>
		</table>
<?php  require_once "vistas/parte_inf_sis.php" ?>