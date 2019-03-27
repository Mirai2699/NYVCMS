<?php

	include('../../../dbconnection.php');

	$newetype_name = $_POST['_new_eventtype'];
	$newetype_description = $_POST['_new_eventdescription'];	
	$myId = $_POST['_myId'];

	$query = "UPDATE `ems_r_event_type` SET ret_etype_name = '$newetype_name', ret_etype_description = '$newetype_description' WHERE ret_etype_id = $myId";

	$runquery = mysqli_query($connection, $query);

// 	echo "INSERT INTO `ems_r_event_type`(ret_etype_name, ret_etype_description) VALUES ('$etype_name','$etype_description')";
// ?>	