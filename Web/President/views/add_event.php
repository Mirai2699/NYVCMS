<?php

	include('../../../dbconnection.php');

	$event = $_POST['_event_name'];
	$desc = $_POST['_event_desc'];	
	$etype = $_POST['_event_type'];
	$startdate = $_POST['_event_startdate'];
	$enddate = $_POST['_event_enddate'];
	//$venue = $_POST['_event_venue'];
	$venue = 1;
	$memfee = $_POST['_event_memfee'];
	$nonmemfee = $_POST['_event_nonmemfee'];

	$query = "INSERT INTO `ems_r_event`(re_event_name, re_event_description, re_event_startdate, re_event_enddate, re_etype_id, re_venue_id, re_regfee_mem, re_regfee_nonmem) VALUES ('$event','$desc','$startdate', '$enddate', '$etype', '$venue', '$memfee', '$nonmemfee')";

	$runquery = mysqli_query($connection, $query);
	
 ?>