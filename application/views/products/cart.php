<?php

require_once('component/component.php')

?>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col">
            <div class="col-md-8">
                <div class="shopping-cart">
                    <h6>Moj košík</h6>
                    <hr>

                    <?php

                    $total = 0;
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        if (isset($cart_products) && !empty($cart_products)) {
                            foreach ($cart_products as $products) {
                                foreach ($products as $product) {
                                    cartElement($product['product_image'], $product['product_name'], $product['product_price'], $product['id']);
                                    $total = $total + (int)$product['product_price'];
                                }
                            }
                        }
                    } else {
                        echo "<h5>Košík je prázny </h5>";
                    }
                    ?>

                </div>
            </div>

            <div class="col-4 border rounded my-5  bg-white">

                <div class=" p-4">
                    <div class="row price-details">
                        <div class="col-md-6">
                            <h6>Detaily ceny</h6>
                            <hr>
                            <?php
                            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<h6>Cena($count vecí v košíku)</h6>";
                            } else {
                                echo "<h6>Cena(0 vecí v košíku)</h6>";
                            }
                            ?>
                            <hr>
                            <h6>Zaplatiť</h6>
                            <div class="col-md-6">
                                <h6><?= $total ?> €</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    // add to cart and set count of produtcts in cart

    $('.remove-from-cart').click(function(e) {
        e.preventDefault();
        e.stopPropagation();

        _alert = $('.alert');
        _message = $('.msg');
        _cartProduct = $(this).closest('.cart-product')

        var _selfVal = $(this).attr('href'),
            _cartId = $('#cart_count'),
            _count = parseInt(_cartId.text()),
            _count = _count - 1;

        $.ajax({
            url: _selfVal,
            success: function(response) {

                response = $.parseJSON(response)
                if (response.status == 1) {

                    _msg = 'Produkt bol odobratý z košíku';
                    _message.text(_msg);
                    _cartId.text(_count);

                    _alert.show().addClass('alert-success');

                    _cartProduct.hide();
                };

                setTimeout(function() {
                    _alert.fadeOut('fast');
                }, 3000); // <-- time in milliseconds

            }
        });

        $('.hide-message').click(function(e) {
            e.preventDefault();
            e.stopPropagation();

            _alert.hide();
        })

    })
</script>