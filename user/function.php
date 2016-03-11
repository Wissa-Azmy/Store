
<?php
include "db-connect.php"; 
?>

<?php 




function total_price()
{}

// num of items 
function total_items()
{


 if(isset($_GET['add_cart']))
 {




 $ip = $_SERVER['REMOTE_ADDR']; 

 $get_items = "select * from cart where ip_add='$ip'"; 
 $run_items = mysqli_query($conn , $get_items); 
 $count_items = mysqli_num_rows($run_items);  

 }

 else 
 {



 $ip = $_SERVER['REMOTE_ADDR']; 

 $get_items = "select * from cart where ip_add='$ip'"; 
 $run_items = mysqli_query($conn , $get_items); 
 $count_items = mysqli_num_rows($run_items);  




 }

echo  $count_items; 
}





function cart()
{


if(isset($_GET['add_cart']))
{

$pro_id= $_GET['add_cart']; 
$checked_pro= "select * from cart where p_id='$pro_id' "; 
$run_check = mysqli_query($conn , $checked_pro);

if(mysqli_num_rows($run_check) > 0 )
{


    echo ""; 
} 
else 
{
    
    $ip = $_SERVER['REMOTE_ADDR'];

     $insert_cart = "insert into cart(p_id , ip_add) values('$pro_id' , '$ip') "; 
     $run_cart = mysqli_query($conn , $insert_cart);


}





}




}

// Categories 
function getCats()
{


$get_cats ="select * from category"; 
$run_cats = mysqli_query($conn , $get_cats);

while($row_cats=mysqli_fetch_array($run_cats))
{
	$cat_id=$row_cats['cat_id'];
	$cat_title=$row_cats['cat_title'];

	echo "<li> <a href='index.php?cat=$cat_id'>$cat_title</a> </li>";

}




}


// Brands Here 
function getBrands()
{


$get_brands ="select * from subcategory"; 
$run_brands = mysqli_query($conn , $get_brands);

while($row_brands=mysqli_fetch_array($run_brands))
{
	$brand_id=$row_brands['brand_id'];
	$brand_title=$row_brands['brand_title'];

	echo "<li> <a href='index.php?brand=$brand_id'>$brand_title</a> </li>";

}




}


// Categories Options 

// Categories 
function getCatsOptions()
{


$get_cats ="select * from category"; 
$run_cats = mysqli_query($conn , $get_cats);

while($row_cats=mysqli_fetch_array($run_cats))
{
	$cat_id=$row_cats['cat_id'];
	$cat_title=$row_cats['cat_title'];

	echo "<Option value='$cat_id'>$cat_title</Option>";

}




}



// Brands Options
function getBrandsOptions()
{

 
$get_brands ="select * from subcategory"; 
$run_brands = mysqli_query($conn , $get_brands);

while($row_brands=mysqli_fetch_array($run_brands))
{
	$brand_id=$row_brands['brand_id'];
	$brand_title=$row_brands['brand_title'];

	echo "<Option value='$brand_id'> $brand_title</Option>";

}



}


// Get Products from DB 

function getPro()
{

   // if(!isset($_GET['cat']))
    //{
     //if(!isset($_GET['brand']))
     //{


	$get_pro="select * from product"; // order by RAND()

    $run_pro=mysqli_query($conn , $get_pro); 
    #var_dump($run_pro); 

    while($row_pro=mysqli_fetch_array($run_pro))
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
                        <a href='single-product.php' class='le-button'>add to cart</a>
                    </div>
                    <div class='wish-compare'>
                        <a class='btn-add-to-wishlist' href='#'>add to wishlist</a>
                        <a class='btn-add-to-compare' href='#'>compare</a>
                    </div>
                </div>
            </div>
        </div><!-- /.carousel-item -->";







    }

   } 



//}

  //}




// category related to  product 

function getCatPro()
{

    if(isset($_GET['cat']))
    {

     $cat_id=$_GET['cat'];

 
    $get_cat_pro="select * from product where product_cat='$cat_id'";

    $run_cat_pro=mysqli_query($conn , $get_cat_pro); 
    #var_dump($run_pro); 

    $count_cats = mysqli_num_rows($run_cat_pro); 


        if($count_cats == 0)
        {

            echo "<h2>There is No Categories </h2>";
        

        }

    while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
    {

        $pro_id=$row_cat_pro['product_id'];
        $pro_cat=$row_cat_pro['product_cat'];
        $pro_brand=$row_cat_pro['product_brand'];
        $pro_title=$row_cat_pro['product_title'];
        $pro_price=$row_cat_pro['product_price']; 
        $pro_image=$row_cat_pro['product_image'];



   
        
        echo "<div id='single_product' > 
        <p ><b> $ $pro_title </b></p>
        <img src='admin_area/product_images/$pro_image' width='200' height='200' >
        <p ><b> $ $pro_price </b></p>
        <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
        <a href='index.php?add_cart=$pro_id'> <input style='float:right' type='button' value='Add To Cart'></a>
        
        </div>"; 




    }

   } 



}







// brand related to  product 

function getBrandPro()
{

    if(isset($_GET['brand']))
    {

     $cat_brand=$_GET['brand'];


    $get_brand_pro="select * from products where product_brand='$cat_brand'";

    $run_brand_pro=mysqli_query($conn , $get_brand_pro); 
    #var_dump($run_pro); 

    $count_brands = mysqli_num_rows($run_brand_pro); 


        if($count_brands == 0)
        {

            echo "<h2>There is No Brands </h2>";
        

        }

    while($row_brand_pro=mysqli_fetch_array($run_brand_pro))
    {

        $pro_id=$row_brand_pro['product_id'];
        $pro_cat=$row_brand_pro['product_cat'];
        $pro_brand=$row_brand_pro['product_brand'];
        $pro_title=$row_brand_pro['product_title'];
        $pro_price=$row_brand_pro['product_price']; 
        $pro_image=$row_brand_pro['product_image'];





    }

   } 



}






//search for product 


function searchPro()
{

  global $db; 
 if(isset($_GET['user_query']))
 {
  
   
    $searchedProducts= $_GET['user_query']; 
    $get_pro="select * from product where  product_title like '$searchedProducts' ";
     require_once "repeat.php"; 


 }

else if(isset($_GET['searchAll']))
 {
   
    $searchedProducts= $_GET['searchAll']; 
    $get_pro="select * from product where  product_title like '$searchedProducts' ";
     require_once "repeat.php"; 


 }

 else if(isset($_GET['searchProduct']))
 {
   
    $searchedProducts= $_GET['searchProduct']; 
    $get_pro="select * from product  where  product_title like '$searchedProducts' ";
     require_once "repeat.php"; 


 }

  else if(isset($_GET['searchPrice']))
 {
   
    $searchedProducts= $_GET['searchPrice']; 
    $get_pro="select * from product where  product_price like '$searchedProducts' ";
     require_once "repeat.php"; 


 }





}






session_start(); 


function getSinglePro()
{
  global $db; 


    /*


    $run_pro=$db->query($get_pro); 
    #var_dump($run_pro); 

    while($row_pro=$db->fetch_assoc($run_pro))


    */

    

    if(isset($_GET['add_cart']))
    {

        

     $pro_id=$_GET['add_cart'];


    

 
    $get_single_pro="select * from product where product_id='$pro_id'";

    $run_single_pro=$db->query($get_single_pro); 
    #var_dump($run_pro); 

    while($row_single_pro=$db->fetch_assoc($run_single_pro))
    {

        $pro_id=$row_single_pro['product_id'];
        $pro_cat=$row_single_pro['product_cat'];
        $pro_brand=$row_single_pro['product_brand'];
        $pro_title=$row_single_pro['product_title'];
        $pro_price=$row_single_pro['product_price']; 
        $pro_image=$row_single_pro['product_image'];





  echo "<div class='no-margin col-xs-12 col-sm-7 body-holder'>
    <div class='body'>
        <div class='star-holder inline'><div class='star' data-score='4'></div></div>
        <div class='availability'><label>Availability:</label><span class='available'>  in stock</span></div>

        <div class='title'><a href='#''> $pro_title </a></div>
        <div class='brand'>sony</div>

        <div class='social-row'>
            <span class='st_facebook_hcount'></span>
            <span class='st_twitter_hcount'></span>
            <span class='st_pinterest_hcount'></span>
        </div>

        <div class='buttons-holder'>
            <a class='btn-add-to-wishlist' href='#'>add to wishlist</a>
            <a class='btn-add-to-compare' href='#''>add to compare list</a>
        </div>

        <div class='excerpt'>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare turpis non risus semper dapibus. Quisque eu vehicula turpis. Donec sodales lacinia eros, sit amet auctor tellus volutpat non.</p>
        </div>
        
        <div class='prices'>
            <div class='price-current'> $$pro_price </div>
            <div class='price-prev'>$2199.00</div>
        </div>

        <div class='qnt-holder'>
            <div class='le-quantity'>
                <form>
                    <a class='minus' href='#reduce'></a>
                    <input name='quantity' readonly='readonly' type='text' value='1' />
                    <a class='plus' href='#add'></a>
                </form>
            </div>
            <a id='addto-cart' href='cart.php?add_cart=$pro_id' class='le-button huge'>add to cart</a>
        </div><!-- /.qnt-holder -->
    </div><!-- /.body -->

</div><!-- /.body-holder -->";  


    }

   }
}



function getCartPro()
{
  global $db; 
  //$_SESSION['cart']= array();

    if(isset($_GET['add_cart']))
    {

     $pro_id=$_GET['add_cart'];

     if(!in_array($pro_id, $_SESSION['cart'])) 
        array_push($_SESSION['cart'], $pro_id);
    

     $htmltext =''; 
  
    
    $get_single_pro="select * from product where product_id in(";
    $i=0;
    foreach($_SESSION['cart'] as $key => $value) {

          //if( $_SESSION['cart']   )

        if($i != count($_SESSION['cart'])-1)
            $get_single_pro .= $value.","; 
        else
            $get_single_pro .= $value; 

        //echo $value; 
            $i++;
          } 
    echo $get_single_pro .= ")";  

    $run_single_pro=$db->query($get_single_pro); 
    #var_dump($run_pro); 

    while($row_single_pro=$db->fetch_assoc($run_single_pro))
    {

        $pro_id=$row_single_pro['product_id'];
        $pro_cat=$row_single_pro['product_cat'];
        $pro_brand=$row_single_pro['product_brand'];
        $pro_title=$row_single_pro['product_title'];
        $pro_price=$row_single_pro['product_price']; 
        $pro_image=$row_single_pro['product_image'];


$htmltext .= " <div class='row no-margin cart-item'>
                <div class='col-xs-12 col-sm-2 no-margin'>
                    <a href='#' class='thumb-holder'>
                        <img class='lazy' alt='' src='http://placehold.it/73x73' />
                    </a>
                </div>

                <div class='col-xs-12 col-sm-5 '>
                    <div class='title'>
                        <a href='#'>$pro_title</a>
                    </div>
                    <div class='brand'>sony</div>
                </div> 

                <div class='col-xs-12 col-sm-3 no-margin'>
                    <div class='quantity'>
                        <div class='le-quantity'>
                            <form>
                                <a class='minus' href='#reduce'></a>
                                <input name='quantity' readonly='readonly' type='text' value='1' />
                                <a class='plus' href='#add'></a>
                            </form>
                        </div>
                    </div>
                </div> 

                <div class='col-xs-12 col-sm-2 no-margin'>
                    <div class='price'>
                        $$pro_price
                    </div>
                    <a class='close-btn' href='#'></a>
                </div>
            </div>";


    }
  

     echo $htmltext;

   }

 


}
















?>