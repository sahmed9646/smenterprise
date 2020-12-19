<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php 
class Admin{
		
		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
        }

        public function clientInsert($data){

			$clientName = mysqli_real_escape_string($this->db->link, $data['name']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$date = mysqli_real_escape_string($this->db->link, $data['date']);
			$services = $data['services'];
			

			if ($clientName=="") {
				echo "Fields must not be empty";
			}elseif(empty($services)){
				echo "please select at least one services";
			}else{
				$query = "INSERT INTO tbl_cred(name, email, date, services) VALUES('$clientName','$email','$date','$services')";
				$inserted_row = $this->db->insert($query);
				if ($inserted_row) {
					$msg = "<span class='success'>Client inserted successfully</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>Client not inserted</span>";
					return $msg;
				}
				
			}
		}
    }       