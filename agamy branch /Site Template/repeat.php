<?php 


    $run_pro=$db->query($get_pro); 
    #var_dump($run_pro); 

    while($row_pro=$db->fetch_assoc($run_pro))
    {

        $pro_id=$row_pro['product_id'];
        $pro_cat=$row_pro['product_cat'];
        $pro_brand=$row_pro['product_brand'];
        $pro_title=$row_pro['product_title'];
        $pro_price=$row_pro['product_price']; 
        $pro_image=$row_pro['product_image'];



   echo " <div class='no-margin carousel-item product-item-holder hover size-medium'>
            <div class='product-item'>
                <div class='ribbon red'><span>sale</span></div> 
                <div class='image'>
                    <img alt='' src='assets/images/blank.gif' data-echo='assets/images/products/product-11.jpg' />
                </div>
                <div class='body'>
                    <div class='title'>
                        <a href='single-product.php'> $pro_title </a>
                    </div>
                    <div class='brand'>  $pro_brand </div>
                </div>
                <div class='prices'>
                    <div class='price-current text-right'> $pro_price </div>
                </div>
                <div class='hover-area'>
                    <div class='add-cart-button'>
                        <a href='single-product.php?add_cart=$pro_id' class='le-button'>add to cart</a>
                    </div>
                    <div class='wish-compare'>
                        <a class='btn-add-to-wishlist' href='#'>add to wishlist</a>
                        <a class='btn-add-to-compare' href='#'>compare</a>
                    </div>
                </div>
            </div>
        </div>";

    }


?> 