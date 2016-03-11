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

        $adminUsr = "<tr class='row'></tr><td><img src='../images/$photo' class='img-responsive' width='200' height='200'> </td>";
        $adminUsr .= "<td>$id</td><td>$name</td>";
        $adminUsr .= "<td>$reg_date</td>";

        $adminUsr .= "<td>
             <button class='edit btn btn-primary btn-lg' value='$id'>Edit</button>
        </td>
        <td>
             <button class='delete btn btn-primary btn-lg' value='$id'>Delete</button>

        </td>
        </tr>";
        $adminList[]= $adminUsr;
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
        <a href="#inventoryForm" class="btn js-jumbo menu addBtn">+ Add User</a>

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
                    <?php foreach($adminList as $user){
                        echo $user;
                    } ?>
                </tbody>
            </table>
        </div>

        <a name="inventoryForm" id="inventoryForm"></a>

      <div id="message1" class="jumbotron flyover flyover-centered">
        <div class="">
            <form enctype="multipart/form-data" method="post" >
                <h2>User Details</h2>
                    <input type="text" name="userName" placeholder="User Name">
                    <br /><br />
                    <input type="text" name="password" placeholder="Password">
                    <br /><br />
                    <input type="email" name="email" placeholder="Email">
                    <br /><br />

                    <input type="file" name="photo" id="photo" />
                    <br />

                <br />

                <button type="submit" class="btn btn-primary">Add User</button><br />

            </form>
        </div>
        <br />
        <button class="btn btn-primary js-jumbo">Done</button>
      </div>


    </div>
</div>
<script>
$(function() {

   $('.js-jumbo').click(function() {
      $('#message1').toggleClass('in');
   });

});
</script>

</body>
</html>
