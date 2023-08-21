<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>
<?php if (isset($_SESSION['mensaje'])) {
		$iduser=$_SESSION['mensaje'];		
		}
		else{
			$iduser = 1;
		} 
?>
		<style>
			.datos_cliente, .datos_venta, .title_page{
				width: 100%;
				max-width: 900px;
				margin: auto;
				margin-bottom: 20px;
			}
			#detalle_venta tr{
				background-color: #FFF !important;
			}
			#detalle_venta td{
				border-bottom: 1px solid #CCC;
			}
			.datos{
				background-color: #CCD1D1;
				display: -webkit-flex;
				display: -moz-flex;
				display: -ms-flex;
				display: -o-flex;
				display: flex;
				display: flex;
				justify-content: space-between;
				flex-wrap: wrap;
				border: 2px solid #78909C;
				padding: 10px;
				border-radius: 10px;
				margin-top: 10px;
			}
			.action_cliente{
				display: -webkit-flex;
				display: -moz-flex;
				display: -ms-flex;
				display: -o-flex;
				display: flex;
				align-items: center;
			}

			.datos label{
				margin: 5px auto;
			}
			.wd20{
				width: 20%;
			}
			.wd25{
				width: 25%;
			}
			.wd30{
				width: 30%;
			}
			.wd40{
				width: 40%;
			}
			.wd60{
				width: 60%;
			}
			.wd100{
				width: 100%;
			}


		</style>
		
<div class="form-row">		
	
<div class="datos_clientes">
            <div class="action_cliente">
                <h4>Datos del Nuevo Cliente</h4> <br />
                <h4></h4> <br />
            </div>
            <form method="POST" action="guardar_cliente.php" class="datos">
                <input type="hidden" id="idCliente" name="idCliente" value="" required>
                <div class="wd25">
					<input type="text" class="form-control mb-3" name="ci" placeholder="ci" required>
                </div>
                <div class="wd25">
					<input type="text" class="form-control mb-3" name="razon_social_cliente" placeholder="Razon Social">
                </div>
                <div class="wd25">
					<input type="text" class="form-control mb-3" name="nom_cliente" placeholder="Nombres">
                </div>
				<div class="wd25">
					<input type="text" class="form-control mb-3" name="ap_cliente" placeholder="Apellidos">
                </div>
				<div class="wd25">
					<input type="text" class="form-control mb-3" name="telefono_cliente" placeholder="Telefono Ref.">
                </div>				
				<div class="wd25">
					<input type="text" class="form-control mb-3" name="correo_cliente" placeholder="Correo elec.">
                </div>
				<div class="wd25">
					<input type="text" class="form-control mb-3" name="usuario" placeholder="Usuario">
                </div>
				<div class="wd25">
					<input type="text" class="form-control mb-3" name="password" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary" name="ingresa">
            </form>
        </div>

		<div>
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>	
              <th scope="col">ID CLIENTE</th>  	      
		      <th scope="col">CI CLIENTE</th>
		      <th scope="col">RAZON SOCIAL</th>
		      <th scope="col">NOMBRES</th>
			  <th scope="col">APELLIDOS</th>
              <th scope="col">TELEFONO</th>
              <th scope="col">E-MAIL</th>
			  <th scope="col">USUARIO</th>
			  <th scope="col">PASSWORD_DEFAULT</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php 
				$query = "SELECT * FROM cliente";
				$resultado_reg = mysqli_query($conex,$query);
				while ($row = mysqli_fetch_array($resultado_reg)) { ?>
					<tr>		
					<td> <?php echo $row['id_cliente'] ?> </td>	      
					<td> <?php echo $row['ci'] ?> </td>
					<td> <?php echo $row['razon_social_cliente'] ?> </td>
					<td> <?php echo $row['nom_cliente'] ?> </td>
                    <td> <?php echo $row['ap_cliente'] ?> </td>
                    <td> <?php echo $row['telefono_cliente'] ?> </td>
                    <td> <?php echo $row['correo_cliente'] ?> </td>
					<td> <?php echo $row['usuario'] ?> </td>
					<td> <?php echo $row['password'] ?> </td>
					<td align="center">
						<a href="editar_cliente.php?id= <?php echo $row['id_cliente'] ?> " class="btn btn-success" title="actualizacion">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<a href="eliminar_cliente.php?id= <?php echo $row['id_cliente'] ?> " class="btn btn-danger" title="Eliminar cliente">
							<i class="fa fa-user-times" aria-hidden="true"></i>
						</a>											
					</td>
					</tr>
				<?php } ?>    
		  </tbody>
		</table>
	 </div>
</div>
<?php  require_once "vistas/parte_inf_sis.php" ?>