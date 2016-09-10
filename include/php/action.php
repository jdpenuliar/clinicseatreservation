<?php
include("class.php");

$class = new hospital;


if(!empty($_POST['action'])){
	if($_POST['action'] == "ass_list_prof"){
		$id = $_POST['id'];
		$class->ass_list_prof($id);
	}
	
	if($_POST['action'] == "pat_list_prof"){
		$id = $_POST['id'];
		$class->pat_list_prof($id);
	}
	if($_POST['action'] == "doc_list_prof"){
		$id = $_POST['id'];
		$class->doc_list_prof($id);
	}
	
	if($_POST['action'] == "delete"){
		$id = $_POST['id'];
		$class->delete_user($id);
	}
	
	if($_POST['action'] == "count_sched"){
		$id = $_POST['id'];
		$class->count_sched($id);
	}
	if($_POST['action'] == "hist_pat"){
		$id = $_POST['id'];
		$class->hist_pat($id);
	}
}










?>