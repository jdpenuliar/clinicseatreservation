<?php include("./include/header.php"); ?>

<body>
<?php include("./include/head.php"); ?>

<section class="body_container page" id="new_assistant_page"> 	
    <section class="inner_container">
        <div class="h_heading"><h1>New Assistant</h1></div>
        <div class="table_cont2">
            <div>
                <form  method="POST" action="get.php" name="form_new_assistant" >
                    <div>  
                    <div class="create_span">Personal Information:</div>
                    <input type="text" 	class="create_elem1" name="ass_fname" 	id="ass_fname" 	placeholder="First Name"   			/> 
                    <input type="text" 	class="create_elem1" name="ass_mname" 	id="ass_mname" 	placeholder="Middle Name"  		/> 
                    <input type="text" 	class="create_elem1" name="ass_lname" 	id="ass_lname"	placeholder="Last Name"   		 /> 
                    <input type="date" 	class="create_elem1" name="ass_dob" 	id="ass_dob" 	placeholder="Date of Birth YYYY-DD-MM"  	 />
                    <select class="create_elem2" name="ass_gender" id="ass_gender"  >
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input type="text" 	class="create_elem1" name="ass_contact" id="ass_contact"	placeholder="Contact Number"   />
                    <input type="text" 	class="create_elem4" name="ass_add"  id="ass_add"	placeholder="Complete Address"	  /> 
                    </div>
                    
                    <div> 
                    <div class="create_span">Profession Information:</div> 
                    <?php 
						
						$hospital->DBConnect();
						$sqlx = "SELECT * FROM tbl_doctor ORDER BY lname ASC";
						$resultx = mysql_query($sqlx);
						echo "<SELECT class='create_elem1' id='ass_doctor' >";
						while($rowx = mysql_fetch_array($resultx)){ 
							echo "<option value='" . $rowx['id'] . "'>" . $rowx['fname'] . " " . $rowx['mname'] . ", " . $rowx['lname'] . "</option>";
						}
						
						echo "</SELECT>";
						
					?>
                    </div> 
                    
                    <div>
                    <div class="create_span">Account Information:</div> 
                    <input type="text" 		class="create_elem1" name="ass_username" id="ass_username" 		placeholder="Username"  /> 
                    <input type="password" 	class="create_elem1" name="ass_password" id="ass_password"		placeholder="Password"    />
                    <input type="password" 	class="create_elem1" name="ass_password2" id="ass_password2"	placeholder="Re-Type Password"      /> 
                    </div>
                    
                    <div id="div_sub">
                    <input type="submit" value="Create" class="create_elem3" name="btn_create_ass"  id="btn_create_ass"	/>
                    </div>
            	</form>
            </div>
        </div>            
    </section> 
</section>
    
<?php include("./include/footer.php"); ?>
</body>
</html>