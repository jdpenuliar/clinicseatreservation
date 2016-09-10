<?php 
include("./include/php/class.php");

$hospital = new hospital;


//client
if(isset($_POST['btn_submit_client_sched'])){
	
	$hospital->DBConnect();
	$patient = $_POST['op_pid'];
	$doctor = $_POST['op_doctor'];
	$condition =  $_POST['op_condition'];
	$date = $_POST['op_year'] . "-" .  $_POST['op_month'] . "-" .  $_POST['op_day'] . " " .  $_POST['op_hour'] . ":" .  $_POST['op_minutes'] . ":00" ;
	$status = "Pending";
	$sql = "INSERT INTO `dbhospital`.`tbl_schedule` ( `patient_id`, `doctor_id`, `date`, `status`, `condition`) VALUES ( '$patient', '$doctor', '$date', '$status', '$condition');";
	//echo $sql = "INSERT INTO tbl_schedule(patient_id, doctor_id, date, status, condition) VALUES('$patient', '$doctor', '$date', '$status', '$condition')";
	mysql_query($sql);
	header("Location: ./dashboard.php");
	//INSERT INTO `dbhospital`.`tbl_schedule` (`id`, `patient_id`, `doctor_id`, `assistant_id`, `date`, `status`, `condition`) VALUES (NULL, '10001', '10001', '10001', '2015-01-28 00:00:00', 'sa', 'asd');
}


if(isset($_POST['btn_approve_dash_s'])){
	$hospital->DBConnect();
	$ass_id =  $_POST['approve_deny_ass_id'];
	$id 	=  $_POST['approve_deny_s'];
	$sql = "UPDATE tbl_schedule SET status='Reserved', assistant_id='$ass_id' WHERE id='$id'";
	mysql_query($sql);
	header("Location: ./dashboard.php");
}


if(isset($_POST['btn_deny_dash_s'])){
	$hospital->DBConnect();
	$ass_id =  $_POST['approve_deny_ass_id'];
	$id 	=  $_POST['approve_deny_s'];
	$sql = "UPDATE tbl_schedule SET status='Denied', assistant_id='$ass_id' WHERE id='$id'";
	mysql_query($sql);
	header("Location: ./dashboard.php");
}


if(isset($_POST['btn_create_doctor'])){
	$fname 		=  	$_POST['doctor_fname'];
	$mname 		= 	$_POST['doctor_mname'];
	$lname 		=  	$_POST['doctor_lname'];
	$dob		=	$_POST['doctor_dob'];
	$gender		=	$_POST['doctor_gender'];
	$contact 	= 	$_POST['doctor_contact'];
	$address	= 	$_POST['doctor_address'];
	$specialization = 	$_POST['doctor_specialization'];
	$dtimes		=	$_POST['doctor_times'];
	$dtimee 	= 	$_POST['doctor_timee'];
	$username 	= 	$_POST['doctor_username'];
	$password	=	$_POST['doctor_password'];
	$password2	=	$_POST['doctor_password2'];
	
	$wName = $fname . " " . $mname . ", " . $lname; 
	$user_id = "";
	
	$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
		
	$hash_password = hash('sha256', $password . $salt);
	for($round = 0; $round < 65536; $round++) 
	{ 
		$hash_password = hash('sha256', $hash_password . $salt); 
	}  
	
	$hospital->DBConnect();
	$password = $hash_password;
	$user_id = "";
	$sql1 = "SELECT * FROM user_tbl ORDER BY user_id ASC";
	$result = mysql_query($sql1);
	while($row=mysql_fetch_array($result)){  
		$user_id =  $row['user_id'];
	}
	$user_id = $user_id + 1;	
	$sql = "INSERT INTO user_tbl(user_id, username, password, salt, name, usertype, status) VALUES('$user_id', '$username','$hash_password','$salt','$wName','3','active')";
	mysql_query($sql);
	
	
	$sql2 = "INSERT INTO tbl_doctor(fname,mname,lname,address,birthdate,gender,contact_no,user_id) 
			VALUES('$fname', '$mname', '$lname', '$address', '$dob', '$gender', '$contact', '$user_id')";
	mysql_query($sql2);
	
header("Location: ./doctor_list.php");
}

if(isset($_POST['btn_create_ass'])){
	$fname 	=  	 $_POST['ass_fname'];
	$mname 	= 	 $_POST['ass_mname'];
	$lname 	=  	 $_POST['ass_lname'];
	$dob	=	 $_POST['ass_dob'];
	$gender		=	$_POST['ass_gender'];
	$contact 	= 	$_POST['ass_contact'];
	$address 	= 	$_POST['ass_add'];
	$doctor		=	$_POST['ass_doctor'];
	$username 	= 	$_POST['ass_username'];
	$password 	= 	$_POST['ass_password'];
	$password2 	= 	$_POST['ass_password2'];
	
	
	$wName = $fname . " " . $mname . ", " . $lname; 
	$user_id = "";
	
	$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
		
	$hash_password = hash('sha256', $password . $salt);
	for($round = 0; $round < 65536; $round++) 
	{ 
		$hash_password = hash('sha256', $hash_password . $salt); 
	}  
	
	$hospital->DBConnect();
	$password = $hash_password;
	$sql1 = "SELECT * FROM user_tbl ORDER BY user_id ASC";
	$result = mysql_query($sql1);
	while($row=mysql_fetch_array($result)){  
		$user_id =  $row['user_id'];
	}
	$user_id = $user_id + 1;	
	$sql = "INSERT INTO user_tbl(user_id, username, password, salt, name, usertype,status) VALUES('$user_id', '$username','$hash_password','$salt','$wName','2','active')";
	mysql_query($sql);
	
	$sql2 = "INSERT INTO tbl_assistant(fname,mname,lname,address,birthdate,gender,contact_no,user_id, doctor_id) 
			VALUES('$fname', '$mname', '$lname', '$address', '$dob', '$gender', '$contact', '$user_id','$doctor')";
	mysql_query($sql2);
	header("Location: ./assistant_list.php");
	
}
if(isset($_POST['btn_create_pat'])){
	$fname 	=  	 $_POST['pat_fname'];
	$mname 	= 	 $_POST['pat_mname'];
	$lname 	=  	 $_POST['pat_lname'];
	$dob	=	 $_POST['pat_dob'];
	$gender	=	 $_POST['pat_gender'];
	$contact = 	 $_POST['pat_contact'];
	$address = 	 $_POST['pat_add'];
	$username = $_POST['pat_username'];
	$password = $_POST['pat_password'];
	$password2 = $_POST['pat_password2'];
	$wName = $fname . " " . $mname . " " . $lname; 
	$user_id = "";
	
	$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
		
	$hash_password = hash('sha256', $password . $salt);
	for($round = 0; $round < 65536; $round++) 
	{ 
		$hash_password = hash('sha256', $hash_password . $salt); 
	}  
	
	$hospital->DBConnect();
	$password = $hash_password;
	$sql1 = "SELECT * FROM user_tbl ORDER BY user_id ASC";
	$result = mysql_query($sql1);
	while($row=mysql_fetch_array($result)){  
		$user_id =  $row['user_id'];
	}
	 $user_id = $user_id + 1;	
	$sql = "INSERT INTO user_tbl(user_id, username, password, salt, name, usertype, status) VALUES('$user_id', '$username','$hash_password','$salt','$wName','1','active')";
	mysql_query($sql);
	
	$sql2 = "INSERT INTO tbl_patient(fname,mname,lname,address,birthdate,gender,contact_no,user_id) 
			VALUES('$fname', '$mname', '$lname', '$address', '$dob', '$gender', '$contact', '$user_id')";
	mysql_query($sql2);
	header("Location: ./patient_list.php");
}
//doctor


?>