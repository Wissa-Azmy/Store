<?php
/**
 * Created by PhpStorm.
 * User: wissa Azmy
 * Date: 1/25/16
 * Time: 2:20 PM
 */
require "../scripts/db-connect.php";

require 'session_validation.php';


?>


<!DOCTYPE html>
<html>
<head>
    <link rel= "stylesheet" href="../styles/styles.css" type="text/css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Inventory</title>

</head>
<body>
<div class="container">

<div align="center" id="main">
    <?php
    $home = '';
    $inventory = 'class="active"';
    $users = '';
    include_once 'header.php'?>

    <a href="#inventoryForm" class="menu" id="addProductBtn">+ Add Products</a>

    <p>Inventory List: </p>
    <br/>
    <div class="table-responsive">
    <table class="table table-striped" id="table">
        <thead>
        <tr class="success">
            <th>Photo</th>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Details</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Date Added</th>
            <th>Keywords</th>
            <th>Quantity</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="result">
        </tbody>
    </table>
    </div>

    <a name="inventoryForm" id="inventoryForm"></a>
    <div class="form hidden" id="addProductForm">
        <form enctype="multipart/form-data">
            <h1>Product Details</h1>
                <input type="text" id="productName" name="productName" placeholder="Product Name">
                <br />
                <input type="text" id="price" name="price" placeholder="Price">
                <br /><br />
                <select id="category" name="category">
                    <option >-- Category --</option>
                    <optgroup label="iPhone">
                        <option value="1">iPhone 6 plus</option>
                        <option value="2">iPhone 6</option>
                        <option value="3">iPhone 5</option>
                    </optgroup>
                    <optgroup label="iPad">
                        <option value="1">iPad Pro</option>
                        <option value="2">iPad Air 2</option>
                        <option value="3">iPad Air</option>
                    </optgroup>
                    <optgroup label="MacBook">
                        <option value="1">MacBook Pro</option>
                        <option value="2">MacBook Air</option>
                        <option value="3">New MacBook</option>
                    </optgroup>
                </select>
                <select id="subcategory" name="subcategory">
                    <option >-- SubCategory --</option>
                    <optgroup label="iPhone">
                        <option value="1">iPhone 6 plus</option>
                        <option value="2">iPhone 6</option>
                        <option value="3">iPhone 5</option>
                    </optgroup>
                    <optgroup label="iPad">
                        <option value="1">iPad Pro</option>
                        <option value="2">iPad Air 2</option>
                        <option value="3">iPad Air</option>
                    </optgroup>
                    <optgroup label="MacBook">
                        <option value="1">MacBook Pro</option>
                        <option value="2">MacBook Air</option>
                        <option value="3">New MacBook</option>
                    </optgroup>
                </select>
                <input type="file" name="photo" id="photo" />
                <br />
                <input type="text" id="keywords" name="keywords" placeholder="Keywards" size="60" required>
                <textarea cols="10" rows="10" id="details" name="details" placeholder= "Enter product details and description here..."></textarea>
                <br />

            <br />

            <button id="submit" class="button">Add Product</button>
        </form>
    </div>

</div>
    </div>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../scripts/main.js"></script>
</body>
</html>
