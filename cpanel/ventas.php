<?php
	include('../cpanel/includesAdmin/checksession.php');
	include ('../servidor/clases/classcontroler.php');
	$infoventas = new showQuerys;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Panel Administrador | Productos</title>
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
				<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-hover">
								    <thead>
								      <tr>
								        <th>#Compra</th>
								        <th>Producto</th>
								        <th>Tipo</th>
								        <th>Status</th>
								        <th>Talla</th>
								        <th>Cantidad</th>
								        <th>Fecha_compra</th>
								        <th>Color</th>
								        <th>Tipo Cuello</th>
								        <th>Tipo Manga</th>
								        <th>Tipo Puño</th>
								        <th>Bordado</th>
								        <th>Altura</th>
								        <th>Peso</th>
								        <th>Complexión</th>
								        <th>Torax</th>
								        <th>Cadera</th>
								        <th>Mangas</th>
								        <th>Hombros</th>
								        <th>Longitud</th>
								        <th>Puños</th>
								        <th>Biceps</th>
								        <th>Precio</th>
								        <th>Correo Comprador</th>
								        <th>Nombre Dirección</th>
								        <th>Pais</th>
								        <th>Código del Pais</th>
								        <th>Estado</th>
								        <th>Cuidad</th>
								        <th>Calle</th>
								        <th>#Transacción</th>
								      </tr>
								    </thead>
								    <tbody>
									    <?php $listarventas = $infoventas->ventasList(); ?>
								    </tbody>
								</table>
							</div>
						</div>
				</div>
			</div>
		</section>
	</section>
	<?php include('../cpanel/includesAdmin/jsfiles.php'); ?>
</body>
</html>