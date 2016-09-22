<?php 
	include('../../servidor/clases/classcontroler.php');
	$updateCategoria = new acciones();
	if (isset($_POST)) {
		$updateCategoria->id = $_POST['idcategoria'];
		$updateCategoria->categoria = $_POST['renamecategoria'];
		$updateCategoria->UpdateCategoria();
	}
?>