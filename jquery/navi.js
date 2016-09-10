// JavaScript Document


function doctorlist(){
	//default
	$(".hide_sched_doc").hide();
	$(".hide_profile_doc").hide();
	$(".hide_history_doc").hide();
	
	
	//schedule
	$('.btn_doctor_list_sched').on('click', function () {
		$(".hide_sched_doc").show();
		$.ajax({
			url: './include/php/action.php',
			type: 'post',
			dataType: "json",
			data: {	'action': 'count_sched',
					'id'	: this.value
			},
			success: function (data) { 
				var dl  = data.length;
				var div = document.getElementById("sched_doctorx");
					for(var x = 0; x < dl ; x++){
						 
						 var newDiv = document.createElement("div"); 
						 newDiv.setAttribute("class", "inner_sched");
						 newDiv.setAttribute("id", "inner_sched");
						 var newContent = document.createTextNode(data[x].date + " - " + data[x].status + " - " + data[x].condition); 
						 newDiv.appendChild(newContent); 
						 div.appendChild(newDiv); 
					}
				
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
	//profile
	$('.btn_doctor_list_profi').on('click', function () {
		$(".hide_profile_doc").show();
		$.ajax({
			url: './include/php/action.php',
			type: 'post',
			dataType: "json",
			data: {	'action': 'doc_list_prof',
					'id'	: this.value
			},
			success: function (data) { 
			
				document.getElementById("name_doc").innerHTML =  data[0].name;
				document.getElementById("address_doc").innerHTML = "Address: " +  data[0].address;
				document.getElementById("contact_doc").innerHTML = "Mobile / Contact: " +  data[0].contact;
				document.getElementById("gender_doc").innerHTML = "Gender: " +  data[0].gender;
				document.getElementById("spec_doc").innerHTML = "Specialist: " + data[0].specialist;
				document.getElementById("dob_doc").innerHTML = "Date of Birth: " +  data[0].dob;
				document.getElementById("al_imgdoc").src = "./img/doctor/" +  data[0].img;
				
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
	//history
	$('.btn_doctor_list_hist').on('click', function () {
		$(".hide_history_doc").show();
	});
	
	//Delete
	$('.btn_doctor_list_rem').on('click', function () {
		$.ajax({
			url: './include/php/action.php',
			type: 'post',
			data: {	'action': 'delete',
					'id'	: this.value
			},
			success: function (data) { 
				alert("Succesfully Deleted!");
				location.reload(); 
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
	
	//btn_close
	$('.btn_close_hs_doc').on('click', function () {
		$(".hide_sched_doc").hide();
		location.reload();
	});
	$('.btn_close_pr_doc').on('click', function () {
		$(".hide_profile_doc").hide();
	});
	$('.btn_close_hi_doc').on('click', function () {
		$(".hide_history_doc").hide();
	});
	
	
}



function patientlist(){
	//default
	$(".hide_profile_pat").hide();
	$(".hide_history_pat").hide();
	
	//profile
	$('.btn_patient_list_profi').on('click', function () {
		$(".hide_profile_pat").show();
		
		$.ajax({
			url: './include/php/action.php',
			type: 'post',
			dataType: "json",
			data: {	'action': 'pat_list_prof',
					'id'	: this.value
			},
			success: function (data) { 
			
				document.getElementById("name_pat").innerHTML =  data[0].name;
				document.getElementById("address_pat").innerHTML = "Address: " +  data[0].address;
				document.getElementById("contact_pat").innerHTML = "Mobile / Contact: " +  data[0].contact;
				document.getElementById("gender_pat").innerHTML = "Gender: " +  data[0].gender;
				document.getElementById("dob_pat").innerHTML = "Date of Birth: " +  data[0].dob;
				document.getElementById("al_imgpat").src = "./img/client/" +  data[0].img;
				
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
		
		
	});
	
	//history
	$('.btn_patient_list_histo').on('click', function () {
		$(".hide_history_pat").show();
		$.ajax({
			url: './include/php/action.php',
			type: 'post',
			dataType: "json",
			data: {	'action': 'hist_pat',
					'id'	: this.value
			},
			success: function (data) { 
				var dl  = data.length;
				var div = document.getElementById("hist_pat");
					for(var x = 0; x < dl ; x++){
						 
						 var newDiv = document.createElement("div"); 
						 newDiv.setAttribute("class", "inner_sched");
						 newDiv.setAttribute("id", "inner_sched");
						 var newContent = document.createTextNode(data[x].date + " - " + data[x].status + " - " + data[x].condition); 
						 newDiv.appendChild(newContent); 
						 div.appendChild(newDiv); 
					}
				
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
		
	});
	
	//Delete
	$('.btn_patient_list_remo').on('click', function () {
		$.ajax({
			url: './include/php/action.php',
			type: 'post',
			data: {	'action': 'delete',
					'id'	: this.value
			},
			success: function (data) { 
				alert("Succesfully Deleted!");
				location.reload(); 
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
	
	//btn_close
	$('.btn_close_pr_pat').on('click', function () {
		$(".hide_profile_pat").hide();
	});
	$('.btn_close_hi_pat').on('click', function () {
		$(".hide_history_pat").hide();
	});
	

}


function assistantlist(){
	//default
	$(".hide_profile_ass").hide();
	$(".hide_history_ass").hide();
	$(".hide_asignto_ass").hide();
				
	//profile
	$('.btn_ass_list_profi').on('click', function () {
		$(".hide_profile_ass").show();
		$.ajax({
			url: './include/php/action.php',
			type: 'post',
			dataType: "json",
			data: {	'action': 'ass_list_prof',
					'id'	: this.value
			},
			success: function (data) { 
			
				document.getElementById("name_prof").innerHTML =  data[0].name;
				document.getElementById("address_prof").innerHTML = "Address: " +  data[0].address;
				document.getElementById("contact_prof").innerHTML = "Mobile / Contact: " +  data[0].contact;
				document.getElementById("gender_prof").innerHTML = "Gender: " +  data[0].gender;
				document.getElementById("dob_prof").innerHTML = "Date of Birth: " +  data[0].dob;
				document.getElementById("al_img").src = "./img/staff/" +  data[0].img;
				
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
		
	});
	
	//history
	$('.btn_ass_list_hist').on('click', function () {
		$(".hide_history_ass").show();
	});
	
	//assistant to
	$('.btn_ass_list_assto').on('click', function () {
		$(".hide_asignto_ass").show();
	});
	
	//Delete
	$('.btn_ass_list_rem').on('click', function () {
		$.ajax({
			url: './include/php/action.php',
			type: 'post',
			data: {	'action': 'delete',
					'id'	: this.value
			},
			success: function (data) { 
				alert("Succesfully Deleted!");
				location.reload(); 
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
	//btn_close
	$('.btn_close_pr_ass').on('click', function () {
		$(".hide_profile_ass").hide();
	});
	$('.btn_close_hi_ass').on('click', function () {
		$(".hide_history_ass").hide();
	});
	$('.btn_close_ast_ass').on('click', function () {
		$(".hide_asignto_ass").hide();
	});
	
}



