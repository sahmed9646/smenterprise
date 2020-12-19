<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>


<?php
	class Customer{

		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function coustomerRegistration($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$city = mysqli_real_escape_string($this->db->link, $data['city']);
			$country = mysqli_real_escape_string($this->db->link, $data['country']);
			$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
			

			if ($name=="" || $address=="" || $city=="" || $country=="" || $zip=="" || $phone=="" || $email=="" || $pass=="" ) {
				$msg = "<span class='error'>Fields must not be empty</span>";
				return $msg;
			}

			$mailQuery = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
			$mailChk = $this->db->select($mailQuery);
			if ($mailChk != false) {
				$msg = "<span class='error'>Email Already Exists !!</span>";
				return $msg;
			}else{
				$query = "INSERT INTO tbl_customer(name, address, city, country, zip, phone
					, email, pass) VALUES('$name', '$address', '$city', '$country', '$zip', '$phone', '$email', '$pass')";
				$inserted_row = $this->db->insert($query);
				if ($inserted_row) {
					$msg = "<span class='success'>You Are Successfully Inserted Data</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>You Are Not Inserted Data</span>";
					return $msg;
				}
			}
		}

		public function coustomerLogin($data){
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));

			if (empty($email) || empty($pass)) {
				$msg = "<span class='error'>Fields must not be empty</span>";
				return $msg;
			}else{
				$query = "SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass'";
				$result=$this->db->select($query);
				if ($result) {
					$value = $result->fetch_assoc();
					Session::set("cmrlogin",true);
					Session::set("cmrid",$value['id']);
					Session::set("cmrname",$value['name']);
					
				 	header("Location: cart.php");

				}else{
					$msg = "<span class='error'>Email And Password Not Matched</span>";
					return $msg;
				}
			}

		}
		public function deleteCartData(){
			$sId = session_id();
			$query = "DELETE FROM tbl_cart WHERE sId='$sId' ";
			$this->db->delete($query);
		}
		public function getCustomerData($id){
			$query = "SELECT * FROM tbl_customer WHERE id='$id'";
 			$result = $this->db->select($query);
 			return $result;
		}
		public function customerUpdate($cmrId, $data){

			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$city = mysqli_real_escape_string($this->db->link, $data['city']);
			$country = mysqli_real_escape_string($this->db->link, $data['country']);
			$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
		
			

			if ($name=="" || $address=="" || $city=="" || $country=="" || $zip=="" || $phone=="" || $email=="") {
				$msg = "<span class='error'>Fields must not be empty</span>";
				return $msg;
			}else{
				$query = "UPDATE tbl_customer SET
				
							name = '$name',
							address = '$address',
							city = '$city',
							country = '$country',
							zip = '$zip',
							phone = '$phone',
							email = '$email'
							WHERE id='$cmrId'";
				$updated_row = $this->db->update($query);
				if ($updated_row) {
					$msg = "<span class='success'>You Are Successfully Updated Data</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>You Are Not Updated Data</span>";
					return $msg;
				}
			}
		}
		
}
?>