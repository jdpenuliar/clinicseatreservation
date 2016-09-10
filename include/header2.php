<?php
session_start();
session_destroy();
session_start();

include("./include/php/class.php");
$hospital = new hospital;


if(isset($_POST['btn_login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
	$hospital->f_login($username, $password);
	
}

if(empty($_GET['error'])){
	$error =  "non";
}else{
	if($_GET['error'] == "500231"){
		$error =   "500231";	
	}	
	
}


?><html>
<head>
<meta charset="utf-8">
<title>Clinic Seat Reservation for St. Ferdinand Building</title>

<link type="text/css" rel="stylesheet"  href="./css/common.css" />
<link type="text/css" rel="stylesheet"  href="./css/nav_menu.css" />
<link type="text/css" rel="stylesheet"  href="./jqwidgets/styles/jqx.base.css" 		 />
<link type="text/css" rel="stylesheet"  href="./jqwidgets/styles/jqx.darkbluex.css"  />

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript"  src="./jquery/jquery-1.11.1.min.js"> </script>
<script type="text/javascript" src="./jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="./jqwidgets/jqxdata.js"></script> 
<script type="text/javascript" src="./jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="./jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="./jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="./jqwidgets/jqxdropdownlist.js"></script>
<script type="text/javascript" src="./jqwidgets/jqxtooltip.js"></script>
<script type="text/javascript" src="./jqwidgets/jqxdatatable.js"></script>
<script type="text/javascript" src="./jqwidgets/jqxexpander.js"></script>
<script type="text/javascript" src="./jqwidgets/jqxvalidator.js"></script> 

<script type="text/javascript" src="./jqwidgets/jqxwindow.js"></script>
<script type="text/javascript" src="./jqwidgets/jqxnumberinput.js"></script> 
<script type="text/javascript" src="./jqwidgets/jqxpasswordinput.js"></script> 
<script type="text/javascript" src="./jqwidgets/jqxinput.js"></script> 
<script type="text/javascript" src="./jqwidgets/jqxcalendar.js"></script>
<script type="text/javascript" src="./jqwidgets/jqxdatetimeinput.js"></script>
<script type="text/javascript" src="./jqwidgets/globalization/globalize.js"></script>
<script type="text/javascript" src="./jqwidgets/demos.js"></script>

<script type="application/javascript"  src="./jquery/navi.js"> </script>
<script type="application/javascript"  src="./jquery/ready.js"> </script>

</head>