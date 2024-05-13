<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	
	class staff{
		public static function login($data){

			global $conn;

			$str = "SELECT * FROM staff WHERE Username = '". $data['Username'] ."' AND Password = '". md5($data['Password']) ."'";
			
			$result = $conn->query($str);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					$_SESSION['staffdata'] = $row;
					break;
				}
				return "FOUND";
			}
			else{
				return "NOTFOUND";
			}

		}
		public static function logout(){
			session_destroy();
			return "DONE";
		}
	}

?>