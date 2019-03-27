<?php

	include('../../../dbconnection.php');

	$event = $_POST['_event'];
	$activity = $_POST['_activity_name'];	
	$desc = $_POST['_activity_desc'];
	$starttime = $_POST['_start_time'];
	$pic = $_POST['_pic'];

	$query = "INSERT INTO `ems_r_activity`(ra_activity_name, ra_activity_description, ra_activity_pic, ra_activity_starttime, ra_event_id) VALUES ('$activity','$desc', '$pic', '$starttime', '$event')";

	$runquery = mysqli_query($connection, $query);
	
 ?>