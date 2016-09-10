<?php

class hospital{
	public $_passwordFromDB;
	public $_saltFromDB;
	public $_salt;
	public $_hash_password;
	
	public function DBConnect(){
		$username 	=	"root";
		$password 	= 	""; 
		//$password 	= 	""; 
		$host 		=	"localhost";
		$database	=	"dbhospital";
		
		$DBConnection = mysql_connect("$host","$username","$password");
		$DBSelect = mysql_select_db($database, $DBConnection);
		if(!$DBSelect){
			die("Database selection failed: " . mysql_error());
		}
		return $DBConnection;
	}	
	
	public function f_login($username, $password) {
		$username_result ="";
		$password_result = "";
		if($username == ""){ $username = ""; }
		if($password == ""){ $password = ""; }
		
		
		$this->DBConnect();
		$varpword 	= "";
		$dateToday 	= 	date('Y') . "-" . date('m')  . "-" . date('d'). " " . date('h')  . ":" . date('i'). ":" . date('s');
		
		$username_result = mysql_num_rows(mysql_query("SELECT * FROM user_tbl WHERE username='$username'" ))? 1 : 0;
		
		if($username_result == "1"){
			$result = mysql_query("SELECT * FROM user_tbl WHERE username='$username'");
			while($row=mysql_fetch_array($result)){  
				$this->_passwordFromDB 	= $row['password']; 
				$this->_saltFromDB 		= $row['salt']; 
				$userid 		= $row['user_id']; 
			}	
			
			$this->_salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
			$this->_hash_password = hash('sha256', $password . $this->_saltFromDB);
			for($round = 0; $round < 65536; $round++){ 
				$this->_hash_password = hash('sha256', $this->_hash_password . $this->_saltFromDB); 
			}  
			
			$password_result = "";
			if($this->_passwordFromDB == $this->_hash_password){
				$password_result = "1";
			}elseif($this->_passwordFromDB != $this->_hash_password){
				$password_result = "0";
			}
			
			$_SESSION['user_id'] = $userid ;
			$_SESSION['username'] = $username;
			$_SESSION['usertype'] = $this->CheckLevel($username);
		}
	
		if($username_result == "1"  and $password_result == "1"){
			header("Location: ./index.php");
		}else {
			header("Location: ./login.php?error=500231");
		}
		
		
	}
	
	public function CheckPassword($data){
		$result = mysql_query("SELECT * FROM user_tbl WHERE username='$data'");
		while($row=mysql_fetch_array($result)){  
			$this->_passwordFromDB 	= $row['password']; 
			$this->_saltFromDB 		= $row['salt']; 
		}	
	}
	
	public function CheckUsername($data){
		$username_result = mysql_query("SELECT * FROM user_tbl WHERE username='$data'" );
		return mysql_num_rows($username_result)? 1 : 0;	
	}
	
	public function CheckLevel($data){
		$usertype = "";
		$result = mysql_query("SELECT * FROM user_tbl WHERE username='$data'" );
		while($row=mysql_fetch_array($result)){  
			$usertype =  $row['usertype'];
		}
		return $usertype;
	}
	
	public function ass_list_prof($idx){
		$this->DBConnect();
		
		$uname = "";
		$type = "";
		$type2 = "";
		$userid	 	= "";
		$id 		= "";
		$fname 		= "";
		$mname 		= "";
		$lname 		= "";
		$specialist = "";	
		$address 	= "";
		$gender 	= "";
		$contact 	= "";
		$dob		= "";	
		$useridx 	= "";
		$img 		= "";
		$sql = "SELECT * FROM tbl_assistant WHERE user_id='$idx'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){  
			$id = $row['id'];
			$fname = $row['fname'];
			$mname = $row['mname'];
			$lname = $row['lname'];
			$address = $row['address'];
			$gender = $row['gender'];
			$contact = $row['contact_no'];	
			$dob = $row['birthdate'];	
			$useridx = $row['user_id'];
			$img = $row['img'];
			$name = $fname . " " . $mname . ", " . $lname;
			
		}
		$arex[] = array(
			'id' 			=> $id,
			'name' 			=> $name,
			'address' 		=> $address,
			'gender' 		=> $gender,
			'contact' 		=> $contact,
			'dob' 			=> $dob,
			'useridx' 		=> $useridx,
			'img' 			=> $img
		);
		
		echo json_encode($arex);
		
	}
	
	public function pat_list_prof($idx){
		$this->DBConnect();
		
		$uname = "";
		$type = "";
		$type2 = "";
		$userid	 	= "";
		$id 		= "";
		$fname 		= "";
		$mname 		= "";
		$lname 		= "";
		$specialist = "";	
		$address 	= "";
		$gender 	= "";
		$contact 	= "";
		$dob		= "";	
		$useridx 	= "";
		$img 		= "";
		$sql = "SELECT * FROM tbl_patient WHERE user_id='$idx'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){  
			$id = $row['id'];
			$fname = $row['fname'];
			$mname = $row['mname'];
			$lname = $row['lname'];
			$address = $row['address'];
			$gender = $row['gender'];
			$contact = $row['contact_no'];	
			$dob = $row['birthdate'];	
			$useridx = $row['user_id'];
			$img = $row['img'];
			$name = $fname . " " . $mname . ", " . $lname;
			
		}
		$arex[] = array(
			'id' 			=> $id,
			'name' 			=> $name,
			'address' 		=> $address,
			'gender' 		=> $gender,
			'contact' 		=> $contact,
			'dob' 			=> $dob,
			'useridx' 		=> $useridx,
			'img' 			=> $img
		);
		
		echo json_encode($arex);
		
	}
	
	public function doc_list_prof($idx){
		$this->DBConnect();
		
		$uname = "";
		$type = "";
		$type2 = "";
		$userid	 	= "";
		$id 		= "";
		$fname 		= "";
		$mname 		= "";
		$lname 		= "";
		$specialist = "";	
		$address 	= "";
		$gender 	= "";
		$contact 	= "";
		$dob		= "";	
		$useridx 	= "";
		$img 		= "";
		$sql = "SELECT * FROM tbl_doctor WHERE user_id='$idx'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){  
			$id = $row['id'];
			$fname = $row['fname'];
			$mname = $row['mname'];
			$lname = $row['lname'];
			$address = $row['address'];
			$gender = $row['gender'];
			$specialist = $row['specialist'];
			$contact = $row['contact_no'];	
			$dob = $row['birthdate'];	
			$useridx = $row['user_id'];
			$img = $row['img'];
			$name = $fname . " " . $mname . ", " . $lname;
			
		}
		$arex[] = array(
			'id' 			=> $id,
			'name' 			=> $name,
			'address' 		=> $address,
			'gender' 		=> $gender,
			'specialist' 	=> $specialist,
			'contact' 		=> $contact,
			'dob' 			=> $dob,
			'useridx' 		=> $useridx,
			'img' 			=> $img
		);
		
		echo json_encode($arex);
		
	}
	
	
	public function delete_user($id){
		$this->DBConnect();
		$sql = "UPDATE user_tbl SET status='inactive' WHERE user_id='$id'";
		mysql_query($sql);
		echo "good";		
	}
	
	public function count_sched($id){
		$this->DBConnect();
		$user_id = "";
		$sql2 = "SELECT * FROM tbl_doctor WHERE user_id='$id'";
		$result2 = mysql_query($sql2);
		while($row2 = mysql_fetch_array($result2)){  
			$user_id = $row2['id'];
		}
		
		$sql = "SELECT * FROM tbl_schedule WHERE doctor_id='$user_id'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){  
			$arex[] = array(
			'id' 			=> $row['id'],
			'date' 			=>  date('F-d-Y H:i', strtotime($row['date'])),
			'status'		=> $row['status'],
			'condition'		=> $row['condition']
			);
			
		}
		echo json_encode($arex);
	}
	
	public function hist_pat($id){
		$this->DBConnect();
		$user_id = "";
		$sql2 = "SELECT * FROM tbl_patient WHERE user_id='$id'";
		$result2 = mysql_query($sql2);
		while($row2 = mysql_fetch_array($result2)){  
			$user_id = $row2['id'];
		}
		
		$sql = "SELECT * FROM tbl_schedule WHERE patient_id='$user_id'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){  
			$arex[] = array(
			'id' 			=> $row['id'],
			'date' 			=>  date('F-d-Y H:i', strtotime($row['date'])),
			'status'		=> $row['status'],
			'condition'		=> $row['condition']
			);
			
		}
		echo json_encode($arex);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}







?>