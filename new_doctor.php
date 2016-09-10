<?php include("./include/header.php"); ?>

<body>
<?php include("./include/head.php"); ?>

<section class="body_container page" id="new_doctor_page"> 		
    <section class="inner_container">
        <div class="h_heading"><h1>New Doctor</h1></div>
        <div class="table_cont2">
            <div>
                <form  method="POST" action="get.php" name="form_new_assistant" >
                    <div> 
                    <div class="create_span">Personal Information:</div>
                    <input type="text" 	class="create_elem1" name="doctor_fname" id="doctor_fname" placeholder="First Name"  	/> 
                    <input type="text" 	class="create_elem1" name="doctor_mname" id="doctor_mname" placeholder="Middle Name"   	/> 
                    <input type="text" 	class="create_elem1" name="doctor_lname" id="doctor_lname" placeholder="Last Name"    	/> 
                    <input type="date" 	class="create_elem1" name="doctor_dob" id="doctor_dob" placeholder="Date of Birth YYYY-DD-MM"  	/>
                    <select class="create_elem2" name="doctor_gender" id="doctor_gender" >
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input type="text" 	class="create_elem1" name="doctor_contact" id="doctor_contact" placeholder="Contact Number"   />
                    <input type="text" 	class="create_elem4" name="doctor_address" id="doctor_address" placeholder="Complete Address" 	/> 
                    </div>
                    
                    <div> 
                    <div class="create_span">Profession Information:</div> 
                    <input type="text" 		class="create_elem1" name="doctor_specialization"  id="doctor_specialization" placeholder="Specialization"   /> 
                    <input type="text" 		class="create_elem1" name="doctor_times" 			id="doctor_times"			placeholder="Start Time"     /> 
                    <input type="text" 		class="create_elem1" name="doctor_timee"			id="doctor_timee"			 placeholder="End Time"    	/> 
                    </div> 
                    
                    <div>
                    <div class="create_span">Account Information:</div> 
                    <input type="text" 		class="create_elem1" name="doctor_username"		id="doctor_username" 	placeholder="Username"     	/> 
                    <input type="password" 	class="create_elem1" name="doctor_password" 	id="doctor_password" 	placeholder="Password"     />
                    <input type="password" 	class="create_elem1" name="doctor_password2"  	id="doctor_password2" 	placeholder="Re-Type Password"  /> 
                    </div>
                    
                    <div id="div_sub">
                    
                    <input type="submit" value="Create" class="create_elem3" name="btn_create_doctor" id="btn_create_doctor" />
                    </div>
             	</form>
            </div>
        </div>   
    </section>
</section> 
    
<?php include("./include/footer.php"); ?>
</body>
</html>