<?php
	include '../clases/classcontroler.php';
	$addproducto = new acciones();
	$ruta="../../cpanel/products/";
	opendir($ruta);
	$filedestino =$ruta.$_FILES['foto']['name'];
	$tallas =$_POST['size1'].$_POST['cantidad1'].":size1:cantidad1,".$_POST['size2'].$_POST['cantidad2'].":size2:cantidad2,". $_POST['size3'].$_POST['cantidad3'].":size3:cantidad3,".$_POST['size4'].$_POST['cantidad4'].":size4:cantidad4,".$_POST['size5'].$_POST['cantidad5'].":size5:cantidad5";

	
	if (!empty($_FILES['foto']['name'])) {
		if (file_exists($filedestino)) {
			echo "<script language='JavaScript'> alert('Oooops ya hay una imagen con este nombre'); window.location='../../cpanel/productos.php';</script>";
		}else{
			copy($_FILES['foto']['tmp_name'],$filedestino);
			$imgproducto= $_FILES['foto']['name'];
			if (isset($_POST)) {
				$addproducto->id =$_POST['idproducto'];
				$addproducto->img_producto=$imgproducto;
				$addproducto->titulo=$_POST['nameproducto'];
				$addproducto->price=$_POST['price'];
				$addproducto->price_list=$_POST['price-promo'];
				$addproducto->brand_id=$_POST['brand'];
				$addproducto->categorias_id=$_POST['categoria'];
				$addproducto->subcategoria_id=$_POST['subcategoria'];
				$addproducto->descripcion=$_POST['descripcion'];
				$addproducto->destacado=$_POST['destacado'];
				$addproducto->tallas = $tallas;
				$addproducto->updateproducto();
			}else{
				echo "<script language='JavaScript'> alert('Oooops aún no agregas un producto'); window.location='../../cpanel/productos.php';</script>";
			}		
		}
	}else{
		if (isset($_POST)) {
			$addproducto->id =$_POST['idproducto'];
			$addproducto->img_producto=$_POST['fotodefault'];
			$addproducto->titulo=$_POST['nameproducto'];
			$addproducto->price=$_POST['price'];
			$addproducto->price_list=$_POST['price-promo'];
			$addproducto->brand_id=$_POST['brand'];
			$addproducto->categorias_id=$_POST['categoria'];
			$addproducto->subcategoria_id=$_POST['subcategoria'];
			$addproducto->descripcion=$_POST['descripcion'];
			$addproducto->destacado=$_POST['destacado'];
			$addproducto->tallas = $tallas;
			$addproducto->updateproducto();
		}else{
			echo "<script language='JavaScript'> alert('Oooops aún no agregas un producto'); window.location='../../cpanel/productos.php';</script>";
		}
	}
?>