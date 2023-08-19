<?php
$iduser = 1;
if (isset($_GET['id'])) {
    $iduser = $_GET['id'];
}
  require_once "vistas/parte_sup_sis.php" ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="card">
                <a class="img-card" href="#">
                    <img src="../img/men1.jpg" />
                </a>
                <div class="card-content">
                    <h4 class="card-title" align="center">
                        <a href="#">Comida</a>
                    </h4>
                    <p class=""> </p>
                </div>
                <div class="card-read-more">
                    <a href="reg_comida.php?id=<?php echo $iduser ?>" class="btn btn-link btn-block">
                        Ingresar
                    </a>
                </div>
            </div>
        </div>
		<div class="col-xs-12 col-sm-6">
            <div class="card">
                <a class="img-card" href="#">
                    <img src="../img/men3.jpg" />
                </a>
                <div class="card-content">
                    <h4 class="card-title" align="center">
                        <a href="reg_bebida.php?id=<?php echo $iduser ?>">Bebidas</a>
                    </h4>
                    <p class=""> </p>
                </div>
                <div class="card-read-more">
                    <a href="reg_bebida.php?id=<?php echo $iduser ?>" class="btn btn-link btn-block">
                        Ingresar
                    </a>
                </div>
            </div>
        </div> 		                  
    </div>
</div>

<?php  require_once "vistas/parte_inf_sis.php" ?>