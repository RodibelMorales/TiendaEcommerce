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
		/*Tabla VENTAS*/
		public $id_compra;
		public $producto;
		public $tipo;
		public $status;
		public $talla;
		public $cantidad;
		public $producto_id;

		public function showitemscarrito(){
			$enlaceitem= mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
			$itemcantidad 	 = $this->cantidadproductos;#variable que almacena la cantidad que se envia mediante POST
			$itemtallass 	 = $this->tallas; #variable que cacha la talla del producto
			/*Variables para productos personalizados*/
			$itemprice 		 = $this->price;
			$itemcategoriaid = $this->categoriaid;
			$itemcolor 		 = $this->color;
			$item_Tcuello    = $this->t_cuello;
			$item_Tmanga     = $this->t_manga;
			$itemt_punio 	 = $this->t_punio;
			$itemmanga 		 = $this->mangas;
			$itembordado 	 = $this->bordado;
			$itemaltura  	 = $this->altura;
			$itempeso 		 = $this->peso;
			$itemcomplex 	 = $this->complex;
			$itemtorax       = $this->torax;
			$itemcadera      = $this->torax;
			$itemhombros 	 = $this->hombros;
			$itemlongitud 	 = $this->longitud;
			$itempunio  	 = $this->punio;
			$itembiceps      = $this->biceps;
			$itemtipo        = $this->tipo;
			$itemcuello 	 = $this->cuello;
 
			$NumCompra =mysqli_query($enlaceitem,"SELECT NumCompra FROM ventas ORDER BY NumCompra DESC LIMIT 1");
			while ($RsultNumBuy = mysqli_fetch_array($NumCompra)) {
				$NumBuy = $RsultNumBuy['NumCompra'];
			}
			if ($NumBuy == 0) {
				$NumBuy =1;
				$consultaitem =mysqli_query($enlaceitem,"SELECT * FROM productos WHERE id ='{$this->idproducto}' LIMIT 1");
				while ($ritem=mysqli_fetch_array($consultaitem)) {
					/*Valores que se almacenaran en la sesión del carrito*/
					$items["id"] = $this->id  = $ritem['id'];
					$items["NumCompra"] = $NumBuy;
					$items["img_producto"] = $this->img_producto  = $ritem['img_producto'];
					$items["titulo"] = $this->titulo = $ritem['titulo'];
					$items["price"] = $this->price  = $ritem['price'];
					$items["price_list"] = $this->price_list  = $ritem['price_list'];
					$items["descripcion"] = $this->descripcion  = $ritem['descripcion'];
					$items["brand_id"]    = $this->brand_id = $ritem["brand_id"];
					$items["cantidadproductos"] =$itemcantidad;
					$items["tallas"] = $itemtallass;
					$items["categoriaid"] = $itemcategoriaid;
					$items["color"] = $itemcolor;
					$items["t_cuello"] = $item_Tcuello;
					$items["t_manga"] = $item_Tmanga;
					$items["t_punio"] = $itempunio;
					$items["mangas"]   = $itemmanga;
					$items["bordado"] = $itembordado;
					$items["altura"]  = $itemaltura;
					$items["peso"]    = $itempeso;
					$items["complex"] = $itemcomplex;
					$items["torax"] = $itemtorax;      
					$items["cadera"] = $itemcadera;      
					$items["hombros"] = $itemhombros; 	
					$items["longitud"] = $itemlongitud; 	
					$items["punio"] = $itempunio;  	 
					$items["biceps"] = $itembiceps;
					$items["tipo"] = $itemtipo;
					$items["cuello"] = $itemcuello;


					if (isset($_SESSION['products'][$this->idproducto])) {
						unset($_SESSION['products'][$this->idproducto]);
					}
					$_SESSION['products'][$this->idproducto]= $items;
					#$trybuysql = mysqli_query($enlaceitem,"INSERT INTO ventas (producto,tipo,status,talla,cantidad,producto_id)");
				}
				$totalitems = count($_SESSION['products']);

				die(json_encode(array('items'=>$totalitems)));
			}else{
				$NumBuy++;
				$consultaitem =mysqli_query($enlaceitem,"SELECT * FROM productos WHERE id ='{$this->idproducto}' LIMIT 1");
				while ($ritem=mysqli_fetch_array($consultaitem)) {
					/*Valores que se almacenaran en la sesión del carrito*/
					$items["id"] = $this->id  = $ritem['id'];
					$items["NumCompra"] = $NumBuy;
					$items["img_producto"] = $this->img_producto  = $ritem['img_producto'];
					$items["titulo"] = $this->titulo = $ritem['titulo'];
					$items["price"] = $this->price  = $ritem['price'];
					$items["price_list"] = $this->price_list  = $ritem['price_list'];
					$items["descripcion"] = $this->descripcion  = $ritem['descripcion'];
					$items["brand_id"]    = $this->brand_id = $ritem["brand_id"];
					$items["cantidadproductos"] =$itemcantidad;
					$items["tallas"] = $itemtallass;
					$items["categoriaid"] = $itemcategoriaid;
					$items["color"] = $itemcolor;
					$items["t_cuello"] = $item_Tcuello;
					$items["t_manga"] = $item_Tmanga;
					$items["t_punio"] = $itempunio;
					$items["mangas"]   = $itemmanga;
					$items["bordado"] = $itembordado;
					$items["altura"]  = $itemaltura;
					$items["peso"]    = $itempeso;
					$items["complex"] = $itemcomplex;
					$items["torax"] = $itemtorax;      
					$items["cadera"] = $itemcadera;      
					$items["hombros"] = $itemhombros; 	
					$items["longitud"] = $itemlongitud; 	
					$items["punio"] = $itempunio;  	 
					$items["biceps"] = $itembiceps;
					$items["tipo"] = $itemtipo;
					$items["cuello"] = $itemcuello;


					if (isset($_SESSION['products'][$this->idproducto])) {
						unset($_SESSION['products'][$this->idproducto]);
					}
					$_SESSION['products'][$this->idproducto]= $items;
					#$trybuysql = mysqli_query($enlaceitem,"INSERT INTO ventas (producto,tipo,status,talla,cantidad,producto_id)");
				}
				$totalitems = count($_SESSION['products']);

				die(json_encode(array('items'=>$totalitems)));
			}
			mysqli_free_result($consultaitem);
			mysqli_close($enlaceitem);			
		}
		public function insertCart(){
			$enlaceAddCart= mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
			if ($this->datofinal == "si") {
				$addcart = mysqli_query($enlaceAddCart,"INSERT INTO ventas (NumCompra,producto,tipo,status,talla,cantidad_venta,fecha_compra,productos_idSold,color,t_cuello,manga,t_punio,bordado,altura,peso,complex,torax,cadera,mangas,hombros,longitud,punios,biceps,price,categoriaid) VALUES ('{$this->numerocompra}','{$this->titulo}','{$this->tipo}','{$this->status}','{$this->tallas}','{$this->cantidadP}','{$this->fecha_compra}','{$this->idproducto}','{$this->color}','{$this->t_cuello}','{$this->t_manga}','{$this->t_punio}','{$this->bordado}','{$this->altura}','{$this->peso}','{$this->complex}','{$this->torax}','{$this->cadera}','$this->mangas','{$this->hombros}','{$this->longitud}','{$this->punio}','{$this->biceps}','{$this->price}','{$this->categoriaid}')");
				echo "Muchas gracias por tu compra";

				session_destroy();
			}else{
				$addcart = mysqli_query($enlaceAddCart,"INSERT INTO ventas (NumCompra,producto,tipo,status,talla,cantidad_venta,fecha_compra,productos_idSold,color,t_cuello,manga,t_punio,bordado,altura,peso,complex,torax,cadera,mangas,hombros,longitud,punios,biceps,price,categoriaid) VALUES ('{$this->numerocompra}','{$this->titulo}','{$this->tipo}','{$this->status}','{$this->tallas}','{$this->cantidadP}','{$this->fecha_compra}','{$this->idproducto}','{$this->color}','{$this->t_cuello}','{$this->t_manga}','{$this->t_punio}','{$this->bordado}','{$this->altura}','{$this->peso}','{$this->complex}','{$this->torax}','{$this->cadera}','$this->mangas','{$this->hombros}','{$this->longitud}','{$this->punio}','{$this->biceps}','{$this->price}','{$this->categoriaid}')");
			}
		}

		public function updateStatusCompra(){
			$enlace= mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
			$upStatus = mysqli_query($enlace, "UPDATE ventas SET status = '1', payer_email = '{$this->p_email}', address_name = '{$this->address_name}',address_country = '{$this->address_country}', address_country_code = '{$this->address_country_code}', address_state = '{$this->address_state}', address_city = '{$this->address_city}', address_street = '{$this->address_street}',txtid = '{$this->txn_id}' WHERE NumCompra = '{$this->Numcompra}' AND producto = '{$this->producto}'");

			if ($upStatus) {
					$selectVenta = mysqli_query($enlace,"SELECT talla,cantidad_venta,productos_idSold FROM ventas WHERE Numcompra ='{$this->Numcompra}' AND producto = '{$this->producto}' AND txtid = '{$this->txn_id}'");
					#echo "SELECT talla,cantidad_venta,productos_idSold FROM ventas WHERE Numcompra ='{$this->Numcompra}' AND producto = '{$this->producto}' AND txtid = '{$this->txn_id}'"."</br>";
					while ($rsold = mysqli_fetch_array($selectVenta)) {

						$getallaventa = $rsold["talla"];
						$getcantidadventa = $rsold["cantidad_venta"];
						$getpruoductoIdSold = $rsold["productos_idSold"];
						$selectTC = mysqli_query($enlace,"SELECT cantidad FROM tallas_cantidades WHERE tallas ='$getallaventa' AND productos_id ='$getpruoductoIdSold'");
						#echo "SELECT cantidad FROM tallas_cantidades WHERE tallas ='".$getallaventa."' AND productos_id ='".$getpruoductoIdSold."' </br>";
							if ($selectTC) {
								while ($rUpTallaCantidad = mysqli_fetch_array($selectTC)) {
									$getstockcantidad = $rUpTallaCantidad["cantidad"];
									$cant_sold = $getcantidadventa;
									$cantidadStock = $getstockcantidad;
									
									$RestaProducto = $cantidadStock - $cant_sold;
									$UpTC = mysqli_query($enlace,"UPDATE tallas_cantidades SET cantidad='".$RestaProducto."' WHERE tallas ='".$getallaventa."' AND productos_id ='".$getpruoductoIdSold."' ");
									#echo "UPDATE tallas_cantidades SET cantidad='".$RestaProducto."' WHERE tallas ='".$getallaventa."' AND productos_id ='".$getpruoductoIdSold."' </br>";
									#echo "Listo";
								}
							}else{}

					}
			}else{}
			#echo "UPDATE ventas SET status = '1', payer_email = '{$this->p_email}', address_name = '{$this->address_name}',address_country = '{$this->address_country}', address_country_code = '{$this->address_country_code}', address_state = '{$this->address_state}', address_city = '{$this->address_city}', address_street = '{$this->address_street}', txt_id = '{$this->txt_id}' WHERE NumCompra = '{$this->Numcompra}' AND producto = '{$this->producto}'";
			//si se actualiza la venta SELECT ¨id,tituloproducto FROM productos WHERE titulo ='$this->producto';
			//si hay datos se crea una consulta uptade tallas_cantidades set cantidad - cantidad enviada por paypal valores  where id =id_consulta and tallas = talla=consulta


		}
	}

?>