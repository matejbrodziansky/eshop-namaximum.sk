<?php

function component($productname, $productprice, $productimg, $productid, $slug_two)
{
    $element = "
    <div class=\"col-md-3 colsm-6 my-3 my-md-0\">
        
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
                
                 <a class=\"btn btn-primary btn-sm add-to-cart\" href=\"" . base_url('product/addtocart/'.$productid.'') . "\">pridať do košíku</a>
                 <a class=\"btn btn-warning btn-sm \" href=\"" . base_url('product/details/'.$slug_two.'') . "\"> <i class=\"fa fa-search\"> Detaily</i></a>

            </div>
        </div>
    
 </div>";

    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid)
{
    $element = "
    <div class=\"mt-3 cart-product\">
            <div class=\"border rounded\">
                <div class=\"row bg-white\">
                    <div class=\"col-md-3 pl-0\">
                        <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid\">
                    </div>
                    <div class=\"col-md-6\">
                        <h5 class=\"pt-2\">$productname</h5>
                        <small class=\"text-secondary\">Seller: namaximum</small>
                        <h5 class=\"pt-2\">$productprice €</h5>
                        <a class=\"btn btn-danger btn-sm remove-from-cart\" href=\"" . base_url('product/removefromcart/'.$productid.'') . "\">Odobrať z košíku</a>                    </div>
                    <div class=\"col-md-3 py-5\">
                        <div class=\"row\">
                            <div class=\"col-4\">
                                <button type=\"button\" class=\"btn bg-light border rounded-circle \"><i class=\"fa fa-minus\"></i></button>
                            </div>
                            <div class=\"col-3\">
                            <input type=\"text\" value=\"1\" class=\"form-control w-25 \">
                            </div>
                            <div class=\"col-4\">
                                <button type=\"button\" class=\"btn bg-light border rounded-circle \"><i class=\"fa fa-plus\"></i></button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    ";

    echo $element;
}


// <button type=\"submit\" class=\" btn btn-warning my-3\">Uložiť na neskôr</button>
// <a class=\"btn btn-primary btn-sm\" href=\"" . base_url('/product/'.$productid.'') . "\">Detaily produktu</a>
// <button class=\"btn btn-primary \" formtarget=\"_blank\" formaction=\"". base_url('product/addtocart/'.$productid.'')."\">Pridať do košiku</button>