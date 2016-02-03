<?php
/**
 * Created by PhpStorm.
 * User: wissa Azmy
 * Date: 1/25/16
 * Time: 2:20 PM
 */
require "../scripts/db-connect.php";

require 'session_validation.php';

require 'user.php';

/************** ERROR REPORTING. *******************/
error_reporting(E_ALL);  // set the php.ini config. file to dispaly all the errors
ini_set('error_display','1');

/************** VIEW PRODUCT LIST ******************/

$adminList = '';

$result = admin::viewAll();

if(!empty($result)){
    foreach($result as $admin){

        $id = $admin['id'];
        $admin_name= $admin['username'];
        $adminList .= "$id- $admin_name<br/>";
    }

}else{
    $adminList = "There are no details to be listed.";
}

/******************* ADD PRODUCT FORM PROCESSING ****************************/
if(isset($_POST['productName'])){

    $product = new product;

    $product->productName = $db->escape_string($_POST['productName']);
    $product->price = $db->escape_string($_POST['price']);
    $product->details = $db->escape_string($_POST['details']);
    $product->category = $db->escape_string($_POST['category']);
    $product->subcategory = $db->escape_string($_POST['subcategory']);

    $product->insert();
    header('location:inventory_list.php');
}
?>


<!DOCTYPE html>
<html>
<head>
    <link rel= "stylesheet" href="../styles/styles.css" type="text/css" />

    <title>Users</title>
</head>
<body>
<div align="right">
    <a href="admin_logout.php" rel="Log out" class="menu">Log out</a>
</div>
<div align="center" id="main">
    <a href="inventory_list.php" class="menu">Inventory</a>

    <a href="#inventoryForm" class="menu">+ Add User</a>

    <p>Admin Users: </p>
    <br/>
    <?php echo $adminList; ?>

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
