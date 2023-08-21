<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php" ?>
<?php if (isset($_SESSION['mensaje'])) {
		$iduser=$_SESSION['mensaje'];		
		}
		else{
			$iduser = 1;
		} 
?>
		<div class="container mt-5">
            <div class="row"> 
                <div class="col-md-3">
                    <h1>Ingrese ingrediente</h1>
                        <form method="POST" action="guardar_ingrediente.php" >
                            <input type="text" class="form-control mb-3" name="nom_ingrediente" placeholder="nombre ingrediente">
                            
                            <select class="form-control " id="inputGenero" name="tipo_ingrediente" required>       
							   <option type="text" value="TUBERCULO" >TUBERCULO</option>
							   <option type="text" value="VERDURA" >VERDURA</option>
							   <option type="text" value="CEREAL" >CEREAL </option>
							   <option type="text" value="CARNE" >CARNE</option>
							</select>
							<br>
                            <input type="text" class="form-control mb-3" name="precio" placeholder="cantidad">
                            <input type="submit" class="btn btn-primary" name="entrale" >
                        </form>
                </div>
<div class="form-row">			
		<div>
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>		      
		      <th scope="col">NRO. INGREDIENTE</th>
		      <th scope="col">NOMBRE</th>
		      <th scope="col">TIPO INGREDIENTE</th>
			  <th scope="col">CANTIDAD</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php 
				$query = "SELECT * FROM ingrediente";
				$resultado_reg = mysqli_query($conex,$query);
				while ($row = mysqli_fetch_array($resultado_reg)) { ?>
					<tr>		
					<td> <?php echo $row['id_ingrediente'] ?> </td>	      
					<td> <?php echo $row['nom_ingrediente'] ?> </td>
					<td> <?php echo $row['tipo_ingrediente'] ?> </td>
					<td> <?php echo $row['precio_ingrediente'] ?> </td>
					<td align="center">
						<a href="ver_registro_pedido.php?id= <?php echo $row['id_ingrediente'] ?> " class="btn btn-info" title="Ver Registro">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</td>
					</tr>
				<?php } ?>    
		  </tbody>
		</table>
	 </div>
</div>
<?php  require_once "vistas/parte_inf_sis.php" ?>