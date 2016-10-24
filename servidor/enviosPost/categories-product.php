<?php 
	include '../clases/classcontroler.php';
	$categoria = new showQuerys;
 	if ($_REQUEST['categorie']) {
 	 	$categoria->id = $_REQUEST['categorie'];
 	 	$categoria->productsbycategorie();
 	 } 
?>