<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php"; 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<div class="form-row">			
		<div>
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>		      
		      <th scope="col">NUMERO PEDIDO</th>		      
		      <th scope="col">NOMBRE_COMIDA</th>
              <th scope="col">CATEGORIA</th>
              <th scope="col">CANTIDAD</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php 
				$query = "SELECT * FROM pedido_comida WHERE id_pedido = $id" ;                      
				$resultado_reg = mysqli_query($conex,$query);    
                //$row = mysqli_fetch_array($resultado_reg);
                //$id_com = $row['id_comida'];
                       
				while ($row = mysqli_fetch_array($resultado_reg)) { ?>
					<tr>			      
					<td> <?php echo $row['id_pedido'] ?> </td>

					<td> <?php  $x = $row['id_comida'];
                                $consul = "SELECT * FROM comida WHERE id_comida = $x" ; 
                                $res_comida = mysqli_query($conex,$consul); 
                                $rew =mysqli_fetch_array($res_comida);  
                                echo $rew['nom_comida'];
                    ?>  </td>
                    <td> <?php switch ($rew['id_cat_comida']) {
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

					<td> <?php echo $row['cantidad'] ?> </td>
					<td align="center">
						<a href="reg_pedido.php?id= <?php echo $row['id_pedido'] ?> " class="btn btn-info" title="Atras">
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
					</td>
					</tr>
				<?php } ?>    
		  </tbody>
		</table>
	 </div>
</div>

<?php  require_once "vistas/parte_inf_sis.php" ?>