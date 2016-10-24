<?php 
session_start();
	if (!isset($_SESSION['nameuseryaxk'])) {
	}else{
		header("Location:admin.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenidos | Iniciar Sesión</title>
	<?php include('includesAdmin/head.php');?>
</head>
<body>
	<section class="container">
		<div class="bg-login">	
			<section class="row">
				<div class="middlelogin">
						<div class="form-group">
							<div class="col-md-12">
								<div class="img-logo-login">
									<img src="../img/logonegro.png" class="img-responsive">
								</div>
							</div>						
						</div>				
						<form action="../servidor/enviosPost/login-send.php" method="POST">
						  	<div class="form-group">
						    	<label class="sr-only" for="exampleInputAmount">Usuario</label>
						    	<div class="input-group">
						      		<div class="input-group-addon addoncustom"><i class="fa fa-user icologin" aria-hidden="true"></i></div>
						      		<input type="text" class="form-control" placeholder="Usuario" name="ykuser" required>
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="sr-only" for="exampleInputAmount">Password</label>
						    	<div class="input-group">
						      		<div class="input-group-addon addoncustom"><i class="fa fa-lock icologin" aria-hidden="true"></i></div>
						      		<input type="Password" class="form-control" placeholder="Password" name="ykpass" required>
						    	</div>
						  	</div>
						  	<div class="form-group">
						  		<button type="submit" class="btn btn-success form-control"><i class="fa fa-sign-in faSpace" aria-hidden="true"></i>Iniciar</button>
						  	</div>
						</form>
				</div>
			</section>
		</div>
	</section>
	<footer class="container">
		<div class="row">
			<div class="txtfooter">
				<i class='fa fa-copyright' aria-hidden='true'></i>Yaxkin Guayaberas
			</div>
		</div>
	</footer>
<?php include('../cpanel/includesAdmin/jsfiles.php'); ?>
</body>
</html>