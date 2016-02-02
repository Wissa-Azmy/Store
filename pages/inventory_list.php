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

    <title>Inventory</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</head>
<body>
<div align="right">
    <a href="admin_logout.php" class="menu">Log out</a>
</div>
<div align="center" id="main">
    <a href="#inventoryForm" class="menu">+ Add Products</a>

    <p>Inventory List: </p>
    <br/>

    <table class="table table-striped" id="table">
        <thead>
        <tr class="success">
            <th>Photo</th>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Details</th>
            <th>Category</th>
            <th>SubCategory</th>
            <th>Date Added</th>
            <th>Keywords</th>
            <th></th>
            <th></th>


        </tr>
        </thead>
        <tbody id="result">
        </tbody>
    </table>


    <a name="inventoryForm" id="inventoryForm"></a>
    <div class="form">
        <form action="inventory_process.php" enctype="multipart/form-data" method="post" >
            <h1>Product Details</h1>
                <input type="text" id="productName" name="productName" placeholder="Product Name">
                <br />
                <input type="text" id="price" name="price" placeholder="Price">
                <br /><br />
                <select id="category" name="category">
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
                <select id="subcategory" name="subcategory">
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
                <input type="text" id="keywords" name="keywords" placeholder="Keywards" size="60" required>
                <textarea cols="10" rows="10" id="details" name="details" placeholder= "Enter product details and description here..."></textarea>
                <br />

            <br />

            <button type="submit" id="submit" class="button">Add Product</button>
        </form>
    </div>
    <form action="../pages/inventory_process.php"

</div>
<script src="../scripts/main.js"></script>
</body>
</html>
