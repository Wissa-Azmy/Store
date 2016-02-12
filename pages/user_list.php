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
        $name= $admin['username'];
        $photo = $admin['photo'];
        $reg_date = $admin['registration_date'];

        $adminList = "<tr class='row'></tr><td><img src='../images/$photo' class='img-responsive' width='200' height='200'> </td>";
        $adminList .= "<td>$id</td><td>$name</td>";
        $adminList .= "<td>$reg_date</td>";

        $adminList .= "<td>
             <button class='edit btn btn-primary btn-lg' value='$id'>Edit</button>
        </td>
        <td>
             <button class='delete btn btn-primary btn-lg' value='$id'>Delete</button>

        </td>
        </tr>";
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

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

    <div align="center" id="main">
        <?php
        $home = '';
        $inventory = '';
        $users = 'class="active"';
        include_once 'header.php'
        ?>
        <a href="#inventoryForm" class="menu">+ Add User</a>

        <p>Admin Users: </p>
        <br/>
        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                <tr class="success">
                    <th>Photo</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Registration Date</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="result">
                    <?php echo $adminList; ?>
                </tbody>
            </table>
        </div>


        <a name="inventoryForm" id="inventoryForm"></a>
        <div class="form">
            <form enctype="multipart/form-data" method="post" >
                <h1>User Details</h1>
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

                <button type="submit" class="button">Add User</button>
            </form>
        </div>


    </div>
</div>
</body>
</html>
