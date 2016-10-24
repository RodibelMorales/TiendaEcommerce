<?php
	session_start();
	include '../clases/classcontroler.php';
	$newcarrito = new carritocompras;
	$fechaVenta = date("Y-m-d");
			if (isset($_REQUEST["buyproducts"]) && $_REQUEST["buyproducts"] ==2) {
				if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
						foreach($_SESSION["products"] as $cart){
								if ($cart === end($_SESSION["products"])) {
									$newcarrito->idproducto 	= $cart["id"];
								    $newcarrito->titulo			= $cart["titulo"];
								    $newcarrito->numerocompra   = $cart["NumCompra"];
								    $newcarrito->status 		= 0; 
								    $newcarrito->price 			= $cart["price"];
								    $newcarrito->tallas 		= $cart["tallas"];
								    $newcarrito->cantidadP 		= $cart["cantidadproductos"];
								    $newcarrito->categoriaid 	= $cart["categoriaid"];
								    $newcarrito->color 			= $cart["color"];
								    $newcarrito->t_cuello       = $cart["t_cuello"];
								    $newcarrito->t_manga		= $cart["t_manga"];
								    $newcarrito->t_punio		= $cart["t_punio"];
								    $newcarrito->mangas 		= $cart["mangas"];
									$newcarrito->bordado		= $cart["bordado"];
									$newcarrito->altura			= $cart["altura"]; 
									$newcarrito->peso			= $cart["peso"];    
									$newcarrito->complex		= $cart["complex"];
									$newcarrito->torax			= $cart["torax"];     
									$newcarrito->cadera			= $cart["cadera"]; 
									$newcarrito->hombros		= $cart["hombros"];	
									$newcarrito->longitud		= $cart["longitud"]; 	
									$newcarrito->punio			= $cart["punio"];  	 
									$newcarrito->biceps			= $cart["biceps"];
									$newcarrito->tipo			= $cart["tipo"];
									$newcarrito->cuello			= $cart["cuello"];
									$newcarrito->datofinal 		= "si";
									$newcarrito->fecha_compra   = $fechaVenta;
									$newcarrito->insertCart();
								}else{
									$newcarrito->idproducto 	= $cart["id"];
								    $newcarrito->titulo			= $cart["titulo"];
								    $newcarrito->numerocompra   = $cart["NumCompra"];
								    $newcarrito->status 		= 0; 
								    $newcarrito->price 			= $cart["price"];
								    $newcarrito->tallas 		= $cart["tallas"];
								    $newcarrito->cantidadP 		= $cart["cantidadproductos"];
								    $newcarrito->categoriaid 	= $cart["categoriaid"];
								    $newcarrito->color 			= $cart["color"];
								    $newcarrito->t_cuello       = $cart["t_cuello"];
								    $newcarrito->t_manga		= $cart["t_manga"];
								    $newcarrito->t_punio		= $cart["t_punio"];
								    $newcarrito->mangas 		= $cart["mangas"];
									$newcarrito->bordado		= $cart["bordado"];
									$newcarrito->altura			= $cart["altura"]; 
									$newcarrito->peso			= $cart["peso"];    
									$newcarrito->complex		= $cart["complex"];
									$newcarrito->torax			= $cart["torax"];     
									$newcarrito->cadera			= $cart["cadera"]; 
									$newcarrito->hombros		= $cart["hombros"];	
									$newcarrito->longitud		= $cart["longitud"]; 	
									$newcarrito->punio			= $cart["punio"];  	 
									$newcarrito->biceps			= $cart["biceps"];
									$newcarrito->tipo			= $cart["tipo"];
									$newcarrito->cuello			= $cart["cuello"];
									$newcarrito->datofinal 		= "no";
									$newcarrito->fecha_compra   = $fechaVenta;
									$newcarrito->insertCart();
								}

						}
				}else{
					die("<h5 class='noarticle'><i class='fa fa-exclamation-circle faSpace' aria-hidden='true'></i>Error al procesar el carrito</h5>");
				}
			}
?>