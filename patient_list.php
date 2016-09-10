<?php include("./include/header.php"); ?>

<body>
<?php include("./include/head.php"); ?>

<div class="hide_profile_pat">
	<div class="hide_profile_pat_head"><a>&nbsp;Profile</a> <button class="btn_close_pr_pat">X</button></div>
    <?php
		echo "
			<!-- profile client --->
            <section class='div_prof_ass' id=''> 		
                <section class='inner_containerx'>
                    <div class='h_headingX'><h1>Profile</h1></div>
                    <div class='h_spacer'>&nbsp;</div>
                    <div class='ic_inner'>
                        <div class='inner_head'>
                            <div class='ih_pic'><img height='180' width='180' id='al_imgpat'/></div>
                        </div>
                        <div class='inner_body'>
                            <h2 id='name_pat'></h2>
                            <div class='h_spacer_h'>&nbsp;</div>
                            <div class='p_add'>		<a id='address_pat'></a> 	</div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'>		<a id='contact_pat'></a> 	</div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'>		<a id='gender_pat'></a> 	</div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'>		<a id='dob_pat'></a> 		</div>
                        </div>
                    </div>
                </section>
            </section>
		";
	?> 
</div>

<div class="hide_history_pat">
	<div class="hide_history_pat_head"><a>&nbsp;History</a> <button class="btn_close_hi_pat">X</button></div>
    <div class="hist_pat" id="hist_pat">
    	
    
    </div>
</div>


<section class="body_container page" id="list_doctor_page"> 	
    <section class="inner_container">
        <div class="h_heading"><h1>List Patients</h1></div>
        <div class="table_cont">
           
				<table id="tbl_list_patient">
                	<thead class="tsc_rh"> 
                    	<tr> 
                            <td id='tbl_p1h'>#</td>		
                            <td id='tbl_p2h'>Name</td> 		
                            <td id='tbl_p3h'>Date of Birth</td> 	
                            <td id='tbl_p4h'>Gender</td> 		
                            <td id='tbl_p5h'></td> 	
                            <td id='tbl_p6h'> </td>	
                            <td id='tbl_p7h'> </td>	
						</tr> 
                    </thead>
                    <?php 
					
						$hospital->DBConnect();
						$loopX = 1;
						$colorL = "";
						$sql = "SELECT * FROM tbl_patient ORDER BY fname ASC";
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
							
							$sql2 = "SELECT * FROM user_tbl WHERE status='active' and user_id='$useridx'";
							$result2 = mysql_query($sql2);
							while($row2 = mysql_fetch_array($result2)){ 
							
								if($loopX % 2 == "0"){ $colorL = "tsc_rb1";
								}else{ $colorL = "tsc_rb2"; }
								echo "
									<tr class='$colorL'> 
										<td id='tbl_p1'>$loopX</td>
										<td id='tbl_p2'>$name</td>
										<td id='tbl_p3'>$dob</td>
										<td id='tbl_p4'>$gender</td>
										<td id='tbl_p5'><button name='btn_patient_list_profi' 	class='btn_patient_list_profi' 	value='$useridx'>Profile</button></td>
										<td id='tbl_p6'><button name='btn_patient_list_histo' 	class='btn_patient_list_histo' 	value='$useridx'>History</button></td>
										<td id='tbl_p7'><button name='btn_patient_list_remo' 	class='btn_patient_list_remo' 	value='$useridx'>Remove</button></td>	
									</tr>
								";
								$loopX = $loopX+1;
							
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