<?php 
 include('../../servidor/clases/classcontroler.php');
 	$Tipoaccion = new acciones;

 	if (isset($_REQUEST['elimina'])) {
 		 	$Tipoaccion->id= $_REQUEST['elimina'];
 			$Tipoaccion->DeleteBrand();
 	}
 	elseif (isset($_POST)) {
  			$Tipoaccion->id= $_POST['id'];
 			$Tipoaccion->marca= $_POST['marca'];
 			$Tipoaccion->EditBrand();		
 	}elseif (!isset($_REQUEST['elimina'])) {
 		echo "error request";
 	}elseif (!isset($_POST)) {
 		echo "error pOST";
 	}
?>