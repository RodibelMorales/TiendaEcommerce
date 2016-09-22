<?php 
	include '../clases/classcontroler.php';
	$addbrand = new newadd();
	if ($_POST) {
		$addbrand->marca = $_POST['marca'];
		$addbrand->addbrand();
	}else{
		echo "<script language='JavaScript'> alert('Por favor agrega un tipo de articulo'); window.location='../../cpanel/brands.php';</script>";
	}
	

?>