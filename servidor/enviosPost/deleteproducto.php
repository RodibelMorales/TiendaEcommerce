<?php 
	include('../../servidor/clases/classcontroler.php');
 	$Tipoaccion = new acciones;
 	if ($_REQUEST['productodelete']) {
 		$Tipoaccion->id = $_REQUEST['productodelete'];
 		$Tipoaccion->deleteproducto();
 	}else{
 		echo "<script language='JavaScript'> alert('No se pudo procesar la información intanta nuevamente'); window.location='../../cpanel/categorias.php';</script>";
 	}
?>