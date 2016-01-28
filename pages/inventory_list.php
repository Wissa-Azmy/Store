<?php
/**
 * Created by PhpStorm.
 * User: wissa Azmy
 * Date: 1/25/16
 * Time: 2:20 PM
 */
require 'session_validation.php';

/************** ERROR REPORTING. *******************/
error_reporting(E_ALL);  // set the php.ini config. file to dispaly all the errors
ini_set('error_display','1');

/************** VIEW PRODUCT LIST ******************/

$productList = '';

$query = "SELECT * FROM product";

$sql = mysqli_query($connection,$query);
$productCount = mysqli_num_rows($sql);


if($productCount > 0){

//    while($product = mysqli_fetch_assoc($sql)){
//        $id = $product['id'];
//        $product_name= $product['product_name'];
//        $productList .= "$id- $product_name<br/>";
//    }

    foreach($sql as $product){
//        $products = mysqli_fetch_assoc($product);   // Not affective ???????!!!!!

        $id = $product['id'];
        $product_name= $product['product_name'];
        $productList .= "$id- $product_name<br/>";
    }

}else{
    $productList = "There are no products in the inventory to be listed.";
}

/******************* PRODUCT FORM PROCESSING ****************************/
if(isset($_POST['productName'])){
    $product_name = mysqli_real_escape_string($connection, $_POST['productName']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $subcategory = mysqli_real_escape_string($connection, $_POST['subcategory']);
    $details = mysqli_real_escape_string($connection, $_POST['details']);

    $query = "SELECT * FROM product WHERE product_name = '$product_name'";
    $sql = mysqli_query($connection, $query);

    $rows = mysqli_num_rows($sql);

    if($rows > 0){
        echo "Invalid, You are trying to add a product that already exists.";
        exit();
    }else{
        $query = "INSERT INTO product VALUES(null,'$product_name','$price','$details','$category','$subcategory',now())";
        $sql = mysqli_query($connection, $query) or die("Error adding the Product");
        header('location:inventory_list.php');
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <link rel= "stylesheet" href="../styles/styles.css" type="text/css" />

    <title>Inventory</title>
</head>
<body>
<div align="center" id="main">
    <a href="#inventoryForm" class="menu">+ Add Products</a>

    <p>Inventory List: </p>
    <br/>
    <?php echo $productList; ?>

    <a name="inventoryForm" id="inventoryForm"></a>
    <div class="form">
        <form enctype="multipart/form-data" method="post" >
            <h1>Product Details</h1>
                <legend><span class="number">+</span> Product Info</legend>
                <input type="text" name="productName" placeholder="Product Name">
                <br />
                <input type="text" name="price" placeholder="Price">
                <br /><br />
                <select name="category">
                    <option >-- Category --</option>
                    <optgroup label="iPhone">
                        <option value="OS">iPhone 6 plus</option>
                        <option value="EL">iPhone 6</option>
                        <option value="SD">iPhone 5</option>
                    </optgroup>
                    <optgroup label="iPad">
                        <option value="OS">iPad Pro</option>
                        <option value="EL">iPad Air 2</option>
                        <option value="SD">iPad Air</option>
                    </optgroup>
                    <optgroup label="MacBook">
                        <option value="OS">MacBook Pro</option>
                        <option value="EL">MacBook Air</option>
                        <option value="SD">New MacBook</option>
                    </optgroup>
                </select>
                <select name="subcategory">
                    <option >-- SubCategory --</option>
                    <optgroup label="iPhone">
                        <option value="OS">iPhone 6 plus</option>
                        <option value="EL">iPhone 6</option>
                        <option value="SD">iPhone 5</option>
                    </optgroup>
                    <optgroup label="iPad">
                        <option value="OS">iPad Pro</option>
                        <option value="EL">iPad Air 2</option>
                        <option value="SD">iPad Air</option>
                    </optgroup>
                    <optgroup label="MacBook">
                        <option value="OS">MacBook Pro</option>
                        <option value="EL">MacBook Air</option>
                        <option value="SD">New MacBook</option>
                    </optgroup>
                </select>
                <input type="file" name="photo" id="photo" />
                <br />
                <textarea cols="10" rows="10" name="details" placeholder= "Enter product details and description here..."></textarea>
                <br />

            <br />

            <button type="submit" class="button">Add Product</button>
        </form>
    </div>


</div>
</body>
</html>
