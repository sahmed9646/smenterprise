<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>


<?php
	class Cart{

		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addToCart($quantity, $id){
			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$productId = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();

			$query = "SELECT * FROM tbl_product WHERE productId='$productId' ";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result['productName'];
			$price = $result['price'];
			$image = $result['image'];

			$chkQuery = "SELECT * FROM tbl_cart WHERE productId='$productId' AND sId='$sId'";
			$getPro = $this->db->select($chkQuery);
			if ($getPro) {
				$msg = "product already added";
				return $msg;
			}else{
			$query = "INSERT INTO tbl_cart(sId, productId, productName, price, quantity, image) VALUES('$sId', '$productId', '$productName', '$price', '$quantity', '$image')";
			$inserted_row = $this->db->insert($query);

			if ($inserted_row) {
				header("Location:cart.php");
			}else{
				header("Location:404.php");
			}
		}
 		}
 		public function getCartProduct(){
 			$sId = session_id();
 			$query = "SELECT * FROM tbl_cart WHERE sId='$sId' ORDER BY cartId DESC ";
 			$result = $this->db->select($query);
 			return $result;
 		}
 		public function updateCartQuantity($quantity, $id){

			$cartId = mysqli_real_escape_string($this->db->link, $id);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$query = "UPDATE tbl_cart SET
				quantity = '$quantity'
				WHERE cartId = '$id' ";
				$updated_row = $this->db->update($query);
				if ($updated_row) {
					//$msg = "<span class='success'>quantity updated successfully</span>";
					//return $msg;
					header("Location:cart.php");
				}else{
					$msg = "<span class='error'>quantity not updated</span>";
				return $msg;
				}
 		}
 		public function deleteProductByCart($id){
 			$query = "DELETE FROM tbl_cart WHERE cartId = '$id'";
			$deletData = $this->db->delete($query);
			if ($deletData) {
				echo "<script>window.location = 'cart.php'</script>";

				}else{
					$msg = "<span class='error'>category not deleted</span>";
				return $msg;
				}
 		}
 		public function checkCartTable(){
 			$sId = session_id();
 			$query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
 			$result = $this->db->select($query);
 			return $result;
 		}
 		public function orderProduct($cmrId){
 			$sId = session_id();
 			$query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
 			$result = $this->db->select($query);
 			if ($result) {
 				while ($values = $result->fetch_assoc()) {
 					$productId = $values['productId'];
 					$productName = $values['productName'];
 					$quantity = $values['quantity'];
 					$price = $values['price'];
 					$image = $values['image'];

					$query = "INSERT INTO tbl_order(cmrId, productId, productName, price, quantity, image) VALUES('$cmrId', '$productId', '$productName', '$price', '$quantity', '$image')";
					$inserted_row = $this->db->insert($query); 					

 				}
 			}
 		}
 		public function paybleAmount($cmrId){
 			$query = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId' AND date = now()";
 			$result = $this->db->select($query);
 			return $result;
 		}
 		public function getOrderedProduct($cmrId){
 			$query = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId' ORDER BY date DESC";
 			$result = $this->db->select($query);
 			return $result;
 		}

 		public function checkOrderData($cmrId){
 			$query= "SELECT * from tbl_order where cmrId='$cmrId'";
 			$result = $this->db->select($query);
 			return $result;
 		}

 		public function getAllOrderProduct(){
 			$query= "SELECT * from tbl_order ORDER BY date DESC";
 			$result = $this->db->select($query);
 			return $result;
 		}

 		public function productShifted($id, $time, $price){
 			$id = mysqli_real_escape_string($this->db->link, $id);
 			$time = mysqli_real_escape_string($this->db->link, $time);
 			$price = mysqli_real_escape_string($this->db->link, $price);

			$query = "UPDATE tbl_order SET
				status = '1'
				WHERE cmrId = '$id' AND date='$time' AND price='$price' ";
				$updated_row = $this->db->update($query);
				if ($updated_row) {
					$msg = "<span class='success'>updated successfully</span>";
					return $msg;
					
				}else{
					$msg = "<span class='error'>not updated</span>";
				return $msg;
				}
 		}

 		public function deleteShiftedProduct($id, $time, $price){
 			$id = mysqli_real_escape_string($this->db->link, $id);
 			$time = mysqli_real_escape_string($this->db->link, $time);
 			$price = mysqli_real_escape_string($this->db->link, $price);

 			$query = "DELETE FROM tbl_order WHERE cmrId = '$id' AND date='$time' AND price='$price' ";

			$deletData = $this->db->delete($query);
			if ($deletData) {
					$msg = "<span class='success'>deleted successfully</span>";
				return $msg;
				}else{
					$msg = "<span class='error'> not deleted</span>";
				return $msg;
				}

 		}

 		public function productShiftConfirm($id, $time, $price){
 			$id = mysqli_real_escape_string($this->db->link, $id);
 			$time = mysqli_real_escape_string($this->db->link, $time);
 			$price = mysqli_real_escape_string($this->db->link, $price);

			$query = "UPDATE tbl_order SET
				status = '2'
				WHERE cmrId = '$id' AND date='$time' AND price='$price' ";
				$updated_row = $this->db->update($query);
				if ($updated_row) {
					$msg = "<span class='success'>updated successfully</span>";
					return $msg;
					
				}else{
					$msg = "<span class='error'>not updated</span>";
				return $msg;
				}
 		}
 		public function deleteShiftedProductBycustomer($id, $time, $price){
 			$id = mysqli_real_escape_string($this->db->link, $id);
 			$time = mysqli_real_escape_string($this->db->link, $time);
 			$price = mysqli_real_escape_string($this->db->link, $price);

 			$query = "DELETE FROM tbl_order WHERE cmrId = '$id' AND date='$time' AND price='$price' ";

			$deletData = $this->db->delete($query);
			if ($deletData) {
					$msg = "<span class='success'>deleted successfully</span>";
				return $msg;
				}else{
					$msg = "<span class='error'> not deleted</span>";
				return $msg;
				}

 		}
	}	
?>