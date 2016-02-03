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
	var $qty;

	public function __construct($id=-1) {
        global $db;
		if($id!=-1) { // To view only one product by id if it's sent with the constructor.
			$query = "SELECT * FROM product WHERE p_id=$id LIMIT 1";

			$result = $db->query($query);
			$product = $db->fetch_assoc($result);

            $this->id = $product['p_id'];
            $this->productName = $product['p_title'];
			$this->price = $product['p_price'];
			$this->details = $product['p_desc'];
			$this->category = $product['cat_id'];
            $this->subcategory = $product['brand_id'];
            $this->photo = $product['p_img'];
            $this->keywords = $product['p_keywords'];
			$this->qty = $product['p_qty'];
		}

	}

	function insert() {
        global $db;
        $query = "SELECT * FROM product WHERE p_title LIKE '$this->productName'";
        $sql = $db->query($query);

        $rows = $db->num_rows($sql);

        if($rows > 0){
//            echo json_encode("Invalid, You are trying to add a product that already exists.");
            exit();
        }else {
            $query = "INSERT INTO product VALUES(NULL,'$this->category','$this->subcategory','$this->productName','$this->price','$this->details','$this->photo','$this->keywords',now(),'$this->qty')";
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
		$query = "DELETE FROM product WHERE p_id=$this->id";
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