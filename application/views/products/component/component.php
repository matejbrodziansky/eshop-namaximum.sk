<?php

function component($productname, $productprice, $productimg, $productid)
{
    $element = "
    <div class=\"col-md-3 colsm-6 my-3 my-md-0\">
        <form  method=\"post\">
            <div class=\"card shadow\">
            <div>
                <img src=\"" . base_url($productimg) . "\" alt=\"Image1\" class=\"img-fluid card-img-top\">
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">$productname</h5>
               <h6>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                </h6>
                <p class=\"card-text\">
                    Some quict example text to build on the card
                </p>
                <h5>
                 <small><s class=\"text-secondary\">599€</s></small>
                    <span class=\"price\">$productprice €</span>
                </h5>

                <button type=\"submit\"  class=\"btn btn-warning my-3\"  >Add to Cart <i class=\"fa fa-shopping-cart\"></i></button>
                <input type='hidden' name='product_id' value='$productid'>
            </div>
        </div>
    </form>
 </div>";

    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid)
{
    $element = "
    <div class=\"mt-3\">
         <form method=\"post\" class=\"cart-items\">
            <div class=\"border rounded\">
                <div class=\"row bg-white\">
                    <div class=\"col-md-3 pl-0\">
                        <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid\">
                    </div>
                    <div class=\"col-md-6\">
                        <h5 class=\"pt-2\">$productname</h5>
                        <small class=\"text-secondary\">Seller: namaximum</small>
                        <h5 class=\"pt-2\">$productprice €</h5>
                        <button type=\"submit\" class=\"btn btn-danger my-3\" name=\"remove\">Odobrať</button>
                    </div>
                    <div class=\"col-md-3 py-5\">
                        <div class=\"row\">
                            <div class=\"col-4\">
                                <button type=\"button\" class=\"btn bg-light border rounded-circle \"><i class=\"fa fa-minus\"></i></button>
                            </div>
                            <div class=\"col-3\">
                                <input type=\"text\" value=\"1\" class=\"form-control w-25 \">
                            </div>
                            <div class=\"col-4\">
                                <input type=\"hidden\" name=\"product_id\" value=\" $productid\" class=\"form-control w-25 \">
                            
                                <button type=\"button\" class=\"btn bg-light border rounded-circle \"><i class=\"fa fa-plus\"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </form>
    </div>
    ";

    echo $element;
}


// <button type=\"submit\" class=\" btn btn-warning my-3\">Uložiť na neskôr</button>
