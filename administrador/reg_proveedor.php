<?php  
$iduser = 1;
if (isset($_GET['id'])) {
    $iduser = $_GET['id'];
}
include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>
		<div class="form-row">
			<div class="form-group col-md-12">
				<a href="form_reg_proveedor.php?id=<?php echo $iduser?>" class="btn btn-success">
					+ Nuevo Registro
				</a>			      
			</div>	
			
		<div>
		
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>		      
		      <th scope="col">NOMBRE PROVEEDOR</th>
		      <th scope="col">APELLIDO PROVEEDOR</th>
		      <th scope="col">DIRECCION</th>
			  <th scope="col">TELEFONO</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php 
				$query = "SELECT * FROM proveedor";
				$resultado_reg = mysqli_query($conex,$query);
				while ($row = mysqli_fetch_array($resultado_reg)) {
					?>
					<tr>			      
					<td> <?php echo $row['nom_proveedor'] ?> </td>
					<td> <?php echo $row['ap_proveedor'] ?> </td>
					<td> <?php echo $row['direc_proveedor'] ?> </td>
					<td> <?php echo $row['telefono'] ?> </td>
					</tr>
				<?php }	 ?>    
		  </tbody>
		</table>
<?php  require_once "vistas/parte_inf_sis.php" ?>