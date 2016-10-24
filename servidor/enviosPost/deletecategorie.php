<?php 
	include '../clases/classcontroler.php';
 	$Tipoaccion = new acciones;
 	if ($_REQUEST['idcategoria']) {
 		$Tipoaccion->id = $_REQUEST['idcategoria'];
 		$Tipoaccion->DeleteCategorie();
 	}else{
 		echo "<script language='JavaScript'> alert('No se pudo procesar la información intanta nuevamente'); window.location='../../cpanel/categorias.php';</script>";
 	}
?>