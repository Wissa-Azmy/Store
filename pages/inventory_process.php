<?php
/**
 * Created by PhpStorm.
 * User: wissaazmy
 * Date: 2/1/16
 * Time: 1:32 AM
 */

require "../scripts/db-connect.php";

require 'product.php';

/************** ERROR REPORTING. *******************/
error_reporting(E_ALL);  // set the php.ini config. file to dispaly all the errors
ini_set('error_display','1');

/************** VIEW PRODUCT LIST ******************/
function viewProducts(){
$productList = [];

$result = product::viewAll();

if(!empty($result)){
    foreach($result as $product){

        $id = $product['id'];
        $product_name= $product['product_name'];
        $price = $product['price'];
        $details = $product['details'];
        $category = $product['category'];
        $subcategory = $product['subcategory'];
        $dateAdded = $product['date_added'];
        $photo = $product['photo'];
        $keywords = $product['keywords'];

        $productItem = "<tr class='row'></tr><td><img src='../images/$photo' width='200' height='200'> </td>";
        $productItem .= "<td>$id</td><td>$product_name</td>";
        $productItem .= "<td>$price</td><td>$details</td><td>$category</td>";
        $productItem .= "<td>$subcategory</td><td>$dateAdded</td>";
        $productItem .= "<td>$keywords</td>";
        $productItem .= "<td>
             <button class='edit btn btn-primary btn-lg' value='$id'>Edit</button>
        </td>
        <td>
             <button class='delete btn btn-primary btn-lg' value='$id'>Delete</button>

        </td>
        </tr>";


        $productList[]= $productItem;
    }

}else{
    $productList[]= "There are no products in the inventory to be listed.";
}
    echo json_encode($productList);
}

/******************* ADD PRODUCT, FORM PROCESSING ****************************/
if(isset($_POST['productName'])){

    $product = new product;

    $product->productName = $db->escape_string($_POST['productName']);
    $product->price = $db->escape_string($_POST['price']);
    $product->details = $db->escape_string($_POST['details']);
    $product->category = $db->escape_string($_POST['category']);
    $product->subcategory = $db->escape_string($_POST['subcategory']);
    $product->keywords = $db->escape_string($_POST['keywords']);

    $product->photo = ($_FILES['photo']['name']);
//    echo "<pre>";
//    var_dump($_FILES['photo']);
//    echo "</pre>";
    $photo_tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($photo_tmp, "../images/$product->photo");

   // Form Validation Requiered in advance.
        $product->insert();
//        header('location:inventory_list.php');
}

/******************* DELETE PRODUCT ****************************/

if(isset($_REQUEST['id'])){
//    echo $_GET['id'] . " inside the Delete function";
    $id = $db->escape_string($_REQUEST['id']);
    $product = new product($id);
    $product->delete();
}
viewProducts();

/* BootStrap Create DropDown menu Button
 *   <!--div class='dropdown'>
                <button name = 'action' class='btn btn-primary btn-lg' data-toggle='dropdown' value='$id'>
                    Action <span class='caret'></span>
                </button>
                <ul class='dropdown-menu'>
                    <li><a href='#' id='edit' class='edit'>Edit</a></li>
                    <li><a href='#' class='delete'>Delete</a></li>
                </ul>
            </div-->
 */

?>

