<?php include("./include/header.php"); ?>

<body>
<?php include("./include/head.php"); ?>

<section class="body_container page" id="new_client_page"> 		
    <section class="inner_container">
        <div class="h_heading"><h1>New Patients</h1></div>
        <div class="table_cont2">
            <div>
                <form  method="POST" action="get.php"  name="form_new_patient" > 
                    <div> 
                    <div class="create_span">Personal Information:</div>
                    <input type="text" 	class="create_elem1" name="pat_fname" id="pat_fname" placeholder="First Name" 	/> 
                    <input type="text" 	class="create_elem1" name="pat_mname" id="pat_mname" placeholder="Middle Name"  /> 
                    <input type="text" 	class="create_elem1" name="pat_lname" id="pat_lname" placeholder="Last Name"    /> 
                    <input type="date" 	class="create_elem1" name="pat_dob" 	id="pat_dob" placeholder="Date of Birth YYYY-DD-MM"    	/>
                    <select class="create_elem2" name="pat_gender" id="pat_gender"  >
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input type="text" 	class="create_elem1" name="pat_contact"  id="pat_contact" placeholder="Contact Number"  />
                    <input type="text" 	class="create_elem4" name="pat_add" 	id="pat_add" placeholder="Complete Address"	/> 
                    </div>
                    
                    <div> 
                    <div class="create_span">Account Information:</div> 
                    <input type="text" 		class="create_elem1" 		name="pat_username" id="pat_username" 	placeholder="Username"   /> 
                    <input type="password" 	class="create_elem1" 		name="pat_password"  id="pat_password"	placeholder="Password"   />
                    <input type="password" 	class="create_elem1"		name="pat_password2" id="pat_password2"	placeholder="Re-Type Password"      /> 
                    </div>
                    <div id="div_sub">
                    
                    <input type="submit" value="Create" class="create_elem3" name="btn_create_pat" 	 id="btn_create_pat" />
                    </div>
            	</form>
            </div>
        </div>            
    </section>
</section>

    
<?php include("./include/footer.php"); ?>
</body>
</html>