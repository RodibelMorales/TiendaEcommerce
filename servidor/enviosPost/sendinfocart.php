<?php 
	session_start();
	include '../clases/classcontroler.php';
	$newcarrito = new carritocompras();


	if (isset($_POST['idproducto'])) {
		$newcarrito->idproducto = $_POST['idproducto'];
		$newcarrito->cantidadproductos = $_POST['cantidadproductos'];
		$newcarrito->showitemscarrito();
		
	}
			if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
			{
				

			    if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
			        $cart_box = '<ul class="cart-products-loaded">';
			        $total = 0;
			        foreach($_SESSION["products"] as $product){ //loop though items and prepare html content
			            
			            //set variables to use them in HTML content below
			            $product_name = $product["titulo"]; 
			            $product_price = $product["price"];
			            $product_code = $product["price_list"];
			            $product_qty =$product["cantidadproductos"];
			            
			            $cart_box .=  "
			            	<li> Producto: $product_name (Cantidad: $product_qty) &mdash; subtotal".sprintf("%01.2f", ($product_price * $product_qty)). " <a href='#' class='remove-item' data-code='".$product_code."'>&times;</a></li>";
			            $subtotal = ($product_price * $product_qty);
			            $total = ($total + $subtotal);
			        }
			        $cart_box .= "</ul>";
			        $cart_box .= '<div class="cart-products-total">Total : '.sprintf("%01.2f",$total).' <u><a href="view_cart.php" title="Review Cart and Check-Out"><i class="fa fa-money faSpace" aria-hidden="true"></i>Pagar ahora</a></u></div>';
			        die($cart_box); //exit and output content
			    }else{
			        die("Your Cart is empty"); //we have empty cart
			    }
			}		
	
?>