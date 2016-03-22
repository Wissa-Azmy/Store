<!DOCTYPE html>
<?php

include '../functions/functions.php';

?>
<html>
<head>
	<title>Insert Products </title>
	 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>

<form action="insert_product.php" method="post" enctype="multipart/form-data" >
<table border="2px" cellpadding="6px" style="background-color:#f2f2f2; width:750px; border-collapse: collapse;" >

<tr>
<td colspan="2" align="center"><h2> Inser Products Here </h2> </td>
</tr>

<tr>
<td align="right"> Product Title </td>
<td>  <input type="text" name="product_title" size="60" required>  </td>
</tr><!-- End Title Row -->

<tr>
<td align="right"> Product Category </td>
	<td> 
	<select name="product_cat">
	<option> Select Category </option>
	<?php getCatsOptions(); ?> 
    </select>
    </td>

</tr> <!-- End Category Row -->

<tr>
<td align="right"> Product Brand </td>

	<td> 
	<select name="product_brand">
	<option> Select Brand </option>
	<?php getBrandsOptions(); ?> 
    </select>
    </td>




</tr><!-- End Brand Row -->



<tr>
<td align="right"> Product Image </td>
<td>  <input type="file" name="product_image" required>  </td>
</tr>

<tr>
<td align="right"> Product Price </td>
<td>  <input type="text" name="product_price" required>  </td>
</tr>

<tr>
<td align="right"> Product Description </td>
<td>  <textarea cols="20" rows="8" name="product_desc">  </textarea>  </td>
</tr>

<tr>
<td align="right"> Product Keywords </td>
<td>  <input type="text" name="product_keywords" size="60" required>  </td>
</tr>

<tr>
<td colspan="2">  <input type="submit" name="insert_post" value="Insert Product Now ">  </td>
</tr>






</table>




</form>
</body>
</html>

<?php 
echo "<pre>".print_r($_POST)."</pre>"; 

if(isset($_POST['insert_post']))
{

$product_title =  $_POST['product_title']; 
$product_cat =    $_POST['product_cat'];
$product_price =  $_POST['product_price'];
$product_brand=   $_POST['product_brand'];
$product_desc=    $_POST['product_desc'];
$product_keywords=$_POST['product_keywords'];


$product_image= $_FILES['product_image']['name']; 
$product_image_tmp =$_FILES['product_image']['tmp_name']; 

move_uploaded_file($product_image_tmp, "../images/$product_image");


$query="insert into products(product_title , product_image , product_keywords , product_brand , product_price , product_cat) values('$product_title' , '$product_image' , '$product_keywords' , '$product_brand' , '$product_price' , '$product_cat')";

mysqli_query($conn , $query);



}


?>