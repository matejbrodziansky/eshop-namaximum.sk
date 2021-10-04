
<div class="container  my-4">
    <div class="card shadow ml-4">
        <div class="row">

            <div class="col">
                <div>
                    <img src="<?= base_url($product_details['product_image']) ?>" alt="Image1" class="imgg-fluid card-img-ttop">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $product_details['product_name'] ?></h5>
                    <h6>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </h6>
                    <p class="card-text">
                        Some quict example text to build on the card
                    </p>
                    <h5>
                        <?php if (isset($product_details['product_old_price']) && !empty($product_details['product_old_price'])) : ?>
                            <small><s class="text-secondary"><?= $product_details['product_old_price'] ?>€</s></small>
                        <?php endif ?>
                        <span class="price"><?= $product_details['product_price'] ?> €</span>
                    </h5>
                </div>
            </div>

            <div class="col mt-4">
                <p>
                    <?= $product_details['details']['text'] ?>
                </p>
                <a class="btn btn-primary btn-sm add-to-cart" href=" <?= base_url('product/addtocart/' . $product_details['id']) ?>  ">pridať do košíku</a>
            </div>
        </div>
    </div>
</div>

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