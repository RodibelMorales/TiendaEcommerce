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
			#$enlaceDeleteBrand = mysqli_connect("localhost","root","","dbyaxkin");
			$enlaceDeleteBrand = mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
			$Delete = mysqli_query($enlaceDeleteBrand, "DELETE FROM `brand` WHERE id='{$this->id}' ");

			if ($Delete){
				echo "<script language='JavaScript'> alert('Eliminado Correctamente'); window.location='../../cpanel/brands.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Error al intentar eliminar'); window.location='../../cpanel/brands.php';</script>";
			}
		}
		public function EditBrand(){
			#$enlaceEditBrand = mysqli_connect("localhost","root","","dbyaxkin");
			$enlaceEditBrand = mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
			$editbrand = mysqli_query($enlaceEditBrand,"UPDATE brand SET marca='{$this->marca}' WHERE id='{$this->id}'");
			if ($editbrand) {
				echo "<script language='JavaScript'> alert('Se guardaron los cambios Correctamente'); window.location='../../cpanel/brands.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Ocurrio un error al guardar los datos'); window.location='../../cpanel/brands.php';</script>";
			}
		}
		/*------------------------------------*/
		public function DeleteCategorie(){
			#$enlacedeletecategorie = mysqli_connect("localhost","root","","dbyaxkin");
			$enlacedeletecategorie = mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
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
					echo "delte completo";
				}
		}
		public function UpdateCategoria(){
			$enlaceUpc = mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
			#$enlaceUpc = mysqli_connect("localhost","root","","dbyaxkin");

			$upcategoria= mysqli_query($enlaceUpc,"UPDATE categorias SET categoria='{$this->categoria}' WHERE id='{$this->id}'");
			if ($upcategoria) {
				echo "<script language='JavaScript'> alert('Categoria actualizada correctamente'); window.location='../../cpanel/categorias.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Error al actualizar categoria'); window.location='../../cpanel/categorias.php';</script>";
			}
		}
		/*------------------------------------*/
		public function deletesubcategoria(){
			$enlacedeletesubcat = mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
			#$enlacedeletesubcat = mysqli_connect("localhost","root","","dbyaxkin");
			
			$deletesubcat = mysqli_query($enlacedeletesubcat,"DELETE FROM categorias WHERE id='{$this->id}' ");
			if ($deletesubcat) {
				echo "<script language='JavaScript'> alert('subcategoria Eliminada Correctamente'); window.location='../../cpanel/categorias.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Error al eliminar subcategoria'); window.location='../../cpanel/categorias.php';</script>";
			}
		}
		public function updatesupcategoria(){
			$enlaceupsubcat = mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
			#$enlaceupsubcat = mysqli_connect("localhost","root","","dbyaxkin");
			$upsubcat =mysqli_query($enlaceupsubcat,"UPDATE categorias set categoria='{$this->categoria}' WHERE id='{$this->id}' ");
			if ($upsubcat) {
				echo "<script language='JavaScript'> alert('Subcategoria actualizada correctamente'); window.location='../../cpanel/categorias.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Error al actualizar Subcategoria'); window.location='../../cpanel/categorias.php';</script>";
			}
		
		}
		/*-------------------------------------*/
		public function deleteproducto(){
			$enlacedeletesubcat = mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
			#$enlacedeletesubcat = mysqli_connect("localhost","root","","dbyaxkin");
			
			$deleteproduct = mysqli_query($enlacedeletesubcat,"DELETE FROM productos WHERE id='{$this->id}' ");
			if ($deleteproduct) {
				echo "<script language='JavaScript'> alert('Producto Eliminado'); window.location='../../cpanel/productos.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Error al eliminar Producto'); window.location='../../cpanel/productos.php';</script>";
			}
		}
		public function updateproducto(){
			$enlaceupsubcat = mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
			#$enlaceupsubcat = mysqli_connect("localhost","root","","dbyaxkin");
			$uproducto = mysqli_query($enlaceupsubcat, "UPDATE productos set titulo ='{$this->titulo}',price='{$this->price}',price_list='{$this->price_list}',brand_id='{$this->brand_id}',categorias_id='{$this->categorias_id}',subcategoria_id='{$this->subcategoria_id}',descripcion='{$this->descripcion}',destacado='{$this->destacado}',tallas='{$this->tallas}', img_producto='{$this->img_producto}' WHERE id ='{$this->id}' ");
			if ($uproducto) {
				echo "<script language='JavaScript'> alert('Información del producto actualizada correctamente'); window.location='../../cpanel/productos.php';</script>";
			}else{
				echo "<script language='JavaScript'> alert('Error al actualizar información del producto'); window.location='../../cpanel/productos.php';</script>";
			}
		}
	}
?>