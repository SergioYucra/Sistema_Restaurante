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
		      <th scope="col">NUMERO PEDIDO</th>
		      <th scope="col">FECHA</th>
		      <th scope="col">ESTADO</th>
		      <th scope="col">ID_SOLICITANTE</th>
              <th scope="col">ID_MESA</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php 
				$query = "SELECT * FROM pedido";
				$resultado_reg = mysqli_query($conex,$query);
				while ($row = mysqli_fetch_array($resultado_reg)) { ?>
					<tr>			      
					<td> <?php echo $row['id_pedido'] ?> </td>
					<td> <?php echo $row['fecha'] ?> </td>
					<td> <?php echo $row['estado'] ?> </td>
					<td> <?php echo $row['id_cliente'] ?> </td>
					<td> <?php echo $row['id_mesa'] ?> </td>
					<td align="center">
						<a href="ver_registro_pedido.php?id= <?php echo $row['id_pedido'] ?> " class="btn btn-info" title="Ver Registro">
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<a href="#?id= <?php echo $row['id_pedido'] ?> " class="btn btn-success" title="Estado">
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