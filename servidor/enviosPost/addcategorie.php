<?php
	include '../clases/classcontroler.php';
	$addcategorie = new newadd();
	if ($_POST) {
		$addcategorie->categoria = $_POST['categoria'];
		$addcategorie->parent = $_POST['parent']; 
		$addcategorie->addcategorie();
	}else{
		echo "<script language='JavaScript'> alert('Por favor ingresa una categoria'); window.location='../../cpanel/categorias.php';</script>";
	}
	
?>