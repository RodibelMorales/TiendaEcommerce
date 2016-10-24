<?php
	include '../clases/classcontroler.php';
	$addproducto = new acciones();
	$ruta="../../cpanel/products/";
	opendir($ruta);
	$filedestino =$ruta.$_FILES['foto']['name'];
	$idtc1 =$_POST['idtc1']; $cantidad1 =$_POST['cantidad1'];
	$idtc2 =$_POST['idtc2']; $cantidad2 =$_POST['cantidad2'];
	$idtc3 =$_POST['idtc3']; $cantidad3 =$_POST['cantidad3'];
	$idtc4 =$_POST['idtc4']; $cantidad4 =$_POST['cantidad4'];
	$idtc5 =$_POST['idtc5']; $cantidad5 =$_POST['cantidad5'];
	
	if (!empty($_FILES['foto']['name'])) {
		if (file_exists($filedestino)) {
			echo "<script language='JavaScript'> alert('Oooops ya hay una imagen con este nombre'); window.location='../../cpanel/productos.php';</script>";
		}else{
			copy($_FILES['foto']['tmp_name'],$filedestino);
			$imgproducto= $_FILES['foto']['name'];
			if (isset($_POST)) {
				$addproducto->idproducto =$_POST['idproducto'];
				$addproducto->img_producto=$imgproducto;
				$addproducto->titulo=$_POST['nameproducto'];
				$addproducto->price=$_POST['price'];
				$addproducto->price_list=$_POST['price-promo'];
				$addproducto->brand_id=$_POST['brand'];
				$addproducto->categorias_id=$_POST['categoria'];
				$addproducto->subcategoria_id=$_POST['subcategoria'];
				$addproducto->descripcion=$_POST['descripcion'];
				$addproducto->destacado=$_POST['destacado'];
				$addproducto->cantidad1 = $cantidad1;
				$addproducto->cantidad2 = $cantidad2;
				$addproducto->cantidad3 = $cantidad3;
				$addproducto->cantidad4 = $cantidad4;
				$addproducto->cantidad5 = $cantidad5;
				$addproducto->idtc1 = $idtc1;
				$addproducto->idtc2 = $idtc2;
				$addproducto->idtc3 = $idtc3;
				$addproducto->idtc4 = $idtc4;
				$addproducto->idtc5 = $idtc5;
				$addproducto->updateproducto();
			}else{
				echo "<script language='JavaScript'> alert('Oooops aún no agregas un producto'); window.location='../../cpanel/productos.php';</script>";
			}		
		}
	}else{
		if (isset($_POST)) {
				$addproducto->idproducto =$_POST['idproducto'];
				$addproducto->img_producto=$_POST['fotodefault'];
				$addproducto->titulo=$_POST['nameproducto'];
				$addproducto->price=$_POST['price'];
				$addproducto->price_list=$_POST['price-promo'];
				$addproducto->brand_id=$_POST['brand'];
				$addproducto->categorias_id=$_POST['categoria'];
				$addproducto->subcategoria_id=$_POST['subcategoria'];
				$addproducto->descripcion=$_POST['descripcion'];
				$addproducto->destacado=$_POST['destacado'];
				$addproducto->cantidad1 = $cantidad1;
				$addproducto->cantidad2 = $cantidad2;
				$addproducto->cantidad3 = $cantidad3;
				$addproducto->cantidad4 = $cantidad4;
				$addproducto->cantidad5 = $cantidad5;
				$addproducto->idtc1 = $idtc1;
				$addproducto->idtc2 = $idtc2;
				$addproducto->idtc3 = $idtc3;
				$addproducto->idtc4 = $idtc4;
				$addproducto->idtc5 = $idtc5;
				$addproducto->updateproducto();
		}else{
			echo "<script language='JavaScript'> alert('Oooops aún no agregas un producto'); window.location='../../cpanel/productos.php';</script>";
		}
	}
?>