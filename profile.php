<?php include("./include/header.php"); ?>

<body>
<?php include("./include/head.php"); ?>

<?php ;

$uname = $_SESSION['username'];
$type = "";
$type2 = "";
$userid	 	= $_SESSION['user_id'];
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
switch ($usertype){
	case "1"://client
		$type = "client/";
		$type2 = "Client";
		$hospital->DBConnect();
		$sql = "SELECT * FROM tbl_patient WHERE user_id='$userid'";
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
		}
		$name = $fname . " " . $mname . ", " . $lname;
		echo "
			<!-- profile client --->
            <section class='body_container page' id='profile_client_page'> 		
                <section class='inner_container'>
                    <div class='h_heading'><h1>Profile</h1></div>
                    <div class='h_spacer'>&nbsp;</div>
                    <div class='ic_inner'>
                        <div class='inner_head'>
                            <div class='ih_pic'><img src='./img/". $type.$img."' height='180' width='180' /></div>
                        </div>
                        <div class='inner_body'>
                            <h2>" . $name  . " </h2>
                            <div class='h_spacer_h'>&nbsp;</div>
                            <div class='p_add'><a>Address: $address</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><a>Mobile / Contact: $contact</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><a>Gender: $gender</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><a>Date of Birth: $dob</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><button>History</button> </div>
                        </div>
                    </div>
                </section>
            </section>
		";
	break;
	case "2"://staff
		$type = "staff/";
		$type2 = "Assistants";
		$hospital->DBConnect();
		$sql = "SELECT * FROM tbl_assistant WHERE user_id='$userid'";
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
		}
		$name = $fname . " " . $mname . ", " . $lname;
		echo "
			<!-- profile client --->
            <section class='body_container page' id='profile_client_page'> 		
                <section class='inner_container'>
                    <div class='h_heading'><h1>Profile</h1></div>
                    <div class='h_spacer'>&nbsp;</div>
                    <div class='ic_inner'>
                        <div class='inner_head'>
                            <div class='ih_pic'><img src='./img/". $type.$img."' height='180' width='180' /></div>
                        </div>
                        <div class='inner_body'>
                            <h2>" . $name  . " </h2>
                            <div class='h_spacer_h'>&nbsp;</div>
                            <div class='p_add'><a>Address: $address</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><a>Mobile / Contact: $contact</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><a>Gender: $gender</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><a>Date of Birth: $dob</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><button>History</button> </div>
                        </div>
                    </div>
                </section>
            </section>
		";
	break;
	case "3"://doctor
		$type = "doctor/";
		$type2 = "Doctors";
		$hospital->DBConnect();
		$sql = "SELECT * FROM tbl_doctor WHERE user_id='$userid'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){  
			$id = $row['id'];
			$fname = $row['fname'];
			$mname = $row['mname'];
			$lname = $row['lname'];
			$specialist = $row['specialist'];	
			$address = $row['address'];
			$gender = $row['gender'];
			$contact = $row['contact_no'];	
			$dob = $row['birthdate'];	
			$useridx = $row['user_id'];
			$img = $row['img'];
		}
		$name = $fname . " " . $mname . ", " . $lname;
		
		echo "
			<!-- profile client --->
            <section class='body_container page' id='profile_client_page'> 		
                <section class='inner_container'>
                    <div class='h_heading'><h1>Profile</h1></div>
                    <div class='h_spacer'>&nbsp;</div>
                    <div class='ic_inner'>
                        <div class='inner_head'>
                            <div class='ih_pic'><img src='./img/". $type.$img."' height='180' width='180' /></div>
                        </div>
                        <div class='inner_body'>
                            
                            <h2>" . $name  . " </h2>
                            <div class='h_spacer_h'>&nbsp;</div>
                            <div class='p_add'><a>Address: $address</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><a>Mobile / Contact: $contact</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><a>Gender: $gender</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><a>Date of Birth: $dob</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><a>Specialist: $specialist</a> </div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'><button>History</button> </div>
                        </div>
                    </div>
                </section>
            </section>
		";
		
	break;
	case "4"://admin
		$type = "admin/";
		$type2 = "Admin";
	break;
}
	
	

	

?>




   
    
<?php include("./include/footer.php"); ?>
</body>
</html>