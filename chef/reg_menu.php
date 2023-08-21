<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>
<?php if (isset($_SESSION['mensaje'])) {
		$iduser=$_SESSION['mensaje'];		
		}
		else{
			$iduser = 1;
		} 
?>
<div class="form-row">			
		<div>
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>		      
		      <th scope="col">NOMBRE COMIDA</th>
		      <th scope="col">PRECIO</th>
		      <th scope="col">ESTADO</th>
			  <th scope="col">DETALLE</th>
		      <th scope="col">IMAGEN</th>
              <th scope="col">CATEGORIA</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php 
				$query = "SELECT * FROM comida";
				$resultado_reg = mysqli_query($conex,$query);
				while ($row = mysqli_fetch_array($resultado_reg)) { ?>
					<tr>			      
					<td> <?php echo $row['nom_comida'] ?> </td>
					<td> <?php echo $row['precio'] ?> </td>
					<td> <?php echo $row['estado'] ?> </td>
					<td> <?php echo $row['detalle'] ?> </td>
					<td> <img src="data:image/jpg;base64,<?php echo base64_encode($row['img_comida']);?>" width="100px"> </td>
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
							} ?>  </td>
					<td align="center">
						<a href="cambio_estado.php?id=<?php echo $row['id_comida'] ?> " class="btn btn-success" title="Estado">
							<i class="fa fa-toggle-on" aria-hidden="true"></i>
						</a>
					</td>
					</tr>
				<?php } ?>    
		  </tbody>
		</table>
	 </div>
</div>
<?php  require_once "vistas/parte_inf_sis.php" ?>