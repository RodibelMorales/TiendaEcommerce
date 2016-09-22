function verdetallesproduct(id){
	$(id).modal('show');
}

/*--------------carrito de compras--------------*/
$(".formaddcart").submit(function(e){ 
    var form_data = $(this).serialize(); 
    var button_content = $(this).find('button[type=submit]'); 
    button_content.html('Agregando...'); 

    $.ajax({ //make ajax request to cart_process.php
        url: "servidor/enviosPost/sendinfocart.php",
        type: "POST",
        dataType:"json", //expect json value from server
        data: form_data
    }).done(function(data){ //on Ajax success
        $(".cartHeader").html(data.items); //total items count fetch in cart-info element
        button_content.html('<i class="fa fa-check faSpace" aria-hidden="true"></i>Producto agregado'); //reset button text to original text
        if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
            $(".cartHeader").trigger( "click" ); //trigger click to update the cart box.
        }

    })
    e.preventDefault();
});
$( ".cartHeader").click(function(e) { //when user clicks on cart box
    e.preventDefault(); 
   	$(".shopping-cart-box").fadeIn(); //display cart box
    $("#shopping-cart-results").html('<img src="http://www.downgraf.com/wp-content/uploads/2014/09/01-progress.gif">');
    $("#shopping-cart-results").load( "servidor/enviosPost/sendinfocart.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
});
