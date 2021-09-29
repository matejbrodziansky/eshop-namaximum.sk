<?php


// pre_r($product);

?>


<div class="container text-center">


    <?php foreach ($product as $product) : ?>
        <div class="container text-center">
            <div style="background-color: #fff;" class="col-4 mb-3">
                <h4><?= $product['name'] ?></h4>
                <img width="300" height="300" src="https://greenmedical.bwcdn.net/media/2019/08/1/4/wpc-80-cfm-natural-1301-size-frontend-medium-v-1.webp" alt="">
                <div class="row mt-3">
                    <div class="col">
                        <p><?= $product['price'] ?> €</p>

                    </div>
                    <div class="col">
                        <a class="btn btn-warning" href="<?= base_url('kategoria/products/' . $product['id'] . '') ?>">DETAIL<i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>





</body>

</html>