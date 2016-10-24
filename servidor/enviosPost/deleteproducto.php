<?php 
	include '../clases/classcontroler.php';
 	$Tipoaccion = new acciones;
 	if ($_REQUEST['productodelete']) {
 		$Tipoaccion->id = $_REQUEST['productodelete'];
 		$Tipoaccion->imgdelete = $_REQUEST['imgdelete'];
 		$Tipoaccion->deleteproducto();
 	}else{
 		echo "<script language='JavaScript'> alert('No se pudo procesar la información intanta nuevamente'); window.location='../../cpanel/categorias.php';</script>";
 	}
?>