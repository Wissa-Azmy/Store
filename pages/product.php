<?php

class Product{

    var $id;
	var $productName;
	var $price;
    var $details;
    var $category;
    var $subcategory;
	var $photo;
    var $keywords;

	public function __construct($id=-1) {
        global $db;
		if($id!=-1) { // To view only one product by id if it's sent with the constructor.
			$query = "SELECT * FROM product WHERE id=$id LIMIT 1";
			$result = $db->query($query);
			$product = $db->fetch_assoc($result);
            
            $this->productName = $product['name'];
			$this->price = $product['price'];
			$this->details = $product['details'];
			$this->category = $product['category'];
            $this->subcategory = $product['subcategory'];
            $this->photo = $product['photo'];
            $this->keywords = $product['keywords'];
		}

	}

	function insert() {
        global $db;
        $query = "SELECT * FROM product WHERE product_name LIKE '$this->productName'";
        $sql = $db->query($query);

        $rows = $db->num_rows($sql);

        if($rows > 0){
//            echo json_encode("Invalid, You are trying to add a product that already exists.");
            exit();
        }else {
            $query = "INSERT INTO product VALUES(NULL,'$this->productName','$this->price','$this->details','$this->category','$this->subcategory',now(),'$this->photo','$this->keywords')";
            $db->query($query) or die("Error adding the Product");
            return $db->insert_id();
        }
	}

	function update() {
        global $db;
		$query = "UPDATE product SET product_name='$this->productName', price='$this->price', details='$this->details', category='$this->category', subcategory='$this->subcategory' where id=$this->id";
		$db->query($query);
	}

	function delete() {
        global $db;
		$query = "DELETE FROM product WHERE id=$this->id";
		$db->query($query);
	}

	static function viewAll() {
        global $db;
		$query = "SELECT * FROM product";
		$result = $db->query($query);
		$data = [];

		while($row = $db->fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

}

?>