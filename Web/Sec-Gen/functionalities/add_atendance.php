<?php

	include('../../../dbconnection.php');

	$event = $_POST['_event'];
	$sdg = $_POST['_sdg'];
	$date = $_POST['_date'];	
	$name = $_POST['_name'];
	$age = $_POST['_age'];
	$gender = $_POST['_gender'];
	$contactno = $_POST['_contactno'];

	$query = "INSERT INTO `ems_t_attendance`(ta_event_id, ta_sdg_id, ta_date_attended, ta_name, ta_age, ta_gender, ta_contact_no) VALUES ('$event','$sdg', '$date', '$name', '$age', '$gender', '$contactno')";

	$runquery = mysqli_query($connection, $query);
	
 ?>