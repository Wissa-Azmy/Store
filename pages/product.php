<?php
require "../scripts/db-connect.php";

class Product{

    var $id;
	var $productName;
	var $price;
    var $details;
    var $category;
    var $subcategory;
  
	public function __construct($id=-1) {
            global $db;
		if($id!=-1) { // To view only one product by id if it's sent with the constructor.
			$query = "SELECT * FROM product WHERE id=$id LIMIT 1";
			$result = $db->query($query);
			$product = mysqli_fetch_assoc($result);
            
            $this->productName = $product['name'];
			$this->price = $product['price'];
			$this->details = $product['details'];
			$this->category = $product['category'];
            $this->subcategory = $product['subcategory'];
		}

	}

	function insert() {
		$query = "INSERT INTO product VALUES(NULL,'$this->productName','$this->price','$this->details','$this->category','$this->subcategory',now())";
		$result  = mysqli_query(self::$connection,$query);
		return mysqli_insert_id(self::$connection);
	}

	function update() {
		$query = "UPDATE product SET product_name='$this->productName', price='$this->price', details='$this->details', category='$this->category', subcategory='$this->subcategory' where id=$this->id";
		mysqli_query(self::$connection,$query);
	}

	function delete() {
		$query = "DELETE FROM product WHERE id=$this->id";
		mysqli_query(self::$connection,$query);
	}

	function viewAll() {
		$query = "SELECT * FROM product";
		$result = mysqli_query(self::$connection,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}


}
?>