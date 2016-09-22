<?php 
	include ('../servidor/clases/classcontroler.php');
	$brands = new showQuerys;	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Panel Administrador | Brands</title>
	<?php include('../cpanel/includesAdmin/head.php');?>
</head>
<body>
	<section class="container-fluid">
		<!--Include menu acciones admin-->
		<?php include('../cpanel/includesAdmin/navadmin.php');?>
		<section class="row">
			<div class="col-md-2 panelBorde">
				<?php include('../cpanel/includesAdmin/menuactions.php');?>
			</div>
			<div class="col-md-10">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<h3 class="titlebrand"><i class="fa fa-plus-circle faSpace" aria-hidden="true"></i>Agregar tipo de articulo</h3>
							<div class="formAddTipoArticulo">
								<form class="form-horizontal" action="../Servidor/enviosPost/nbrand.php" method="post">
								  <div class="form-group">
								    <label for="TipoProducto" class="col-sm-2 control-label"></label>
								    <div class="col-md-8">
								      <input type="text" class="form-control" id="tproduct" placeholder="Tipo de producto" required name="marca">
								      	<div class="btnBrand">
								    		<button type="submit" class="btn btn-success btnBrand btnBrandedit">
								    			<i class="fa fa-plus-circle faSpace" aria-hidden="true"></i>Agregar
								    		</button>
								    	</div>
								  </div>
								  </div>
								</form>
							</div>
						</div>
						<div class="col-md-6">
							<div class="tablaTipoProducto">
								<?php $brands->showMarcasProducto();?>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>
	<?php include('../cpanel/includesAdmin/jsfiles.php'); ?>
</body>
</html>