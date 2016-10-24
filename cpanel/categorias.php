<?php
    include('../cpanel/includesAdmin/checksession.php');
	include ('../servidor/clases/classcontroler.php');
	$brands = new showQuerys;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Panel Administrador | Categorias</title>
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
				<div class="col-xsm-12 col-sm-12 col-md-3">
					<div class="row">
						<div class="col-md-12">
							<form class="form-horizontal" action="../servidor/enviosPost/addcategorie.php" method="post">
							  <div class="form-group">
							    <label for="categoria" class="col-md-12 control-label alingcenter">Agregar Categoria</label>
							  </div>
							  <div class="form-group">
							    <div class="col-sm-12">
							    	<input type="hidden" name="parent" value="0">
							      	<input type="text" name="categoria" class="form-control" id="subcategoria" placeholder="Agrega una Categoria" required>
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="col-sm-12 ">
							      	<button type="submit" class="btn btn-success btnBrand btnBrandedit">
							      		<i class="fa fa-plus-square faSpace" aria-hidden="true"></i>Agregar
							      	</button>
							    </div>
							  </div>
							</form>							
						</div>
					</div>
				</div>
				<div class="col-xsm-12 col-sm-12 col-md-9">
					<div class="table-responsive">
						<table class="table table-hover alingcenter" id="cats">
						    <thead>
						      	<tr>
						        	<th class="alingcenter">Categoria</th>
						        	<th class="alingcenter">Sub-Categoria</th>
						        	<th class="alingcenter">Opciones</th>
						      	</tr>
						    </thead>
						    <tbody>
						    <?php $brands ->categoriasview(); ?>
						    </tbody>	
						</table>
					</div>

				</div>
			</div>
		</section>
	</section>
	<?php include('../cpanel/includesAdmin/jsfiles.php'); ?>
</body>
</html>