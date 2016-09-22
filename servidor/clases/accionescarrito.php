<?php
	/**
	* clase que realizara acciones del carrito de compras
	*/
	class carritocompras{
		
		/*Tabla productos*/
		public $id;
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

		public function showitemscarrito(){
			$enlaceitem= mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
			$itemcantidad = $this->cantidadproductos;#variable que almacena la cantidad que se envia mediante POST
			$consultaitem =mysqli_query($enlaceitem,"SELECT * FROM productos WHERE id ='{$this->idproducto}' LIMIT 1");
			if ($consultaitem) {
				while ($ritem=mysqli_fetch_array($consultaitem)) {
					$items["img_producto"] = $this->img_producto  = $ritem['img_producto'];
					$items["titulo"] = $this->titulo = $ritem['titulo'];
					$items["price"] = $this->price  = $ritem['price'];
					$items["price_list"] = $this->price_list  = $ritem['price_list'];
					$items["descripcion"] = $this->descripcion  = $ritem['descripcion'];
					$items["cantidadproductos"] =$itemcantidad;

					if (isset($_SESSION['products'][$this->idproducto])) {
						unset($_SESSION['products'][$this->idproducto]);
					}
					$_SESSION['products'][$this->idproducto]= $items;
				}
				$totalitems = count($_SESSION['products']);

				die(json_encode(array('items'=>$totalitems)));
			}


			
		}
	}

?>