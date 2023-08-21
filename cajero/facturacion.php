<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>
<h1 align="center">SISTEMA FACTURACION</h1>
<?php if (isset($_SESSION['mensaje'])) {
		$iduser=$_SESSION['mensaje'];		
		}
		else{
			$iduser = 1;
		} 
?>

	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>		      
		      <th scope="col">NRO PEDIDO</th>
		      <th scope="col">ESTADO</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
          <?php 
				$query = "SELECT * FROM pedido";
				$resultado_reg = mysqli_query($conex,$query);
				while ($row = mysqli_fetch_array($resultado_reg)) { 
					$iden=$row['id_pedido']; 
					$cosulta=mysqli_query($conex,"SELECT * FROM factura_venta WHERE id_pedido = '$iden'");
					if (mysqli_num_rows($cosulta)==0 && $row['estado'] == "ENTREGADO") {						
					?>	  		
					<tr>			      
                        <td> <?php echo $row['id_pedido'] ?> </td>						
                        <td> <?php echo $row['estado'] ?> </td>
                        <td align="center">
                            <a href="reg_factura.php?id= <?php echo $row['id_pedido'] ?> " class="btn btn-success" title="Facturar">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                            </a>

                        </td>
                    </tr>
                <?php }} ?>   
		  </tbody>
		</table>
</div>
<?php  require_once "vistas/parte_inf_sis.php" ?>