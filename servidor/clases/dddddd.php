			/*if ($upStatus) {
				$selectVenta = mysqli_query($enlace,"SELECT talla,cantidad_venta,productos_idSold FROM ventas WHERE Numcompra ='{$this->Numcompra}' AND producto = '{$this->producto}' AND txnid = '{$this->txn_id}'");
				while ($rsold = mysqli_fetch_array($selectVenta)) {
					$selectTC = mysqli_query($enlace,"SELECT cantidad FROM tallas_cantidades WHERE tallas ='{$this->tallas=$rsold['talla']}' AND productos_id ='{$this->productos_id=$rsold['productos_idSold']}' ");
						if ($selectTC) {
							while ($rUpTallaCantidad = mysqli_fetch_array($selectTC)) {
								$cant_sold = $rsold["cantidad_venta"];
								$cantidadStock = $rUpTallaCantidad["cantidad"];
								/*Operacion resta producto*/
					/*			$RestaProducto = $cantidadStock - $cant_sold;
								$UpTC = mysqli_query($enlace,"UPDATE tallas_cantidades SET cantidad='".$RestaProducto."' WHERE tallas ='".$this->tallas=$rsold['talla']."' AND productos_id ='".$this->productos_id=$rsold['productos_idSold']."' ");
								echo "Listo";
							}
						}else{}

				}
			}else{}*/
			#echo "UPDATE ventas SET status = '1', payer_email = '{$this->p_email}', address_name = '{$this->address_name}',address_country = '{$this->address_country}', address_country_code = '{$this->address_country_code}', address_state = '{$this->address_state}', address_city = '{$this->address_city}', address_street = '{$this->address_street}', txt_id = '{$this->txt_id}' WHERE NumCompra = '{$this->Numcompra}' AND producto = '{$this->producto}'";
			//si se actualiza la venta SELECT ¨id,tituloproducto FROM productos WHERE titulo ='$this->producto';
			//si hay datos se crea una consulta uptade tallas_cantidades set cantidad - cantidad enviada por paypal valores  where id =id_consulta and tallas = talla=consulta