<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	
	class patient
	{
		public static function login($data){

			global $conn;

			$str = "SELECT * FROM patient WHERE Username = '". 
            $data['Username'] ."' AND Password = '". 
			md5($data['Password']) ."'";
			
			$result = $conn->query($str);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					$_SESSION['userdata'] = $row;
					break;
				}
				return "FOUND";
			}
			else{
				return "NOTFOUND";
			}

		}

		public static function register($data){

			global $conn;

			$str = "INSERT INTO patient (FName, LName, DOB, Gender, Address, 
			Username, Password) VALUES ('". $data['FName'] ."' ,'". $data['LName'] .
			"','". $data['DOB'] ."','". $data['Gender'] ."','". $data['Address'] 
			."','". $data['Username'] ."','". md5($data['Password']) ."')";
		
			
			$result = $conn->query($str);

			if($result){
				return "DONE";
			}else{
				return "NON";
			}
		}

		public static function logout(){
			session_destroy();
			return "DONE";
		}

		public static function getAllAppointments(){
			global $conn;

			$str = "SELECT appointment.*, patient.FName, patient.LName, patient.Gender, schedule.day, schedule.RoomNo, doctor.*  FROM appointment INNER JOIN patient ON appointment.pID = patient.pID INNER JOIN schedule ON appointment.ScheduleID = schedule.ScheduleID INNER JOIN doctor ON schedule.dID = doctor.dID";

			return $result = $conn->query($str);
		}
		
		public static function makeAppointment($data){
			global $conn;

			$str = "SELECT time FROM schedule WHERE ScheduleID = '".$data['ScheduleID']."'";

			$time = "";

			$result = $conn->query($str);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					$time = $row['time'];
					break;
				}
			}

			$addMin = (12 - doctor::getAvailableSlots($data['Date'], $data['ScheduleID'])) * 10;

			$dt = Datetime::createFromFormat('H:i:s', $time); // create today 10 o'clock
			$dt->add(new DateInterval('PT'.$addMin.'M'));

			$time = $dt->format('H:i:s');
			

			$str = "INSERT INTO appointment (Date, time, ScheduleID, pID) VALUES ('". $data['Date'] ."', '". $time ."', '". $data['ScheduleID'] ."', '". $_SESSION['userdata']['pID'] ."')";

			$conn->query($str);

			return true;
		}
	}

?>