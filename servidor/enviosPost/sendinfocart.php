<?php 
	session_start();
	include '../clases/classcontroler.php';
	$newcarrito = new carritocompras();
	if (isset($_POST['idproducto'])) {
		$newcarrito->idproducto = $_POST['idproducto'];
		$newcarrito->cantidadproductos = $_POST['cantidadproductos'];
		$newcarrito->tallas = $_POST['TallCant'];
		/*Variables para productos personalizados*/
		$newcarrito->price = $_POST['price'];
		$newcarrito->categoriaid = $_POST['categoriaid'];
		$newcarrito->color = $_POST['color'];
		$newcarrito->t_cuello = $_POST['t_cuello'];
		$newcarrito->t_manga = $_POST['t_manga'];
		$newcarrito->t_punio = $_POST['t_punio'];
		$newcarrito->bordado = $_POST['bordado'];
		$newcarrito->altura  = $_POST['altura'];
		$newcarrito->peso  = $_POST['peso'];
		$newcarrito->complex = $_POST['complex'];
		$newcarrito->torax = $_POST['torax'];
		$newcarrito->cadera = $_POST['torax'];
		$newcarrito->mangas = $_POST['mangas'];
		$newcarrito->hombros = $_POST['hombros'];
		$newcarrito->longitud = $_POST['longitud'];
		$newcarrito->punio  = $_POST['punios'];
		$newcarrito->biceps = $_POST['biceps'];
		$newcarrito->tipo = $_POST['tipo'];
		$newcarrito->cuello = $_POST['cuello'];
		$newcarrito->showitemscarrito();
		
	}
			/*Muestra el carrito de compras*/
			if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
			{
			    if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
			        $cart_box = '<div class="table-responsive">
			        				<table class="table tablaproductos">
			        				<thead>
			        					<tr>
			        						<th class="thtitle"></th>
			        						<th class="thtitle">Producto</th>
			        						<th class="thtitle">Talla (s)</th>
			        						<th class="thtitle">Cantidad</th>
			        						<th class="thtitle">total por producto(s)</th>
			        						<th class="thtitle"></th>
			        					<tr>
			        				</thead>';
							        $total = 0;
							        $itemvalue = 1;
							        $cart_box .="<input type='hidden' name='cmd' value='_cart'>
                								 <input type='hidden' name='business' value='vendedorYaxkin@gmail.com'>
												 <input type='hidden' name='currency_code' value='MXN'>
												 <input type='hidden' name='return' value='http://yaxkinguayaberas.com/preguntas-frecuentes/'>
												 <input type='hidden' name='cancel_return' value='http://yaxkinguayaberas.com/contacto/'>
												 <input type='hidden' name='lc' value='es'>
                								 ";
			        				$cart_box .="<input type='hidden' name='upload' value='1'> ";

							        foreach($_SESSION["products"] as $product){ //loop though items and prepare html content
							            
							            //set variables to use them in HTML content below
							            $product_code = $product["id"];
							            $product_numbuy = $product["NumCompra"];
							            $product_img  = $product["img_producto"]; #dato opcional
							            $product_name = $product["titulo"]; 
							            $product_price = $product["price"];
							            $product_tallas = $product["tallas"];
							            $product_tipo   = $product["brand_id"];
							            $product_qty =$product["cantidadproductos"];
							            $cart_box .=  "
							            	<tr>
							            		<td style='text-aling:center;'><img src='cpanel/products/".$product_img."' style='width:35px;height:45px;'></td>
							            		<td style='text-aling:center;vertical-align: middle;'>$product_name</td>";
							            		if ($product_tallas == null) {
							            			$cart_box .="<td style='text-aling:center;vertical-align: middle;'>Personalizada</td>";
							            		}else{
							            			$cart_box .="<td style='text-aling:center;vertical-align: middle;'>$product_tallas</td>";
							            		}
							            		
							            $cart_box.="		
							            		<td style='text-aling:center;vertical-align: middle;'> $product_qty</td>
							            		<td style='text-aling:center;vertical-align: middle;'>$".sprintf("%01.2f", ($product_price * $product_qty)). "</td> 
							            		<td style='text-aling:center;vertical-align: middle;'>
							            			<a href='#' class='elimina-item' data-code='".$product_code."'>
							            				<i class='fa fa-trash-o' aria-hidden='true'></i></a>
							            		</td>
							            	</tr>";

							            $cart_box .= "<input type='hidden' name='item_name_".$itemvalue."' value='".$product_name."'>";
							            $cart_box .= "<input type='hidden' name='item_number_".$itemvalue."' value='".$product_numbuy."'>";
							            $cart_box .= "<input type='hidden' name='quantity_".$itemvalue."' value='".$product_qty."'>";
							            $cart_box .= "<input type='hidden' name='amount_".$itemvalue."' value='".$product_price."'>";
							        	$itemvalue++;
							            $subtotal = ($product_price * $product_qty);
							            $total = ($total + $subtotal);
							        }
			        $cart_box .= " </table>
			        			</div>";

			        $cart_box .= '<div class="cart-products-total">Total : $'.sprintf("%01.2f",$total).'</div>';
			        die($cart_box);
			    }else{
			        die("<h5 class='noarticle'><i class='fa fa-exclamation-circle faSpace' aria-hidden='true'></i>Sin articulos</h5>");
			    }
			}
			/*Elimina elementos del carrito*/		
			if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
			{
			    $product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

			    if(isset($_SESSION["products"][$product_code]))
			    {
			        unset($_SESSION["products"][$product_code]);
			    }
			    
			    $total_items = count($_SESSION["products"]);
			    die(json_encode(array('items'=>$total_items)));
			}

?>