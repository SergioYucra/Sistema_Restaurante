<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>
<h1 align="center">EGRESOS</h1>
<?php if (isset($_SESSION['mensaje'])) {
		$iduser=$_SESSION['mensaje'];		
		}
		else{
			$iduser = 1;
		} 
?>

		<div class="form-row">
			<div class="form-group col-md-12">
				<a href="pdf_egreso.php?id=<?php echo $iduser?>" class="btn btn-info">
					REPORTE GENERAL
				</a>			      		      
			</div>		
		<div>
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>		      
		      <th scope="col">NRO FACTURA</th>
		      <th scope="col">FECHA CREACION</th>
		      <th scope="col">CLIENTE</th>
			  <th scope="col">FACTURA TOTAL</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
          <?php 
				$query = "SELECT * FROM factura_compra";
				$resultado_reg = mysqli_query($conex,$query);
				while ($row = mysqli_fetch_array($resultado_reg)) { ?>	  		
					<tr>			      
                        <td> <?php echo $row['id_factura_compra'] ?> </td>
                        <td> <?php echo $row['fecha_factura_compra'] ?> </td>
                        <td> <?php echo $row['razon_social_cliente'] ?> </td>
                        <td> <?php echo $row['total_pago'] ?> </td>
					
                        <td align="center">
                            <a href="pdf_factura_ingreso.php?id= <?php echo $row['id_factura_compra'] ?> " class="btn btn-success" title="generar">
                                <i class="fa fa-print" aria-hidden="true"></i>
                            </a>
                            <a href="eliminar_factura.php?id= <?php echo $row['id_factura_compra'] ?> " class="btn btn-danger" title="Eliminar">
                                <i class="fa fa-window-close" aria-hidden="true"></i>
                            </a>
                            
                        </td>
                    </tr>
                <?php } ?>   
		  </tbody>
		</table>
</div>
<?php  require_once "vistas/parte_inf_sis.php" ?>