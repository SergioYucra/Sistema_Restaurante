<?php  
$iduser = 1;
if (isset($_GET['id'])) {
    $iduser = $_GET['id'];
}
include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>
		<div class="form-row">
			<div class="form-group col-md-8">
				<a href="reg_bebida.php" class="btn btn-danger">
					<i class="fa fa-times"></i> Finalizar
				</a>	      
			</div>
		<div>
		<?php if(isset($_SESSION['message'])){ ?> 
			<div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
				<?= $_SESSION['message']?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
		<?php session_unset(); }//vaciar datos ?>
	 	
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
					if ($row['id_status'] == "2") {										
												
					?>
					<tr>			      
					<td> <?php echo $row['nom_bebida'] ?> </td>
					<td> <?php echo $row['precio_bebida'] ?> </td>
					<td> <?php echo $row['estado'] ?> </td>
					<td> <?php echo $row['tipo_bebida'] ?> </td>
					<td> <img src="data:image/jpg;base64,<?php echo base64_encode($row['img_bebida']);?>" width="100px"></td>
					<img src="" width="">
					<td align="center">
						<a href="#" onclick="habilitarBeb(<?php echo $row['id_bebida'] ?>)" class="btn btn-success" title="Habilitar Registro">
							<i class="fa fa-check" aria-hidden="true"></i>
						</a>	
					</td>
					</tr>
				<?php }}	 ?>    
		  </tbody>
		</table>
<?php  require_once "vistas/parte_inf_sis.php" ?>