<!doctype html>
<html lang="en">
  <head>
  	<title>Sistema Restaurante</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/estilos.css?92">

    <!--DataTable basico-->
    <link rel="stylesheet" type="text/css" href="https:////cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <!--Alertify-->
    <link rel="stylesheet" type="text/css" href="../css/alertify.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="index.html" class="logo"><img src="../img/logo.png" alt="" width="80%"></a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="admin.php"><span class="fa fa-home"></span> Inicio</a>
          </li>
          <li>
              <a href="reg_personal.php"><span class="fa fa-users"></span>Personal</a>
          </li>
          <li>
            <a href="admin_menu.php?id=<?php echo $iduser?>"><span class="fa fa-coffee"></span>Menu</a>
          </li>
          <li>
            <a href="reg_proveedor.php"><span class="fa fa-truck"></span>Proveedor</a>
          </li>
          <li>
            <a href="reg_ingreso.php"><span class="fa fa-line-chart"></span>Ingreso</a>
          </li>
          <li>
            <a href="reg_egreso.php"><span class="fa fa-area-chart"></span>Egreso</a>
          </li>
        </ul>

        <div class="footer">
        	<p>
					  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Grupo 20 <i class="icon-heart" aria-hidden="true"></i> Por:
             <a href="#" target="_blank">Sergio Yucra</a>
					</p>
        </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio</a>
                </li>     
                <li class="nav-item active">
                    <a class="nav-link" href="#">Contactos</a>
                </li>               
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                  aria-haspopup="true" aria-expanded="false">
                  <span class="fa fa-user-circle-o"></span> Administrador
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../inicio.php">Cerrar Sesion</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>