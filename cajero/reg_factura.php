<?php include("../conexion/conexiondb.php");   
require_once "vistas/parte_sup_sis.php"; 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sum=0;
?>
<h1 align="center">SISTEMA FACTURACION</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            background-color: #e3ecef;
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
        #div_registro_cliente, #add_product_venta{
            display: none;
        }
        .displayN{
            display: none;
        }
        .tbl_venta{
            max-width: 900px;
            margin: auto;
        }
        .tbl_venta tfoot td{
            font-weight: bold;
        }
        .textright{
            text-align: right;
        }
        .textcenter{
            text-align: center;
        }
        .textleft{
            text-align: left;
        }
        .btn_anular{
            background-color: #f36a6a;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px;
            margin: 0 3px;
            color: #FFF;
        }
    </style>
</head>
<body>
    <section class="container">
    <div class="datos_clientes">
            <div class="action_cliente">
                <h4>Datos de la factura del Cliente</h4> <br />
                <br />
            </div>
            <form method="POST" action="guardar_datos_factura.php?id=<?php echo $id?>" class="datos">
                <div class="form-row">
                <div class="form-group col-md-4">
                <label for="inputRsocial">Razon Social</label>
                <input type="text"  class="form-control" id="inputRsocial" name="rsocial" 
                onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                 pattern="[a-zA-Z\s]+" title="Error! Ejemplo: YUCRA" required >
                </div>
                <div class="form-group col-md-4">
                <label for="inputNit">NIT/CI</label>
                <input type="number" class="form-control" id="inputNit" name="nit" 
                onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                pattern="[0-9]+"  title="Error! Ejemplo: 8412451" required>
                </div>
                <div class="form-group col-md-4">
			    	<label for="inputMetodo">Metodo de Pago</label>
	 				<select class="form-control " id="inputMetodo" name="metodo" required>				       
					   <option type="text" value="EFECTIVO" >EFECTIVO</option>
					   <option type="text" value="TARJETA" >TARJETA</option>
					</select>
 				</div>	
            </div>
            <input type="submit" class="btn btn-success" name="ingresa" value="Facturar"> 
            </form>
        </div>
        <div class="datos">
            <h4>Datos de Venta</h4>
            <table class="table table-striped">
            <thead>
                <tr>
                    <th width="100px">Codigo</th>
                    <th width="100px">Descripcion</th>
                    <th width="100px">Cantidad</th>
                    <th class="100px">Precio</th>
                    <th class="100px">Precio Total</th>
                </tr>
            </thead>    

        <tbody>

			<?php 
                
                    $query = "SELECT * FROM pedido_comida WHERE id_pedido = $id" ;                      
				    $resultado_reg = mysqli_query($conex,$query); 
                    while ($row = mysqli_fetch_array($resultado_reg)) { ?>
					<tr>			      
                        <td> <?php echo $row['id_comida'] ?> </td>

                        <td> <?php  $x = $row['id_comida'];
                                    $consul = "SELECT * FROM comida WHERE id_comida = $x" ; 
                                    $res_comida = mysqli_query($conex,$consul); 
                                    $rew =mysqli_fetch_array($res_comida);  
                                    echo $rew['nom_comida'];
                        ?>  </td>

                        <td> <?php echo $row['cantidad'] ?> </td>

                        <td> <?php  $x = $row['id_comida'];
                                    $consul = "SELECT * FROM comida WHERE id_comida = $x" ; 
                                    $res_comida = mysqli_query($conex,$consul); 
                                    $rew =mysqli_fetch_array($res_comida);  
                                    echo $rew['precio'];
                        ?>  </td>

                        <td> <?php  $x = $row['id_comida'];
                                    $consul = "SELECT * FROM comida WHERE id_comida = $x" ; 
                                    $res_comida = mysqli_query($conex,$consul); 
                                    $rew =mysqli_fetch_array($res_comida);
                                    $precio = $rew['precio'];
                                    $sub = (int) $precio;
                                    $cantidad = $row['cantidad'];
                                    $can = (int)$cantidad;
                                    $total_plato = $sub*$cantidad;
                                    $sum=$sum+$total_plato;
                                    echo $total_plato;
                        ?>  </td>
			
					</tr>
				<?php }
				 ?>    
		</tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="textright">TOTAL Bs.</td>
                    <td class="textright"><?php echo $sum ?></td>
                </tr>
            </tfoot>
        </table>
        
    </div>
</body>
</html>
<?php  require_once "vistas/parte_inf_sis.php" ?>




