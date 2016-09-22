<?php 
	include('../../servidor/clases/classcontroler.php');
 	$Tipoaccion = new acciones;
 	if ($_REQUEST['subcategoria']) {
 		$Tipoaccion->id = $_REQUEST['subcategoria'];
 		$Tipoaccion->deletesubcategoria();
 	}else{
 		echo "<script language='JavaScript'> alert('No se pudo procesar la información intanta nuevamente'); window.location='../../cpanel/categorias.php';</script>";
 	}
?>