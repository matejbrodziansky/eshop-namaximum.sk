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
            component($product['product_name'], $product['product_price'], $product['product_image'], $product['id']);
        }
        ?>
    </div>
</div>

</body>

</html>