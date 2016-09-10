<?php include("./include/header.php"); ?>

<body>
<?php include("./include/head.php"); ?>

<?php 
$uname = $_SESSION['username'];
$type = "";
$type2 = "";
$userid	 	= $_SESSION['user_id'];
switch ($usertype){
	case "1"://client
		$type = "client/";
		$type2 = "Client";
		$hospital->DBConnect();
		$sqlz = "SELECT * FROM tbl_patient WHERE user_id='$userid'";
		$resultz = mysql_query($sqlz);
		while($rowz = mysql_fetch_array($resultz)){ 
			$pIDz = $rowz['id'];
		}
		echo "
				<section class='body_container page' id='dashboard_client_page'>
				<section class='inner_container'>
					<div class='h_heading'><h1>Dashboard:$type2</h1></div>
					<div class='d_menu'>
						<form method='POST' action='./get.php' name='form_d_submit' >
						<div class='d_menuQ1'>
							<input type='hidden' value='$pIDz' name='op_pid'/>
							<select class='create_elem5' name='op_month' id='' >
								<option >Month</option>
								";for($mm=0; $mm<=11; $mm++){echo "<option value='$month2[$mm]'>$month[$mm]</option>";}
					echo	"</select>
							<select class='create_elem5'  name='op_day' id='' >
								<option >Day</option>
							";	for($d=1; $d<=31; $d++){echo "<option value='$d'>$d</option>";}
					echo	"</select>
							<select class='create_elem5'  name='op_year' id='' >
								<option >Year</option>
							";	for($y=2014; $y<=2018; $y++){echo "<option value='$y'>$y</option>";}
					echo	"</select>
						</div>
						<div class='d_menuQ2'>
							<select class='create_elem5' name='op_doctor' id='' >
								<option >Doctor</option>
								";
								$sqlx = "SELECT * FROM tbl_doctor ORDER BY lname ASC";
								$resultx = mysql_query($sqlx);
								while($rowx = mysql_fetch_array($resultx)){ 
									echo "<option value='" . $rowx['id'] . "'>" . $rowx['fname'] . " " . $rowx['mname'] . ", " . $rowx['lname'] . "</option>";
								}
								echo"
							</select>
							<input type='text' placeholder='Condition'  name='op_condition' id='' class='create_elem6' />
						</div>
						<div class='d_menuQ3'>
							<select class='create_elem5' name='op_hour' id='' >
								<option >Hour</option>
							";	for($h=1; $h<=12; $h++){echo "<option value='$h'>$h</option>";}
					echo	"</select>
							<select class='create_elem5' name='op_minutes' id='' >
								<option >Minutes</option>
							";	for($m=0; $m<=60; $m = $m + 5){echo "<option value='$m'>$m</option>";}
					echo	"</select>
							<select class='create_elem5' name='op_time' id='' >
								<option >A.M.</option>
								<option >P.M.</option>
							</select>
						</div>
						<div class='d_menuQ4'>
							<input type='submit' value='Post / Schedule'  class='create_elem7'  name='btn_submit_client_sched'   />
						</div>
						</form> 
					</div>
					<div class='client_scheduling'>
						<div>
							<table id='tbl_sched_client'>
								<thead class='tsc_rh'>
									<tr>
									<th id='tsc_r1h'>#</th>
									<th id='tsc_r2h'>Name</th>
									<th id='tsc_r3h'>Date</th>
									<th id='tsc_r4h'>Condition</th>
									<th id='tsc_r5h'>Doctor</th>
									<th id='tsc_r6h'>Status</th>
									<th id='tsc_r7h'></th>
									</tr>
								<thead>
			";
									
									$colorL = "";
									$loopX = 1;
									$cname = "";
									$dname = "";
									$pIDx = "";
									$sqlx = "SELECT * FROM tbl_patient WHERE user_id='$userid'";
									$resultx = mysql_query($sqlx);
									while($rowx = mysql_fetch_array($resultx)){ 
										$pIDx = $rowx['id'];
									}
									
									$sql = "SELECT * FROM tbl_schedule WHERE patient_id='$pIDx'";
									$result = mysql_query($sql);
									
									while($row = mysql_fetch_array($result)){
										 
										$id  = $row['id']; 
										$pid = $row['patient_id'];
										$did = $row['doctor_id'];
										$aid = $row['assistant_id'];
										$datax = $row['date'];
										$status = $row['status'];
										$condition = $row['condition'];
										
										$sql2 = "SELECT * FROM tbl_patient WHERE id='$pid'";
										$result2 = mysql_query($sql2);
										while($row2 = mysql_fetch_array($result2)){ 
											$cname = $row2['fname'] . ' ' . $row2['mname'] . ', ' . $row2['lname'];
										}
										
										$sql3 = "SELECT * FROM tbl_doctor WHERE id='$did'";
										$result3 = mysql_query($sql3);
										while($row3 = mysql_fetch_array($result3)){ 
											$dname = $row3['fname'] . ' ' . $row3['mname'] . ', ' . $row3['lname'];
										}
										
										if($loopX % 2 == '0'){ $colorL = 'tsc_rb1';
										}else{ $colorL = 'tsc_rb2'; }
										echo "
											<tr class='$colorL'>
												<td id='tsc_r1'>$loopX</td>
												<td id='tsc_r2'>$cname</td>
												<td id='tsc_r3'>$datax</td>
												<td id='tsc_r4'>$condition</td>
												<td id='tsc_r5'>$dname</td>
												<td id='tsc_r6'>$status</td>
												<td id='tsc_r7'>
													<button name='btn_edit_dash'  value='$id'>Edit</button>
													<button name='btn_cancel_dash' value='$id'>Cancel</button>
												</td>
											</tr>
										";
										$loopX = $loopX + 1;
									}
		echo "						
							</table>
						</div>
					</div>
				</section>
			</section> 
		
		
		";
	break;
	case "2"://staff
		$type = "staff/";
		$type2 = "Assistants";
		echo "
				<section class='body_container page' id='dashboard_client_page'>
				<section class='inner_container'>
					<div class='h_heading'><h1>Dashboard:$type2</h1></div>
					<div class='client_scheduling'>
						<div>
							<table id='tbl_sched_client'>
								<thead class='tsc_rh'>
									<tr>
									<th id='tsc_r1h'>#</th>
									<th id='tsc_r2h'>Name</th>
									<th id='tsc_r3h'>Date</th>
									<th id='tsc_r4h'>Condition</th>
									<th id='tsc_r5h'>Doctor</th>
									<th id='tsc_r6h'>Status</th>
									<th id='tsc_r7h'></th>
									</tr>
								<thead>
			";
									$hospital->DBConnect();
									$colorL = "";
									$loopX = 1;
									$cname = "";
									$dname = "";
									$pIDx = "";
									$sqlx = "SELECT * FROM tbl_assistant WHERE user_id='$userid'";
									$resultx = mysql_query($sqlx);
									while($rowx = mysql_fetch_array($resultx)){ 
										$pIDx = $rowx['id'];
									}
									// WHERE assistant_id='$pIDx'
									$sql = "SELECT * FROM tbl_schedule";
									$result = mysql_query($sql);
									
									while($row = mysql_fetch_array($result)){ 
										$id  = $row['id']; 
										$pid = $row['patient_id'];
										$did = $row['doctor_id'];
										$aid = $row['assistant_id'];
										$datax = $row['date'];
										$status = $row['status'];
										$condition = $row['condition'];
										
										$sql2 = "SELECT * FROM tbl_patient WHERE id='$pid'";
										$result2 = mysql_query($sql2);
										while($row2 = mysql_fetch_array($result2)){ 
											$cname = $row2['fname'] . ' ' . $row2['mname'] . ', ' . $row2['lname'];
										}
										
										$sql3 = "SELECT * FROM tbl_doctor WHERE id='$pid'";
										$result3 = mysql_query($sql3);
										while($row3 = mysql_fetch_array($result3)){ 
											$dname = $row3['fname'] . ' ' . $row3['mname'] . ', ' . $row3['lname'];
										}
										
										if($loopX % 2 == '0'){ $colorL = 'tsc_rb1';
										}else{ $colorL = 'tsc_rb2'; }
										echo "
											<tr class='$colorL'>
												<td id='tsc_r1'>$loopX</td>
												<td id='tsc_r2'>$cname</td>
												<td id='tsc_r3'>$datax</td>
												<td id='tsc_r4'>$condition</td>
												<td id='tsc_r5'>$dname</td>
												<td id='tsc_r6'>$status</td>
												<td id='tsc_r7'>
												<form action='get.php' method='post'> 
													<input type='hidden' name='approve_deny_ass_id' value='$pIDx'/>
													<input type='hidden' name='approve_deny_s' value='$id'/>
													<input type='submit' name='btn_approve_dash_s'   value='Accept'/>
													<input type='submit' name='btn_deny_dash_s' 	 value='Deny'/>
												</form>
												</td>
											</tr>
										";
										$loopX = $loopX + 1;
									}
		echo "						
							</table>
						</div>
					</div>
				</section>
			</section> 
		
		
		";
	break;
	case "3"://doctor
		$type = "doctor/";
		$type2 = "Doctors";
		echo "
				<section class='body_container page' id='dashboard_client_page'>
				<section class='inner_container'>
					<div class='h_heading'><h1>Dashboard:$type2</h1></div>
					<div class='client_scheduling'>
						<div>
							<table id='tbl_sched_client'>
								<thead class='tsc_rh'>
									<tr>
									<th id='tsc_r1h'>#</th>
									<th id='tsc_r2h'>Name</th>
									<th id='tsc_r3h'>Date</th>
									<th id='tsc_r4h'>Condition</th>
									<th id='tsc_r5h'>Doctor</th>
									<th id='tsc_r6h'>Status</th>
									</tr>
								<thead>
			";
									$hospital->DBConnect();
									$colorL = "";
									$loopX = 1;
									$cname = "";
									$dname = "";
									$pIDx = "";
									$sqlx = "SELECT * FROM tbl_doctor WHERE user_id='$userid'";
									$resultx = mysql_query($sqlx);
									while($rowx = mysql_fetch_array($resultx)){ 
										$pIDx = $rowx['id'];
									}
									//WHERE doctor_id='$pIDx'
									$sql = "SELECT * FROM tbl_schedule";
									$result = mysql_query($sql);
									
									while($row = mysql_fetch_array($result)){ 
										$id  = $row['id']; 
										$pid = $row['patient_id'];
										$did = $row['doctor_id'];
										$aid = $row['assistant_id'];
										$datax = $row['date'];
										$status = $row['status'];
										$condition = $row['condition'];
										
										$sql2 = "SELECT * FROM tbl_patient WHERE id='$pid'";
										$result2 = mysql_query($sql2);
										while($row2 = mysql_fetch_array($result2)){ 
											$cname = $row2['fname'] . ' ' . $row2['mname'] . ', ' . $row2['lname'];
										}
										
										$sql3 = "SELECT * FROM tbl_doctor WHERE id='$pid'";
										$result3 = mysql_query($sql3);
										while($row3 = mysql_fetch_array($result3)){ 
											$dname = $row3['fname'] . ' ' . $row3['mname'] . ', ' . $row3['lname'];
										}
										
										if($loopX % 2 == '0'){ $colorL = 'tsc_rb1';
										}else{ $colorL = 'tsc_rb2'; }
										echo "
											<tr class='$colorL'>
												<td id='tsc_r1'>$loopX</td>
												<td id='tsc_r2'>$cname</td>
												<td id='tsc_r3'>$datax</td>
												<td id='tsc_r4'>$condition</td>
												<td id='tsc_r5'>$dname</td>
												<td id='tsc_r6'>$status</td>
												
											</tr>
										";
										/*<button name='btn_approve_dash'  value='$id'>Accept</button>
													<button name='btn_deny_dash' value='$id'>Deny</button>*/
										$loopX = $loopX + 1;
									}
		echo "						
							</table>
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