<?php include("./include/header.php"); ?>

<body>
<?php include("./include/head.php"); ?>


<div class="hide_profile_ass">
	<div class="hide_profile_ass_head"><a>&nbsp;Profile</a> <button class="btn_close_pr_ass">X</button></div>
    <?php
		echo "
			<!-- profile client --->
            <section class='div_prof_ass' id=''> 		
                <section class='inner_containerx'>
                    <div class='h_headingX'><h1>Profile</h1></div>
                    <div class='h_spacer'>&nbsp;</div>
                    <div class='ic_inner'>
                        <div class='inner_head'>
                            <div class='ih_pic'><img height='180' width='180' id='al_img'/></div>
                        </div>
                        <div class='inner_body'>
                            <h2 id='name_prof'></h2>
                            <div class='h_spacer_h'>&nbsp;</div>
                            <div class='p_add'>		<a id='address_prof'></a> 	</div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'>		<a id='contact_prof'></a> 	</div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'>		<a id='gender_prof'></a> 	</div>
                            <div class='h_spacer'>&nbsp;</div>
                            <div class='p_con'>		<a id='dob_prof'></a> 		</div>
                            <div class='h_spacer'>&nbsp;</div>
                        </div>
                    </div>
                </section>
            </section>
		";
		
	?>
    
    
    
    
    
</div>

<div class="hide_history_ass">
	<div class="hide_history_ass_head"><a>&nbsp;History</a> <button class="btn_close_hi_ass">X</button></div>
</div>

<div class="hide_asignto_ass">
	<div class="hide_asignto_ass_head"><a>&nbsp;Assigned TO:</a> <button class="btn_close_ast_ass">X</button></div>
</div>

<section class="body_container page" id="list_doctor_page"> 	
    <section class="inner_container">
        <div class="h_heading"><h1>List Assistant</h1></div>
        <div class="table_cont">
           
				<table id="tbl_list_doctor">
                	<thead class="tsc_rh"> 
                    	<tr> 
                            <td id='tbl_d1h'>#</td>		
                            <td id='tbl_d2h'>Name</td> 		
                            <td id='tbl_d3h'>Doctor</td> 	
                            <td id='tbl_d4h'></td> 		
                            <td id='tbl_d5h'> </td> 	
                            <td id='tbl_d6h'> </td>	
                            <td id='tbl_d7h'> </td>	
						</tr> 
                    </thead>
                    <?php 
						$hospital->DBConnect();
						$colorL = "";
						$loopX = 1;
						$doctorname = "";
						$sql = "SELECT * FROM tbl_assistant ORDER BY fname ASC";
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
							$doctor_id 	= $row['doctor_id'];
							$img = $row['img'];
							$name = $fname . " " . $mname . ", " . $lname;
							$sql2 = "SELECT * FROM tbl_doctor WHERE id='$doctor_id'";
							$result2 = mysql_query($sql2);
							while($row2 = mysql_fetch_array($result2)){
								$doctorname = $row2['fname'] . " " . $row2['mname'] . ", ". $row2['lname'] ;
							}
							
							$sql3 = "SELECT * FROM user_tbl WHERE status='active' and user_id='$useridx'";
							$result3 = mysql_query($sql3);
							while($row3 = mysql_fetch_array($result3)){ 
								if($loopX % 2 == "0"){ $colorL = "tsc_rb1";
								}else{ $colorL = "tsc_rb2"; }
								echo "
									<tr class='$colorL'> 
										<td id='tbl_d1'>$loopX</td>
										<td id='tbl_d2'>$name</td>
										<td id='tbl_d3'>$doctorname</td>
										<td id='tbl_d4'><button name='btn_ass_list_profi' 	class='btn_ass_list_profi' 	value='$useridx'>Profile</button></td>
										<td id='tbl_d5'><button name='btn_ass_list_hist' 	class='btn_ass_list_hist' 	value='$useridx'>History</button></td>
										<td id='tbl_d6'><button name='btn_ass_list_assto'  	class='btn_ass_list_assto' 	value='$useridx'>Assigned To</button></td>
										<td id='tbl_d7'><button name='btn_ass_list_rem' 	class='btn_ass_list_rem'	value='$useridx'>Remove</button></td>		
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