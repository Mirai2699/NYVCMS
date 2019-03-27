<?php

	include('../../../dbconnection.php');

	$newstype= $_POST['_new_stype'];	
	$myId = $_POST['_myId'];

	$query = "UPDATE `ems_r_sponsor_type` SET rst_stype_name = '$newstype' WHERE rst_stype_id = '$myId'";

	$runquery = mysqli_query($connection, $query);

// 	echo "INSERT INTO `ems_r_event_type`(ret_etype_name, ret_etype_description) VALUES ('$etype_name','$etype_description')";
// ?>	