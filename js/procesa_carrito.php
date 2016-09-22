<?php 
session_start();
	include 'clases/classcontroler.php';
	$carrito = new carritocompras();

	if (isset($_POST['idproducto'])) {
		$carrito->id= $_POST['idproducto'];
		$
	}

?>