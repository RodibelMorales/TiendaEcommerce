
    function verdetallesproduct(id){
    	$(id).modal('show');
    }

    /*------Agrega productos al carrito de compras---*/
    $(".formaddcart").submit(function(e){
        e.preventDefault();
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]'); 
        button_content.html('Agregando...'); 
        $.ajax({ //make ajax request to cart_process.php
            url: "servidor/enviosPost/sendinfocart.php",
            type: "POST",
            dataType:"json", //expect json value from server
            data: form_data
        }).done(function(data){ //on Ajax success
            $(".cartHeader").html("<i class='fa fa-shopping-cart' aria-hidden='true'></i>Mi Carrito ("+data.items+")"); //total items count fetch in cart-info element
            button_content.addClass("disabled");
            button_content.html('<i class="fa fa-check faSpace" aria-hidden="true"></i>Producto agregado'); //reset button text to original text
        })
    });
    /*Carrito de compras con productos a guardar en la DB*/
    $(".formpays").submit(function(e){
        e.preventDefault();
        var paydates = $(this).serialize(); 
        var button_content = $(this).find('button[type=submit]');
        button_content.html('Procesando Pago... <img src="img/loading.gif" style="width:20px;height:20px;">'); 
        $(".paycart").html('<div class="contLoading"><label class="txtLoaging">Cargando</label><img class="gifloading" src="img/loading.gif"></div>');
        $("#shopping-cart-results").load( "servidor/enviosPost/buytry.php?buyproducts=2", function (responseText, textStatus, XMLHttpRequest){
                if (textStatus == "success") {
                    button_content.addClass("disabled");
                    button_content.html('Pago procesado... <i class="fa fa-thumbs-up" aria-hidden="true"></i>'); 
                    window.location.href = "https://www.sandbox.paypal.com/cgi-bin/webscr?"+paydates+"";
                    //window.location.href = "https://www.paypal.com/cgi-bin/webscr"+paydates+"";
                }
                if (textStatus == "error") {
                    alert("Ocurrio un error al procesar el pago");
                }

        });
    });
    //Funcion encargada de mostrar el modal con el listado de productos
        $( ".cartHeader").click(function(e) {
            e.preventDefault();
           	$(".shopping-cart-box").fadeIn(); //Muestra carrito con otro efecto modal
            $("#shopping-cart-results").html('<div class="contLoading"><label class="txtLoaging">Cargando</label><img class="gifloading" src="img/loading.gif"></div>');
            $("#shopping-cart-results").load( "servidor/enviosPost/sendinfocart.php", {"load_cart":"1"});
        });
    //Funcion oaa eliminar items del carrito
        $("#shopping-cart-results").on('click', 'a.elimina-item', function(e) {
            e.preventDefault(); 
            var pcode = $(this).attr("data-code");
            $(this).parents('tr').fadeOut();
            $.getJSON( "servidor/enviosPost/sendinfocart.php", {"remove_code":pcode} , function(data){ 
                $(".cartHeader").html("<i class='fa fa-shopping-cart' aria-hidden='true'></i>Mi Carrito ("+data.items+")");
                $("#carritodetails").trigger( "click" );

            });
        });
 