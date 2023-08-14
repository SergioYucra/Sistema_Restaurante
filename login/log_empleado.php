<?php  require_once "vistas/part_superior.php" ?>
<?php 
	$alert= '';
	if (!empty($_POST)) {
		if (empty($_POST['usuario']) || empty($_POST['clave'])) 
		{//Pregunta si se lleno los campos
			?>
			  <script src="../js/script.js"></script>
				<script type="text/javascript">					
					document.addEventListener('DOMContentLoaded',errorllenado, false);
				</script>
			
			<?php
		}else{
			require_once "../conexion/conexiondb.php";
			$user = $_POST['usuario'];
			$pass = $_POST['clave'];
			$id = 0 ;
			$query = mysqli_query($conex,"SELECT * FROM personal WHERE usuario = '$user' AND password = '$pass' ");
			$result = mysqli_num_rows($query);
			if($result > 0)
			{//En caso de que esxita un registro de cdatos en la base de datos
				//sacar el id del usuario que esta entrando
				if(mysqli_num_rows($query)==1){
					$row = mysqli_fetch_array($query);
					$id = $row['id_personal'];
					$tipo = $row['id_cat_empleado'];
				    
				    switch ($tipo) {
					    case 1:
					    	$_SESSION['mensaje']=$id;
					        echo "<script>location.href='../administrador/admin.php'</script>";
					        break;
					    case 2:
					        echo "<script>location.href='../cajero/cajero.php'</script>";
					        break;
					    case 3:
					        echo "<script>location.href='../chef/reg_menu.php'</script>";
					        break;
					    case 4:
					        //echo "i es un pastel";
					        break;
					}
				    
				}
			}
			else{//Si no existen esos datos en la base de datos
				?>
				<script src="../js/script.js"></script>
				<script type="text/javascript">					
					document.addEventListener('DOMContentLoaded',cargarMsj, false);
				</script>
				<?php
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
<style type="text/css">
	#login{
		
		width: 40em;
	}
</style>
</head>
<body>
    <div style=" height: 70px;"></div>
    <!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="fa fa-user"></span></h2></span>
				<h2 class="company_title">Empleado</h2>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
                    <br>
					<h2 class="logintitulo">Iniciar Sesion</h2>
					<div class="row">
						<form class="form-grupo" action="" method="post">
							<div class="row">
								<input type="text" name="usuario" id="usuario" class="form_input" placeholder="Usuario">
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="clave" id="clave" class="form_input" placeholder="Contraseña">
							</div>
							<div style=" height: 10px;"></div>
							<div class="row">
								<button type="submit" value="Ingresar" class="btn1" name="register">Ingresar</button>
							</div>
						</form>
					</div>
					<div class="row">
						<p>¿Olvidaste tu contraseña? <a href="#">Contactar con el administrador</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php  require_once "vistas/part_inferior.php" ?>