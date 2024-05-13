<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	
	/**
	 * doctor
	 */
	class doctor{
		

		public static function getAllSpecialisations(){

			global $conn;

			$str = "SELECT DISTINCT Specialisation FROM doctor";

			return $result = $conn->query($str);

		}

		public static function getAllDoctors(){

			global $conn;
			
			$str = "SELECT * FROM doctor";

			return $result = $conn->query($str);

		}

		public static function getDoctorInfo($id){
			global $conn;

			$str = "SELECT * FROM doctor WHERE = dID = '". $dID ."'";

			return $result = $conn->query($str);
		}

		public static function sheduleDoctor($data){
			global $conn;

			$newtime = date("H:i:s", strtotime($data['time']));

			$str = "INSERT INTO schedule (dID, day, time, RoomNo) VALUES ('" . $data['dID'] . "', '". $data['day'] ."', '". $newtime ."', '". $data['RoomNo'] ."')";

			$conn->query($str);

			return true;
		}

		public static function changeShDoctor($data){
			global $conn;

			$newtime = date("H:i:s", strtotime($data['time']));

			$str = "UPDATE schedule SET dID = '". $data['dID'] ."' WHERE day = '". $data['day'] ."' AND time = '". $newtime ."' AND RoomNo = '". $data['RoomNo'] ."'";

			$conn->query($str);

			return true;
		}

		
		public static function getSchedule($id){
			global $conn;

			$str = "SELECT * FROM schedule WHERE dID = '". $id ."'";

			return $conn->query($str);
		}
		

		public static function getAvailableSlots($date, $ScheduleID){
			global $conn;

			$str = "SELECT count(*) as count FROM appointment WHERE ScheduleID = '". $ScheduleID ."' AND Date = '". $date ."'";

			$result = $conn->query($str);

			while($row = $result->fetch_assoc()){
				return 12 - $row['count'];
			}
		}


	}

?>