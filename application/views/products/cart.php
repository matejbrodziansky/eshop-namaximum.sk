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

                    if ($_SESSION) {
                        // pre_r($_SESSION);
                    }

                    $total = 0;


                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        if (isset($cart_products) && !empty($cart_products)) {
                            foreach ($cart_products as $products) {
                                foreach ($products as $product) {
                                    cartElement($product['product_image'], $product['product_name'], $product['product_price'], $product['id']);
                                    $total = $total + $product['product_price'];
                                }
                            }
                        }
                    } else {
                        echo "<h5>Košík je prázny </h5>";
                    }

                    ?>
                    <!-- <div  -->

                    <a id="discount-coupon" href="">Zlavový kód</a>

                    <div style="display: none;" class="coupon-input">
                        <form method="post">
                            <input type="text" name="discount-coupon" placeholder="Tu zadaj zlavový kód">
                            <button type="submit" class="btn btn-success btn-sm submit-coupon">Potvrď</button>
                        </form>
                    </div>
                    <!-- </div> -->

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


                                <h6 id="total-price"><?php if ($new_total = $_SESSION['discount'] ? $total - $_SESSION['discount'] . '' : $total) echo $new_total . ' €' ?> </h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    // remove from  cart and set count of produtcts in cart

    $('.remove-from-cart').click(function(e) {
        e.preventDefault();
        e.stopPropagation();



        //get removet product price
        let productPriceText = $(this).closest('.cart-product').find('.product-price').text();

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

                    //get total price,// get total price string€,// totalprice remove €,// productprice remove €, 
                    let _total = $('#total-price'),
                        _totalPriceText = _total.text(),
                        _totalPrice = _totalPriceText.replace('€', ''),
                        _productPrice = productPriceText.replace('€', '');

                    //set new price 
                    _total.text((_totalPrice - _productPrice) + ' €')

                    _message.text(_msg);
                    _cartId.text(_count);
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


    // set discount coupon and recalculate total price
    $('#discount-coupon').click(function(e) {
        e.preventDefault();
        e.stopPropagation();

        $('.coupon-input').show();

    })

    $('.submit-coupon').click(function(e) {
        e.preventDefault();
        e.stopPropagation();

        let coupon = $(this).siblings().val();

        let url = "<?= base_url('product/discountcoupon/') ?>" + coupon;
        console.log(url);

        $.ajax({
            url: url,
            success: function(response) {

                let _price = $('#total-price');
                let _totalPrice = "<?= $total ?>";

                _price.text(_totalPrice);

                response = $.parseJSON(response)

                if (response.status == 1) {

                    let _discountPrice = _totalPrice - response.discount;
                    _price.text(_discountPrice + ' €');
                }

            },
            error: function(xhr, ajaxOptions, thrownerror) {}
        });
    })
</script>