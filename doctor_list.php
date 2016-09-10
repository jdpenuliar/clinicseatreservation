<?php include("./include/header.php"); ?>

<body>
<?php include("./include/head.php"); ?>
<div class="hide_sched_doc">
	<div class="hide_sched_doc_head"><a>&nbsp;Schedule</a> <button class="btn_close_hs_doc">X</button></div>
    <div class="sched_doctorx" id="sched_doctorx">
    	
    
    </div>
    
</div>

<div class="hide_profile_doc">
	<div class="hide_profile_doc_head"><a>&nbsp;Profile</a> <button class="btn_close_pr_doc">X</button></div>
    <?php
		echo "
			<!-- profile client --->
            <section class='div_prof_ass' id=''> 		
                <section class='inner_containerx'>
                    <div class='h_headingX'><h1>Profile</h1></div>
                    <div class='h_spacer'>&nbsp;</div>
                    <div class='ic_inner'>
                        <div class='inner_head'>
                            <div class='ih_pic'><img height='180' width='180' id='al_imgdoc'/></div>
                        </div>
                        <div class='inner_body'>
                            <h2 id='name_doc'></h2>
                            <div class='h_spacer_h'>&nbsp;</div>
                            <div class='p_add'>		<a id='address_doc'></a> 	</div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'>		<a id='contact_doc'></a> 	</div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'>		<a id='gender_doc'></a> 	</div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'>		<a id='dob_doc'></a> 		</div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'>		<a id='spec_doc'></a> 		</div>
                        </div>
                    </div>
                </section>
            </section>
		";
	?> 
</div>

<div class="hide_history_doc">
	<div class="hide_history_doc_head"><a>&nbsp;History</a> <button class="btn_close_hi_doc">X</button></div>
</div>

<section class="body_container page" id="list_doctor_page"> 	
    <section class="inner_container">
        <div class="h_heading"><h1>List Doctor</h1></div>
        <div class="table_cont">
           
				<table id="tbl_list_doctor">
                	<thead class="tsc_rh"> 
                    	<tr> 
                            <td id='tbl_d1h'>#</td>		
                            <td id='tbl_d2h'>Name</td> 		
                            <td id='tbl_d3h'>Specialist</td> 	
                            <td id='tbl_d4h'></td> 		
                            <td id='tbl_d5h'> </td> 	
                            <td id='tbl_d6h'> </td>	
                            <td id='tbl_d7h'> </td>	
						</tr> 
                    </thead>
                    <?php 
					
						$hospital->DBConnect();
						$usertypexx =  $_SESSION['usertype'];
						if($usertypexx == "2"){
							
							$hospital->DBConnect();
							$useridxx = $_SESSION['user_id'];
							$sqlxx = "SELECT * FROM tbl_assistant WHERE user_id='$useridxx'";
							$resultxx = mysql_query($sqlxx);
							$didxx = "";
							while($rowxx = mysql_fetch_array($resultxx)){
								$didxx = $rowxx['doctor_id'];
							
								$colorL = "";
								$loopX = "1";
								$sqlyy = "SELECT * FROM tbl_doctor WHERE id='$didxx'";
								$resultyy = mysql_query($sqlyy);
								while($rowyy = mysql_fetch_array($resultyy)){  
									$id = $rowyy['id'];
									$fname = $rowyy['fname'];
									$mname = $rowyy['mname'];
									$lname = $rowyy['lname'];
									$specialist = $rowyy['specialist'];	
									$address = $rowyy['address'];
									$gender = $rowyy['gender'];
									$contact = $rowyy['contact_no'];	
									$dob = $rowyy['birthdate'];	
									$useridx = $rowyy['user_id'];
									$img = $rowyy['img'];
									
									$name = $fname . " " . $mname . ", " . $lname;
									
									$sql2 = "SELECT * FROM user_tbl WHERE status='active' and user_id='$useridx'";
									$result2 = mysql_query($sql2);
									while($row2 = mysql_fetch_array($result2)){ 
										if($loopX % 2 == "0"){ $colorL = "tsc_rb1";
										}else{ $colorL = "tsc_rb2"; }
										echo "
											<tr class='$colorL'> 
												<td id='tbl_d1'>$loopX</td>
												<td id='tbl_d2'>$name</td>
												<td id='tbl_d3'>$specialist</td>
												<td id='tbl_d4'><button name='btn_doctor_list_sched' class='btn_doctor_list_sched' 	value='$useridx'>Schedule</button></td>
												<td id='tbl_d5'><button name='btn_doctor_list_profi' class='btn_doctor_list_profi' 	value='$useridx'>Profile</button></td>
												<td id='tbl_d6'><button name='btn_doctor_list_hist'  class='btn_doctor_list_hist'  	value='$useridx'>History</button></td>
												<td id='tbl_d7'><button name='btn_doctor_list_rem' 	 class='btn_doctor_list_rem'	value='$useridx'>Remove</button></td>	
											</tr>
										";
										$loopX = $loopX+1;
									}
									
									
								}
							
							}
							
							
							
						}else{
							
							$colorL = "";
							$loopX = "1";
							$sql = "SELECT * FROM tbl_doctor ORDER BY fname ASC";
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
								
								$name = $fname . " " . $mname . ", " . $lname;
								
								$sql2 = "SELECT * FROM user_tbl WHERE status='active' and user_id='$useridx'";
								$result2 = mysql_query($sql2);
								while($row2 = mysql_fetch_array($result2)){ 
									if($loopX % 2 == "0"){ $colorL = "tsc_rb1";
									}else{ $colorL = "tsc_rb2"; }
									echo "
										<tr class='$colorL'> 
											<td id='tbl_d1'>$loopX</td>
											<td id='tbl_d2'>$name</td>
											<td id='tbl_d3'>$specialist</td>
											<td id='tbl_d4'><button name='btn_doctor_list_sched' class='btn_doctor_list_sched' 	value='$useridx'>Schedule</button></td>
											<td id='tbl_d5'><button name='btn_doctor_list_profi' class='btn_doctor_list_profi' 	value='$useridx'>Profile</button></td>
											<td id='tbl_d6'><button name='btn_doctor_list_hist'  class='btn_doctor_list_hist'  	value='$useridx'>History</button></td>
											<td id='tbl_d7'><button name='btn_doctor_list_rem' 	 class='btn_doctor_list_rem'	value='$useridx'>Remove</button></td>	
										</tr>
									";
									$loopX = $loopX+1;
								}
								
								
								
							}
						}
					?>
                </table>
			 
        </div>
    </section>  
</section>
   
    
<?php include("./include/footer.php"); ?>
</body>
</html>