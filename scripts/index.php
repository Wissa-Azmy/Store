<?php

require "db-connect.php";

echo "<br />";

echo "Is this working?<br/>";

if(isset($db)) {echo 'True';} else { echo 'False';} 

echo "<br />";
//var_dump($db);
echo "<br />";

// $sql = "INSERT INTO product VALUES(null, 'Apple Keyboard','300','Silver Metal', 'Accessories', 'Apple', now())";
// $result = $db->query($sql);

// echo $id = $db->insert_id();

$sql = "SELECT * FROM product";
$last = $db->query($sql);
$foundProduct = $db->fetch_assoc($last);

echo $foundProduct['product_name']." ".$foundProduct['price'];

?>