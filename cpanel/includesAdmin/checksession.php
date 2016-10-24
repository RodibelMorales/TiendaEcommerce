<?php 
session_start();
	if (!isset($_SESSION['nameuseryaxk'])) {
		include('../cpanel/includesAdmin/head.php');
		echo "  <div class='alert alert-danger' role='alert'>
				   <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
				   <span class='sr-only'>Error:</span>
				   Acceso Restringido <a href='../cpanel/index.php' class='btn btn-success'>Iniciar Sesion</a>
				</div>";
		exit();
	}else{
		
	}
?>