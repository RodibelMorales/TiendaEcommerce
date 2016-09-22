<?php 
	include('../../servidor/clases/classcontroler.php');
	$updateCategoria = new acciones();
	if (isset($_POST)) {
		$updateCategoria->id = $_POST['idsubcategorie'];
		$updateCategoria->categoria = $_POST['renamesubcategoria'];
		$updateCategoria->updatesupcategoria();
	}
?>