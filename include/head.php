<header class="head">
<?php 

if(!empty($_SESSION['usertype'])){
	$usertype = $_SESSION['usertype'];
}else{
	header("Location: ./login.php");	
}




switch($usertype){
	case "1" ://client
		echo " <ul class='nav' id='nav'>
						<li >				<a href='index.php'>Home</a></li>
						<li >				<a href='profile.php'>Profile</a></li>
						<li >				<a href='./dashboard.php'>Dashboard</a></li>
						<li >	<a>Doctors</a>			
								<ul><li><a href='./doctor_list.php'>List of Doctors</a></li></ul>
						</li>
						<li >	<a>Assistants</a>			
								<ul><li><a href='./assistant_list.php'>List of Assistants</a></li></ul>
						</li>
						<li ><a>Patients</a>			
							<ul>
								<li><a href='./patient_list.php'>List of Patients</a></li>
								<li><a href='./new_client.php'>Register Patient</a></li>
							</ul>
						</li>
						<li >				<a href='./about.php'>About Us</a></li>
						<li >				<a href='./contact.php'>Contact Us</a></li>
						<li >				<a href='./login.php'>Logout</a></li>
				</ul>";
	
	
	break;	
	case "2" ://staff
		echo " <ul class='nav' id='nav'>
						<li >				<a href='index.php'>Home</a></li>
						<li >				<a href='profile.php'>Profile</a></li>
						<li >				<a href='./dashboard.php'>Dashboard</a></li>
						<li ><a>Doctors</a>			
							<ul>
								<li><a href='./doctor_list.php'>List of Doctors</a></li>
								<li><a href='./new_doctor.php'>Register Doctor</a></li>
							</ul>
						</li>
						<li >	<a>Assistants</a>			
								<ul><li><a href='./assistant_list.php'>List of Assistants</a></li></ul>
						</li>
						<li ><a>Patients</a>			
							<ul>
								<li><a href='./patient_list.php'>List of Patients</a></li>
								<li><a href='./new_client.php'>Register Patient</a></li>
							</ul>
						</li>
						<li >				<a href='./about.php'>About Us</a></li>
						<li >				<a href='./contact.php'>Contact Us</a></li>
						<li >				<a href='./login.php'>Logout</a></li>
				</ul>";
	
	
	break;	
	case "3" ://doctor
		echo " <ul class='nav' id='nav'>
						<li >				<a href='index.php'>Home</a></li>
						<li >				<a href='profile.php'>Profile</a></li>
						<li >				<a href='./dashboard.php'>Dashboard</a></li>
						
						<li >	<a>Doctors</a>			
								<ul><li><a href='./doctor_list.php'>List of Doctors</a></li></ul>
						</li>
						<li >	<a>Assistants</a>			
								<ul><li><a href='./assistant_list.php'>List of Assistants</a></li></ul>
						</li>
						<li >	<a>Patients</a>			
							<ul>
								<li><a href='./patient_list.php'>List of Patients</a></li>
								<li><a href='./new_client.php'>Register Patient</a></li>
							</ul>
						</li>
						<li >				<a href='./about.php'>About Us</a></li>
						<li >				<a href='./contact.php'>Contact Us</a></li>
						<li >				<a href='./login.php'>Logout</a></li>
				</ul>";
	
	
	break;	
	case "4" ://admin
		echo " <ul class='nav' id='nav'>
						<li >				<a href='index.php'>Home</a></li>
						<li >				<a href='profile.php'>Profile</a></li>
						<li >				<a href='./dashboard.php'>Dashboard</a></li>
						<li >	<a>Doctors</a>			
							<ul>
								<li><a href='./doctor_list.php'>List of Doctors</a></li>
								<li><a href='./new_doctor.php'>Register Doctor</a></li>
							</ul>
						</li>
						<li >	<a>Assistants</a>			
							<ul>
								<li><a href='./assistant_list.php'>List of Assistants</a></li>
								<li><a href='./new_assistant.php'>Register Assistant</a></li>
							</ul>
						</li>
						<li >	<a>Patients</a>			
							<ul>
								<li><a href='./patient_list.php'>List of Patients</a></li>
								<li><a href='./new_client.php'>Register Patient</a></li>
							</ul>
						</li>
						<li >	<a>Admins</a>			
							<ul>
								<li><a href='./new_admin.php'>Register Admin</a></li>
							</ul>
						</li>
						<li >				<a href='./about.php'>About Us</a></li>
						<li >				<a href='./contact.php'>Contact Us</a></li>
						<li >				<a href='./login.php'>Logout</a></li>
				</ul>";
	break;	
	
}

?>

   
</header>