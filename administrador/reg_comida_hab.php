<?php  
$iduser = 1;
if (isset($_GET['id'])) {
    $iduser = $_GET['id'];
}
include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>
		<div class="form-row">
			<div class="form-group col-md-8">
				<a href="reg_comida.php" class="btn btn-danger">
					<i class="fa fa-times"></i> Finalizar
				</a>	      
			</div>
		<div>
		
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>		      
		      <th scope="col">NOMBRE COMIDA</th>
		      <th scope="col">PRECIO</th>
		      <th scope="col">ESTADO</th>
			  <th scope="col">DETALLE</th>
		      <th scope="col">CATEGORIA</th>
			  <th scope="col">IMAGEN</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php 
				$query = "SELECT * FROM comida";
				$resultado_reg = mysqli_query($conex,$query);
				while ($row = mysqli_fetch_array($resultado_reg)) { 
					if ($row['id_status'] == "2") {										
												
					?>
					<tr>			      
					<td> <?php echo $row['nom_comida'] ?> </td>
					<td> <?php echo $row['precio'] ?> </td>
					<td> <?php echo $row['estado'] ?> </td>
					<td> <?php echo $row['detalle'] ?> </td>
					<td> <?php switch ($row['id_cat_comida']) {
							    case 1:
							        echo "PLATILLO";
							        break;
							    case 2:
							        echo "POSTRE";
							        break;
							    case 3:
							        echo "ESPECIAL";
							        break;
							} ?> </td>
					<td> <img src="data:image/jpg;base64,<?php echo base64_encode($row['img_comida']);?>" width="100px"></td>
					<img src="" width="">
					<td align="center">						
						<a href="#" onclick="habilitar(<?php echo $row['id_comida'] ?>)" class="btn btn-success" title="Habilitar Registro">
							<i class="fa fa-check" aria-hidden="true"></i>
						</a>						
					</td>
					</tr>
				<?php }}	 ?>    
		  </tbody>
		</table>
<?php  require_once "vistas/parte_inf_sis.php" ?>