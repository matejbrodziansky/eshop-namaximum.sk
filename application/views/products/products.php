<?php


//start session
// session_start();

?>

<?php

require_once('component/component.php')
?>


<div class="container">
    <div class="row text-center py-5">
        <?php
        foreach ($products as $product) {
            component($product['product_name'], $product['product_price'], $product['product_image'], $product['id'], $product['slug_two']);
        }
        ?>
    </div>
</div>

<div class="modal"></div>


<script>
    // add to cart and set count of produtcts in cart

    $('.add-to-cart').click(function(e) {
        e.preventDefault();
        e.stopPropagation();

        _alert = $('.alert');
        _message = $('.msg');

        var _selfVal = $(this).attr('href'),
            _cartId = $('#cart_count'),
            _count = parseInt(_cartId.text()),
            _count = _count + 1;

        $.ajax({
            url: _selfVal,
            success: function(response) {

                response = $.parseJSON(response)
                if (response.status == 1) {

                    _msg = 'Produkt už je v košíku';
                    _message.text(_msg);
                    _alert.show().addClass('alert-danger');
                };

                if (response.status == 2) {
                    _msg = 'Produkt bol vložený do košíku';
                    _alert.show().addClass('alert-success');

                    _cartId.text(_count);
                    _message.text(_msg);
                }

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