<?php 
	/**
	* Clase que se encargara de insertar datos en la base
	*/
	class newadd
	{
		/*Tabla brand*/
		public $id;
		public $marca;
		/*Tabla categoria*/
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

		/*Funcion que se encarga de agregar registros a la tabla brand*/
		public function addbrand(){
			$enlaceadd = mysqli_connect('localhost','root','','dbyaxkin');
			#$enlaceadd = mysqli_connect('localhost','root','medalofhonor','dbyaxkin');
			$exisbrand = mysqli_query($enlaceadd, "SELECT * FROM brand WHERE marca = '{$this->marca}' ");
				if (mysqli_num_rows($exisbrand)>0) {
					echo "<script language='JavaScript'> alert('El articulo que intentas agregar ya existe!'); window.location='../../cpanel/brands.php';</script>";
				}else{
					$savebrand = mysqli_query($enlaceadd, "INSERT INTO brand (marca) values ('{$this->marca}') ");
					if ($savebrand) {
						echo "<script language='JavaScript'> alert('Agregado exitosamente'); window.location='../../cpanel/brands.php';</script>";
					}else{
						echo "<script language='JavaScript'> alert('Error al guardar intenta nuevamente'); window.location='../../cpanel/brands.php';</script>";
					} 
				}
			mysqli_free_result($exisbrand);
			mysqli_close($enlaceadd);
		}
		public function addcategorie(){
			$enlace = mysqli_connect("localhost","root","","dbyaxkin");
			#$enlace = mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
			$verificaCategorie= mysqli_query($enlace, "SELECT categoria FROM categorias WHERE categoria='{$this->categoria}'");

				if (mysqli_num_rows($verificaCategorie)>0) {
					echo "<script language='JavaScript'> alert('La categoria ya existe!'); window.location='../../cpanel/categorias.php';</script>";
				}else{
					$addcategoria = mysqli_query($enlace,"INSERT INTO categorias (categoria,parent) VALUES ('{$this->categoria}','{$this->parent}')");
					if ($addcategoria) {
						echo "<script language='JavaScript'> alert('Categoria agregada exitosamente'); window.location='../../cpanel/categorias.php';</script>";
					}else{
						echo "<script language='JavaScript'> alert('Error al agregar categoria'); window.location='../../cpanel/categorias.php';</script>";
					}
				}
		}
		public function addproducto(){
			#$enlaceadd = mysqli_connect('localhost','root','','dbyaxkin');
			$enlaceadd = mysqli_connect('localhost','root','medalofhonor','dbyaxkin');

			$newproducto = mysqli_query($enlaceadd,"INSERT INTO productos (
				titulo,
				price,
				price_list,
				destacado,
				img_producto,
				descripcion,
				brand_id,
				categorias_id,
				subcategoria_id ) 				
				VALUES ('{$this->titulo}','{$this->price}','{$this->price_list}','{$this->destacado}','{$this->img_producto}','{$this->descripcion}','{$this->brand_id}','{$this->categorias_id}','{$this->subcategoria_id}')");
			

			if ($newproducto) {
				$idproducto= mysqli_insert_id($enlaceadd);
				$addtall_cant1 = mysqli_query($enlaceadd,"INSERT INTO tallas_cantidades (tallas,cantidad,productos_id) VALUEs ('{$this->tallas1}','{$this->cantidad1}','".$idproducto."') ");
				$addtall_cant2 = mysqli_query($enlaceadd,"INSERT INTO tallas_cantidades (tallas,cantidad,productos_id) VALUEs ('{$this->tallas2}','{$this->cantidad2}','".$idproducto."') ");
				$addtall_cant3 = mysqli_query($enlaceadd,"INSERT INTO tallas_cantidades (tallas,cantidad,productos_id) VALUEs ('{$this->tallas3}','{$this->cantidad3}','".$idproducto."') ");
				$addtall_cant4 = mysqli_query($enlaceadd,"INSERT INTO tallas_cantidades (tallas,cantidad,productos_id) VALUEs ('{$this->tallas4}','{$this->cantidad4}','".$idproducto."') ");
				$addtall_cant5 = mysqli_query($enlaceadd,"INSERT INTO tallas_cantidades (tallas,cantidad,productos_id) VALUEs ('{$this->tallas5}','{$this->cantidad5}','".$idproducto."') ");

				if ($addtall_cant1 and $addtall_cant2 and $addtall_cant3 and $addtall_cant4 and $addtall_cant5) {
					echo "<script language='JavaScript'> alert('Producto agregado exitosamente'); window.location='../../cpanel/productos.php';</script>";
				}else{
					echo "<script language='JavaScript'> alert('Error al agregar las tallas'); window.location='../../cpanel/productos.php';</script>";
				}
				
			}else{
				echo "<script language='JavaScript'> alert('Error al agregar producto, intanta nuevamente'); window.location='../../cpanel/productos.php';</script>";
			}
		}
	}

?>