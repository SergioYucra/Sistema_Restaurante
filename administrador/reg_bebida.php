<?php  
$iduser = 1;
if (isset($_GET['id'])) {
    $iduser = $_GET['id'];
}
include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>
		<div class="form-row">
			<div class="form-group col-md-12">
				<a href="form_reg_bebida.php?id=<?php echo $iduser?>" class="btn btn-success">
					+ Nuevo Registro
				</a>		
				<a href="reg_bebida_hab.php" class="btn btn-danger">
					<i class="fa fa-database"></i> Habilitacion de Comida
				</a>	 	      
			</div>				
		<div>
		
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>		      
		      <th scope="col">NOMBRE BEBIDA</th>
		      <th scope="col">PRECIO</th>
		      <th scope="col">ESTADO</th>
			  <th scope="col">TIPO</th>
			  <th scope="col">IMAGEN</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php 
				$query = "SELECT * FROM bebida";
				$resultado_reg = mysqli_query($conex,$query);
				while ($row = mysqli_fetch_array($resultado_reg)) { 
					if ($row['id_status'] == "1") {										
												
					?>
					<tr>			      
					<td> <?php echo $row['nom_bebida'] ?> </td>
					<td> <?php echo $row['precio_bebida'] ?> </td>
					<td> <?php echo $row['estado'] ?> </td>
					<td> <?php echo $row['tipo_bebida'] ?> </td>
					<td> <img src="data:image/jpg;base64,<?php echo base64_encode($row['img_bebida']);?>" width="100px"></td>
					<img src="" width="">
					<td align="center">
						<a href="edit_img_bebi.php?id= <?php echo $row['id_bebida'] ?> " class="btn btn-secondary" title="Editar Imagen">
							<i class="fa fa-camera" aria-hidden="true"></i>
						</a>
						<a href="edit_bebi_admin.php?id= <?php echo $row['id_bebida'] ?> " class="btn btn-success" title="Editar Registro">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>						
						<a href="#" onclick="deshabilitarBeb(<?php echo $row['id_bebida'] ?>)" class="btn btn-warning" title="Deshabilitar Registro">
							<i class="fa fa-times" aria-hidden="true"></i>
						</a>						
					</td>
					</tr>
				<?php }}	 ?>    
		  </tbody>
		</table>
<?php  require_once "vistas/parte_inf_sis.php" ?>