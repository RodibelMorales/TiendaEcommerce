<?php
	include '../clases/classcontroler.php';
	$addproducto = new newadd();
	$ruta="../../cpanel/products/";
	opendir($ruta);
	$filedestino =$ruta.$_FILES['foto']['name'];
	$tallas1 =$_POST['size1']; $cantidad1 =$_POST['cantidad1'];
	$tallas2 =$_POST['size2']; $cantidad2 =$_POST['cantidad2'];
	$tallas3 =$_POST['size3']; $cantidad3 =$_POST['cantidad3'];
	$tallas4 =$_POST['size4']; $cantidad4 =$_POST['cantidad4'];
	$tallas5 =$_POST['size5']; $cantidad5 =$_POST['cantidad5'];

	if (file_exists($filedestino)) {
		echo "<script language='JavaScript'> alert('Oooops ya hay una imagen con este nombre'); window.location='../../cpanel/productos.php';</script>";
	}else{
		copy($_FILES['foto']['tmp_name'],$filedestino);
		$imgproducto= $_FILES['foto']['name'];
		if (isset($_POST)) {
			$addproducto->img_producto=$imgproducto;
			$addproducto->titulo=$_POST['nameproducto'];
			$addproducto->price=$_POST['price'];
			$addproducto->price_list=$_POST['price-promo'];
			$addproducto->brand_id=$_POST['brand'];
			$addproducto->categorias_id=$_POST['categoria'];
			$addproducto->subcategoria_id=$_POST['subcategoria'];
			$addproducto->descripcion=$_POST['descripcion'];
			$addproducto->destacado=$_POST['destacado'];
			$addproducto->tallas1 = $tallas1;
			$addproducto->tallas2 = $tallas2;
			$addproducto->tallas3 = $tallas3;
			$addproducto->tallas4 = $tallas4;
			$addproducto->tallas5 = $tallas5;
			$addproducto->cantidad1 = $cantidad1;
			$addproducto->cantidad2 = $cantidad2;
			$addproducto->cantidad3 = $cantidad3;
			$addproducto->cantidad4 = $cantidad4;
			$addproducto->cantidad5 = $cantidad5;
			$addproducto->addproducto();
		}else{
			echo "<script language='JavaScript'> alert('Oooops aún no agregas un producto'); window.location='../../cpanel/productos.php';</script>";
		}		
	}



?>