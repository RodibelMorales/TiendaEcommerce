			<div class="container">
				<div class="imgLogo">
					<img  class="img-responsive" src="img/logo.jpg">	
				</div>
				<div class="containercart1">
					<p class="cartHeader" data-toggle="modal"  id="carritodetails">
						<?php 
						if(isset($_SESSION["products"])){
						    echo "<i class='fa fa-shopping-cart' aria-hidden='true'></i>Mi Carrito (".count($_SESSION["products"]).")"; 
						}else{
						    echo "<i class='fa fa-shopping-cart' aria-hidden='true'></i>Mi Carrito (0)"; 
						}
						?>
					</p>
					<div class="shopping-cart-box">
						<a href="#" class="close-shopping-cart-box" ><i class="fa fa-times" aria-hidden="true"></i></a>
						<h3>Mi Compras</h3>
					    <div id="shopping-cart-results"></div>
					</div>
				</div>
			</div>
			<nav class="navbar navbar-default" role="navigation" >
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target = "#MenuResponsive">
						<span class="sr-only">Menu Principal</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img  class="img-responsiveR" src="img/logo.jpg"></a>				
				</div>
				<?php $showcategorie->showcategories();?>
			</nav>