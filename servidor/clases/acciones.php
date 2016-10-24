<?php
	/**
	* Clase de ejecutara los update o delete de la DB
	*/
	/**
	* 
	*/
	class acciones{
		/*Tabla brand*/
		public $id;
		public $marca;
		/*Tabla categorias*/
		public $categoria;
		public $parent;
		/*Tabla productos*/
		public $titulo;
		public $price;
		public $price_list;
		public $destacado;
		public $img_producto;
		public $tallas;
		public $descripcion;
		public $brand_id;
		public $categorias_id;
		public $subcategoria_id;
		/*-----------------------------------*/
		public function DeleteBrand(){
			$enlaceDeleteBrand = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
			$Delete = mysqli_query($enlaceDeleteBrand, "DELETE FROM `brand` WHERE id='{$this->id}' ");

			if ($Delete){
				echo "<script language='JavaScript'> alert('Eliminado Correctamente'); window.location='../../cpanel/brands.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Error al intentar eliminar'); window.location='../../cpanel/brands.php';</script>";
			}
		}
		public function EditBrand(){
			$enlaceEditBrand =mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
			$editbrand = mysqli_query($enlaceEditBrand,"UPDATE brand SET marca='{$this->marca}' WHERE id='{$this->id}'");
			if ($editbrand) {
				echo "<script language='JavaScript'> alert('Se guardaron los cambios Correctamente'); window.location='../../cpanel/brands.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Ocurrio un error al guardar los datos'); window.location='../../cpanel/brands.php';</script>";
			}
		}
		/*------------------------------------*/
		public function DeleteCategorie(){
			$enlacedeletecategorie = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
			$deletecategorie = mysqli_query($enlacedeletecategorie,"DELETE FROM categorias WHERE id='{$this->id}'");
				if ($deletecategorie) {
					$deletesubcategorie = mysqli_query($enlacedeletecategorie,"DELETE FROM categorias WHERE parent='{$this->id}'");
					if ($deletesubcategorie) {
						echo "<script language='JavaScript'> alert('Categoria Eliminada Correctamente'); window.location='../../cpanel/categorias.php';</script>";
					}
					else{
						echo "<script language='JavaScript'> alert('No se puedo eliminar la categoria, intanta nuevamente'); window.location='../../cpanel/categorias.php';</script>";
					}
				}else{
					echo "delete completo";
				}
		}
		public function UpdateCategoria(){
			$enlaceUpc = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');

			$upcategoria = mysqli_query($enlaceUpc,"UPDATE categorias SET categoria='{$this->categoria}' WHERE id='{$this->id}'");
			if ($upcategoria) {
				echo "<script language='JavaScript'> alert('Categoria actualizada correctamente'); window.location='../../cpanel/categorias.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Error al actualizar categoria'); window.location='../../cpanel/categorias.php';</script>";
			}
		}
		/*------------------------------------*/
		public function deletesubcategoria(){
			$enlacedeletesubcat = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
			
			$deletesubcat = mysqli_query($enlacedeletesubcat,"DELETE FROM categorias WHERE id='{$this->id}' ");
			if ($deletesubcat) {
				echo "<script language='JavaScript'> alert('subcategoria Eliminada Correctamente'); window.location='../../cpanel/categorias.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Error al eliminar subcategoria'); window.location='../../cpanel/categorias.php';</script>";
			}
		}
		public function updatesupcategoria(){
			$enlaceupsubcat = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
			$upsubcat = mysqli_query($enlaceupsubcat,"UPDATE categorias set categoria='{$this->categoria}' WHERE id='{$this->id}' ");
			if ($upsubcat) {
				echo "<script language='JavaScript'> alert('Subcategoria actualizada correctamente'); window.location='../../cpanel/categorias.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Error al actualizar Subcategoria'); window.location='../../cpanel/categorias.php';</script>";
			}
		
		}
		/*-------------------------------------*/
		public function deleteproducto(){
			$deleteProduct = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
			$deleteP = mysqli_query($deleteProduct,"DELETE FROM productos WHERE id='{$this->id}'")or die(mysqli_error($deleteProduct));
				if ($deleteP) {
					unlink("../../cpanel/products/".$this->imgdelete);
					echo "<script language='JavaScript'> alert('Eliminado Correctamente'); window.location='../../cpanel/productos.php';</script>";
				}else{
					echo "delete completo";
				}	
		}
		public function updateproducto(){
			$enlaceupsubcat = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
			#echo "UPDATE productos set titulo ='{$this->titulo}',price='{$this->price}',price_list='{$this->price_list}',brand_id='{$this->brand_id}',categorias_id='{$this->categorias_id}',descripcion='{$this->descripcion}',destacado='{$this->destacado}',img_producto='{$this->img_producto}' WHERE id ='{$this->idproducto}'";
			$uproducto = mysqli_query($enlaceupsubcat, "UPDATE productos set titulo ='{$this->titulo}',price='{$this->price}',price_list='{$this->price_list}',brand_id='{$this->brand_id}',categorias_id='{$this->categorias_id}',descripcion='{$this->descripcion}',destacado='{$this->destacado}',img_producto='{$this->img_producto}' WHERE id ='{$this->idproducto}' ");
			if ($uproducto) {
				$upTC1= mysqli_query($enlaceupsubcat, "UPDATE tallas_cantidades SET cantidad ='{$this->cantidad1}' WHERE id_tc ='{$this->idtc1}' AND productos_id='{$this->idproducto}' ");
				$upTC2= mysqli_query($enlaceupsubcat, "UPDATE tallas_cantidades SET cantidad ='{$this->cantidad2}' WHERE id_tc ='{$this->idtc2}' AND productos_id='{$this->idproducto}' ");
				$upTC3= mysqli_query($enlaceupsubcat, "UPDATE tallas_cantidades SET cantidad ='{$this->cantidad3}' WHERE id_tc ='{$this->idtc3}' AND productos_id='{$this->idproducto}' ");
				$upTC4= mysqli_query($enlaceupsubcat, "UPDATE tallas_cantidades SET cantidad ='{$this->cantidad4}' WHERE id_tc ='{$this->idtc4}' AND productos_id='{$this->idproducto}' ");
				$upTC5= mysqli_query($enlaceupsubcat, "UPDATE tallas_cantidades SET cantidad ='{$this->cantidad5}' WHERE id_tc ='{$this->idtc5}' AND productos_id='{$this->idproducto}' ");
					if ($upTC1 and $upTC2 and $upTC3 and $upTC4 and $upTC5){
						echo "<script language='JavaScript'> alert('Se actualizo correctamente el producto ".$this->titulo."'); window.location='../../cpanel/productos.php';</script> ";
					}else{
						echo "aqui";
					}
				echo "<script language='JavaScript'> alert('Error al actualizar la cantidad de productos'); window.location='../../cpanel/productos.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Error al actualizar información del producto'); window.location='../../cpanel/productos.php';</script>";
			}
		}
	}
?>