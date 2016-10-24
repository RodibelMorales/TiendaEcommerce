<?php
	session_start();
	include ('servidor/clases/classcontroler.php');
	$categoria = new showQuerys;
	if ($_REQUEST['categorie']) {
 		$categoria->idcategorie = $_REQUEST['categorie'];	
?>
	<!DOCTYPE html>
	<html>
	<head>
		<?php include('includesFrontEnd/head.php') ?>
	</head>
	<body>
		<section class="container-fluid">
			<header class="navbar-fixed-top">
				<?php include('includesFrontEnd/nav.php') ?>		
			</header>
				<div class="containercart1">
					<p class="cartHeader" data-toggle="modal"  data-target="#carritodetails">
						<?php 
						if(isset($_SESSION["products"])){
						    echo "<i class='fa fa-shopping-cart' aria-hidden='true'></i>Mi Carrito (".count($_SESSION["products"]).")";
 							echo '					</p>
						<div class="shopping-cart-box modal fade" id="carritodetails" role="dialog">
						    <div class="modal-dialog">
						      	<div class="modal-content ">
						      		<form name="formpays" class="formpays">
							            <div class="modal-header modalheadercustom">
							          		<button type="button" class="close closecustom" data-dismiss="modal">&times;</button>
							          		<h3><i class="fa fa-credit-card-alt faSpace" aria-hidden="true"></i> Mi Compras</h3>
							        	</div>
								        <div class="modal-body">		
								    		<div id="shopping-cart-results"></div>
								        </div>
								        <div class="modal-footer modal-footercustom">
								          <button type="submit" class="btn btn-success " type="submit"><i class="fa fa-money faSpace" aria-hidden="true"></i>Pagar ahora</button>
								        </div>
						      		</form>
						      	</div>
						    </div>
						</div>';
 						} else{
						    echo "<i class='fa fa-shopping-cart' aria-hidden='true'></i>Mi Carrito (0)";
						     							echo '					</p>
						<div class="shopping-cart-box modal fade" id="carritodetails" role="dialog">
						    <div class="modal-dialog">
						      	<div class="modal-content ">
						      		<form name="formpays" class="formpays">
							            <div class="modal-header modalheadercustom">
							          		<button type="button" class="close closecustom" data-dismiss="modal">&times;</button>
							          		<h3><i class="fa fa-credit-card-alt faSpace" aria-hidden="true"></i> Mi Compras</h3>
							        	</div>
								        <div class="modal-body">		
								    		<div id="shopping-cart-results"></div>
								        </div>
								        <div class="modal-footer modal-footercustom">
								          <button type="submit" class="btn btn-success disabled" type="submit"><i class="fa fa-money faSpace" aria-hidden="true"></i>Pagar ahora</button>
								        </div>
						      		</form>
						      	</div>
						    </div>
						</div>';
						}
						?>


				</div>


			<section class="row marginafterfixed">
				<!-------------------------------------------->
				<div class="col-md-12">
					<div class="row">
						<?php $categoria->productsbycategorie(); ?>
					</div>
				</div>
			</section>
			
		</section>
		<?php include('includesFrontEnd/footer.php') ?>
		<?php include('includesFrontEnd/jsfiles.php') ?>
	</body>
	</html>
<?php
 	 } 
?>